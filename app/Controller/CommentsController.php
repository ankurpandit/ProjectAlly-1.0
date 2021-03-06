<?php
class CommentsController extends AppController {

	var $name = 'Comments';
	var $components = array('RequestHandler');
	public $uses = array('Comment');
	
	function beforeFilter() {
		parent::beforeFilter();
	}

	function index($model, $id) {
		$this->paginate = array(
			'conditions' => array(
				'Comment.model' => $model,
				'Comment.foreign_key' => $id,
			),
			'contain' => array(
				'Creator',
			),
			'limit' => 8,
			'page' => 'first',
		);
		$this->Comment->recursive = 0;
		$this->set('comments', $this->paginate());
		$this->set('possible_creators', $this->Profile->find('all'));
		$this->set('_model', $model);
		$this->set('_foreignKey', $id);
	}

	function add($model = null, $id = null) {
		if (!empty($this->data)) {
			$model = Set::extract($this->data, 'Comment.model');
			$id = Set::extract($this->data, 'Comment.foreign_key');
			$this->Comment->create();
			if ($this->Comment->save($this->data)) {
				$this->data = array();
				$this->set('successful', true);
	        	if($model == 'Milestone')
	        		$this->redirect(array('controller' => 'Project', 'action' => 'viewMilestone', $id));
	        	elseif($model == 'BugAndFeature')
	        		$this->redirect(array('controller' => 'Project', 'action' => 'viewTicket', $id));
	        	
	        	
			} else {
				$this->Session->setFlash('The Comment could not be saved. Please, try again.', 'error');
			}
		}
		else {
			$this->data = array(
				'Comment' => array(
					'model' => $model,
					'foreign_key' => $id,
				)
			);
		}
		$this->set('_model', $model);
		$this->set('_foreignKey', $id);
	}
	
	function delete($model = null, $redirect_id = null, $id = null){
      	$this->Comment->delete($id);
       	if($model=='Milestone')
       		$this->redirect(array('controller' => 'Project', 'action' => 'viewMilestone', $redirect_id));
       	elseif($model=='BugAndFeature')
       		$this->redirect(array('controller' => 'Project', 'action' => 'viewTicket', $redirect_id));
    }
}
?>
