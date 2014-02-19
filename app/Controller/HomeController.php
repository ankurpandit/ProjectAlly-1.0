<?php
App::uses('AppController', 'Controller');

class HomeController extends AppController {
	public $name = 'Home';
	public $helpers = array('Html','Form');
	public $components = array('Session');

	public $uses = array('UserInfo', 'Profile', 'AddProject', 'Event', 'EventType', 'BugAndFeature', 'ProjectMember','Milestone');

	
	public function beforeFilter() {
		//parent::beforeFilter();
		//next two lines are to count the number of pending users
		$notify = $this->Profile->find('count', array('conditions' => array('Profile.status' => 0)));
		$this->set(compact('notify'));
		
		
		//$this->disableCache();
		if ($this->request->params['action'] == 'index') {
			$name = $this->Session->read('User.name');
			$role = $this->Session->read('User.role');
			if(isset($name)) {
				$this->redirect(array('controller' => 'Home', 'action' => 'HomePage'));
			}
		}
	}
	
	public function index() {
		$title_for_layout = 'Home';
		$this->set(compact('title_for_layout'));
	}
	public function aboutUs(){

	}
	
	public function signIn(){
		$this->layout = "blank";
		if(!empty($this->request->data)){
			$dbuser = $this->UserInfo->Find('first',array('conditions' => 
													array('UserInfo.input_email' => $this->request->data['UserInfo']['input_email'],
														  'UserInfo.input_password' => $this->request->data['UserInfo']['input_password'],
														  'UserInfo.status' => '1')));
			
			if (empty($dbuser)){
					$this->redirect(array('controller' => 'Home', 'action' => 'loginfailure'));
			} else {
				$this->Session->write('User.name',$dbuser['UserInfo']['user_name']);
				$this->Session->write('User.role',$dbuser['UserInfo']['user_role']);
				$this->Session->write('User.id',$dbuser['UserInfo']['id']);
				$this->redirect(array('controller' => 'Home', 'action' => 'HomePage'));
			}
		}
	}
	
	public function signUp(){
		$this->layout = "blank";
		if(!empty($this->request->data)){
			if($this->Profile->save($this->request->data)){
				$this->Session->setFlash('You have been successfully registered.. Please wait for the confirmation..!', 'success');
				$this->redirect(array('controller' => 'Home', 'action' => 'signUp'));
				
			} else {
				$this->Session->setFlash('Something went wrong please try again.');
			}
		}
	}
	
	public function HomePage() {
		$ticketDetails = $this->BugAndFeature->find('all', array('conditions' => array('BugAndFeature.assigned_to' => $this->Session->read('User.id'))));
		
		$projectDetails = $this->AddProject->find('all');
		$bugDetails = $this->BugAndFeature->find('all');
		$milestoneDetails =  $this->Milestone->find('all');
		$feedDetails = array_merge($projectDetails, $bugDetails, $milestoneDetails);
		$feedDetails = $this->array_sort($feedDetails, 'created', SORT_ASC);
		
		$collaboratedProjects = $this->ProjectMember->find('all', array('conditions' => array('ProjectMember.profile_id' => $this->Session->read('User.id'))));
		
		$this->set('feedDetails', $feedDetails);
		$this->set('ticketDetails', $ticketDetails);
		$this->set('collaboratedProjects', $collaboratedProjects);
		$this->set('leaveRequests', $this->Profile->find('all', array('conditions' => array('Profile.leave_request !=' => 0))));
		$this->set('users', $this->Profile->find('all'));
		$this->set('project_members', $this->ProjectMember->find('all'));
		$this->set('leaveDetails', $this->Event->find('all'));
		
	}
	
	
	public function loginfailure() {
		
	}
			
	public function listProject() {
		$this->set(compact('title_for_layout'));
		$this->set('projects', $this->AddProject->find('all'));
	}
	
	public function approve_request($id = null, $profile_id = null, $days = null){
		if($days == 0){
			$this->Profile->updateAll(array('leave_taken' => 'Profile.leave_taken + 0.5', 
											'leave_request' => 'Profile.leave_request - 1'), 
									array('Profile.id' => $profile_id));
			
		} else{
			$this->Profile->updateAll(array('leave_taken' => 'Profile.leave_taken +'.$days, 
											'leave_request' => 'Profile.leave_request - 1'), 
									array('Profile.id' => $profile_id));
		}
		$this->Event->updateAll(array('status' => "'".Approved."'"), 
								array('Event.id' => $id));
		$this->redirect(array('controller' => 'Home', 'action' => 'HomePage'));
	}
	
	public function decline_request($id = null){
		$this->Profile->updateAll(array('leave_request' => 'Profile.leave_request - 1'), 
								array('Profile.id' => $profile_id));
		$this->Event->updateAll(array('status' => "'".Declined."'"), 
								array('Event.id' => $id));
		$this->redirect(array('controller' => 'Home', 'action' => 'HomePage'));
	}
	
	public function printDocument(){
	
	}
	public function logout() {
		//function to logout
		$this->Session->destroy();
		$this->redirect(array('controller' => 'Home', 'action' => 'index'));
	}
	function array_sort($array, $on, $order=SORT_ASC) {
	    $new_array = array();
	    $sortable_array = array();

	    if (count($array) > 0) {
	        foreach ($array as $k => $v) {
	        	$key_array = array_keys($v);  
        		$key = $key_array['0'];
	            if (is_array($v[$key])) {
	            	foreach ($v[$key] as $k2 => $v2) {
	                    if ($k2 == $on) {
	                        $sortable_array[$k] = $v2;
	                    }
	                }
	            } else {
	                $sortable_array[$k] = $v;
	            }
	        }

	        switch ($order) {
	            case SORT_ASC:
	                asort($sortable_array);
	            break;
	            case SORT_DESC:
	                arsort($sortable_array);
	            break;
	        }

	        foreach ($sortable_array as $k => $v) {
	            $new_array[$k] = $array[$k];
	        }
	    }

	    return $new_array;
	}

}