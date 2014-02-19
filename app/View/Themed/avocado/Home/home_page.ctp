<?php 
	$role = $this->Session->read('User.role');
	App::uses('CakeTime', 'Utility');
?>
	
<div class="row-fluid">
  <div class="span6">
    <div class="top-bar">
       <h3>Tickets assigned</h3>
    </div>
    <?php if(!empty($ticketDetails)): ?>
    <div class="well no-padding tab-content">  
      <code>
        <table class="data-table">
          <thead>
            <tr>
              <th>Ticket</th>
              <th>Status</th>
              <th class="right">Actions</th>
            </tr>
          </thead>
          <tbody>
          <?php 
            foreach ($ticketDetails as $key => $ticketDetail) {
            ?>
            <tr>
              <td><?php echo $ticketDetail['BugAndFeature']['title']; ?></td>
              <td><?php echo $ticketDetail['Status']['type']; ?></td>
              <td class="right">
                <button type="button" class="btn btn-info">Edit</button>
                <button type="button" class="btn btn-danger">Delete</button>
              </td>
             </tr> 
            <?php
            }
          ?>
          </tbody>
        </table>
      </code>
    </div>
    <?php 
    else:
    ?>
    <?php
      echo '<div class="well"><h5 class="center">You are not assigned any ticket</h5></div>';
    endif; ?>
    
    <div class="top-bar">
       <h3>Projects alive</h3>
    </div>
    <?php
      if(!empty($collaboratedProjects)){ ?>
      <div class="well no-padding tab-content">  
        <code>
          <table class="data-table">
            <thead>
              <tr>
                <th>Project</th>
                <th class="right">Actions</th>
              </tr>
            </thead>
            <tbody>
            <?php 
              foreach ($collaboratedProjects as $key => $collaboratedProject) {
              ?>
              <tr>
                <td><?php echo $collaboratedProject['AddProject']['project_name']; ?></td>
                <td class="right">
                  <button type="button" class="btn btn-info">Edit</button>
                  <button type="button" class="btn btn-danger">Delete</button>
                </td>
               </tr> 
              <?php
              }
            ?>
            </tbody>
          </table>
        </code>
      </div>
      <?php } else {
        ?> <div class="well"><h5 class="center"> No projects alive</h5></div> <?php
      }
    ?>

  </div>

  <div class="span6">
    <div class="top-bar">
       <h3>Feed</h3>
    </div>
    <div class="well">  
      <!-- Project Feeds -->
      <?php 
        foreach($feedDetails as $feedDetail):
        $key_array = array_keys($feedDetail);  
        $key = $key_array['0'];
        if($key == "BugAndFeature"){
          $date1 = $feedDetail['BugAndFeature']['modified'];
          $date2 = CakeTime::format('Y-m-d H:i:s', time());
          $ts1 = strtotime($date1);
          $ts2 = strtotime($date2);
          
          $seconds_diff = $ts2 - $ts1;
          
          $time_diff = floor($seconds_diff/3600/24);
            if($time_diff <= 1000){
              if($feedDetail['BugAndFeature']['created'] == $feedDetail['BugAndFeature']['modified']){
                echo '<div class="feedDetail"><i class="icon-plus-sign"></i>&nbsp;&nbsp;&nbsp;';
                echo "New ticket  ";
                echo '<b>'.$this->Html->link($feedDetail['BugAndFeature']['title'], array('controller' => 'Project', 'action' => 'viewTicket', $feedDetail['BugAndFeature']['id'])).'</b>';
                echo " added";
                echo '<br/>';
                foreach ($users as $user):
                  if($user['Profile']['id'] == $feedDetail['BugAndFeature']['assigned_to']):
                    echo '&nbsp;&nbsp;&nbsp;<i class="icon-user"></i>&nbsp;&nbsp;&nbsp;';
                    echo 'Assigned To ';
                    if($user['Profile']['id'] == $this->Session->read('id')){
                      echo '<i>';
                      echo $this->Html->link($user['Profile']['user_name'],
                                array('controller' => 'Employee', 'action' => 'viewProfile', $user['Profile']['id']));
                      echo '</i>';
                    }else {
                      echo $this->Html->link($user['Profile']['user_name'],
                              array('controller' => 'Employee', 'action' => 'viewProfile', $user['Profile']['id']));
                    }
                  endif;
                endforeach; 
                echo '<br/>';
                foreach ($users as $user):
                  if($user['Profile']['id'] == $feedDetail['BugAndFeature']['reported_by']):
                    echo '&nbsp;&nbsp;&nbsp;<i class="icon-book"></i>&nbsp;&nbsp;&nbsp;';
                    echo 'Reported By ';
                  if($user['Profile']['id'] == $this->Session->read('id')){
                    echo '<i><b>';
                      echo $this->Html->link($user['Profile']['user_name'],
                                array('controller' => 'Employee', 'action' => 'viewProfile', $user['Profile']['id']));
                    echo '</b></i>';
                    }else {
                      echo $this->Html->link($user['Profile']['user_name'],
                                array('controller' => 'Employee', 'action' => 'viewProfile', $user['Profile']['id']));
                    }
                  endif;
                endforeach; 
                  echo '</div>';
              }else {
                echo '<div class="feedDetail"><i class="icon-refresh"></i>&nbsp;&nbsp;&nbsp;';
                echo "Ticket Modified  ";
                echo '<b>'.$this->Html->link($feedDetail['BugAndFeature']['title'], array('controller' => 'Project', 'action' => 'viewTicket', $feedDetail['BugAndFeature']['id'])).'</b>';
                echo " added";
                echo '<br/>';
                foreach ($users as $user):
                  if($user['Profile']['id'] == $feedDetail['BugAndFeature']['assigned_to']):
                    echo '&nbsp;&nbsp;&nbsp;<i class="icon-user"></i>&nbsp;&nbsp;&nbsp;';
                    echo 'Assigned To ';
                  if($user['Profile']['id'] == $this->Session->read('id')){
                    echo '<i><b>';
                      echo $this->Html->link($user['Profile']['user_name'],
                                array('controller' => 'Employee', 'action' => 'viewProfile', $user['Profile']['id']));
                    echo '</b></i>';
                    }else {
                      echo $this->Html->link($user['Profile']['user_name'],
                                array('controller' => 'Employee', 'action' => 'viewProfile', $user['Profile']['id']));
                    }
                  endif;
                endforeach; 
                echo '<br/>';
                foreach ($users as $user):
                  if($user['Profile']['id'] == $feedDetail['BugAndFeature']['reported_by']):
                    echo '&nbsp;&nbsp;&nbsp;<i class="icon-book"></i>&nbsp;&nbsp;&nbsp;';
                    echo 'Reported By ';
                  if($user['Profile']['id'] == $this->Session->read('id')){
                    echo '<i><b>';
                      echo $this->Html->link($user['Profile']['user_name'],
                                array('controller' => 'Employee', 'action' => 'viewProfile', $user['Profile']['id']));
                    echo '</b></i>';
                    }else {
                      echo $this->Html->link($user['Profile']['user_name'],
                                array('controller' => 'Employee', 'action' => 'viewProfile', $user['Profile']['id']));
                    }
                  endif;
                endforeach; 
                  echo '</div>';
              }
            }
          } elseif ($key == "AddProject") { 
            $date1 = $feedDetail['AddProject']['modified'];
            $date2 = CakeTime::format('Y-m-d H:i:s', time());
            $ts1 = strtotime($date1);
            $ts2 = strtotime($date2);
            $seconds_diff = $ts2 - $ts1;
            $time_diff = floor($seconds_diff/3600/24);
          
            if($time_diff <= 1000){
              if($feedDetail['AddProject']['created'] == $feedDetail['AddProject']['modified']){
                echo '<div class="feedDetail"><i class="icon-plus-sign"></i>&nbsp;&nbsp;&nbsp;';
                echo "New project ";
                echo '<b>'.$this->Html->link($feedDetail['AddProject']['project_name'],
                            array('controller' => 'Project', 'action' => 'viewProject', $feedDetail['AddProject']['id']))
                  .'</b>';
                echo " created";
                echo '<br/>';
                echo '&nbsp;&nbsp;&nbsp;<i class="icon-user"></i>&nbsp;&nbsp;&nbsp;';
                echo "Project Members:";
                echo '<br/>';
                
                foreach ($users as $user):
                  foreach($project_members as $project_member):
                    if($project_member['ProjectMember']['project_id'] == $feedDetail['AddProject']['id'])
                      if($project_member['ProjectMember']['profile_id'] == $user['Profile']['id']){ 
                      ?> 
                        <tbody>
                          <tr>
                            <td>
                            <i class="icon-th-list"></i>
                            <?php 
                              if($user['Profile']['id'] == $this->Session->read('id')){
                              echo '<i><b>';
                                echo $this->Html->link($user['Profile']['user_name'],
                                          array('controller' => 'Employee', 'action' => 'viewProfile', $user['Profile']['id']));
                              echo '</b></i>';
                              }else {
                                echo $this->Html->link($user['Profile']['user_name'],
                                          array('controller' => 'Employee', 'action' => 'viewProfile', $user['Profile']['id']));
                              }
                            ?>
                              </td>
                          </tr>
                        </tbody>
                      <?php 
                      }
                  endforeach;
                endforeach;
                echo '</div>';
              }else{
                echo '<div class="feedDetail"><i class="icon-refresh"></i>&nbsp;&nbsp;&nbsp;';
                echo "Project Modified ";
                echo '<b>'.$this->Html->link($feedDetail['AddProject']['project_name'],
                            array('controller' => 'Project', 'action' => 'viewProject', $feedDetail['AddProject']['id']))
                  .'</b>';
                echo '<br/>';
                echo '&nbsp;&nbsp;&nbsp;<i class="icon-user"></i>&nbsp;&nbsp;&nbsp;';
                echo "Project Members:";
                echo '<br/>';
                foreach ($users as $user):
                  foreach($project_members as $project_member):
                    if($project_member['ProjectMember']['project_id'] == $feedDetail['AddProject']['id'])
                      if($project_member['ProjectMember']['profile_id'] == $user['Profile']['id']){ 
                      ?> 
                        <tbody>
                          <tr>
                            <i class="icon-th-list"></i>
                            <td> <?php 
                              if($user['Profile']['id'] == $this->Session->read('id')){
                              echo '<i><b>';
                                echo $this->Html->link($user['Profile']['user_name'],
                                          array('controller' => 'Employee', 'action' => 'viewProfile', $user['Profile']['id']));
                              echo '</b></i>';
                              }else {
                                echo $this->Html->link($user['Profile']['user_name'],
                                          array('controller' => 'Employee', 'action' => 'viewProfile', $user['Profile']['id']));
                              }
                            ?> </td>
                          </tr>
                        </tbody>
                      <?php 
                      }
                  endforeach;
                endforeach;
                echo '</div>';
              }
            }
          } elseif($key == "Milestone") {
            $date1 = $feedDetail['Milestone']['modified'];
            $date2 = CakeTime::format('Y-m-d H:i:s', time());
            $ts1 = strtotime($date1);
            $ts2 = strtotime($date2);
            $seconds_diff = $ts2 - $ts1;
            $time_diff = floor($seconds_diff/3600/24);
            
            if($time_diff <= 1000){
              if($feedDetail['Milestone']['created'] == $feedDetail['Milestone']['modified']){
                echo '<div class="feedDetail"><i class="icon-plus-sign"></i>&nbsp;&nbsp;&nbsp;';
                echo "New Milestone  ";
                echo '<b>'.$this->Html->link($feedDetail['Milestone']['title'], array('controller' => 'Project', 
                                              'action' => 'viewMilestone', $feedDetail['Milestone']['id'])).'</b>';
                echo " added";
                echo '<br/>';
                foreach ($users as $user):
                  if($user['Profile']['id'] == $feedDetail['Milestone']['responsible_user']):
                    echo '&nbsp;&nbsp;&nbsp;<i class="icon-user"></i>&nbsp;&nbsp;&nbsp;';
                    echo 'Responsible user ';
                  if($user['Profile']['id'] == $this->Session->read('id')){
                    echo '<i><b>';
                      echo $this->Html->link($user['Profile']['user_name'],
                                array('controller' => 'Employee', 'action' => 'viewProfile', $user['Profile']['id']));
                    echo '</b></i>';
                    }else {
                      echo $this->Html->link($user['Profile']['user_name'],
                                array('controller' => 'Employee', 'action' => 'viewProfile', $user['Profile']['id']));
                    }
                      echo '<br/>';
                  endif;
                endforeach; 
                echo '</div>';
              }else {
                echo '<div class="feedDetail"><i class="icon-refresh"></i>&nbsp;&nbsp;&nbsp;';
                echo "Milestone Modified  ";
                echo '<b>'.$this->Html->link($feedDetail['Milestone']['title'], array('controller' => 'Project', 
                                              'action' => 'viewMilestone', $feedDetail['Milestone']['id'])).'</b>';
                echo '<br/>';
                foreach ($users as $user):
                  if($user['Profile']['id'] == $feedDetail['Milestone']['responsible_user']):
                    echo '&nbsp;&nbsp;&nbsp;<i class="icon-user"></i>&nbsp;&nbsp;&nbsp;';
                    echo 'Responsible user';
                    if($user['Profile']['id'] == $this->Session->read('id')){
                    echo '<i><b>';
                      echo $this->Html->link($user['Profile']['user_name'],
                                array('controller' => 'Employee', 'action' => 'viewProfile', $user['Profile']['id']));
                    echo '</b></i>';
                    }else {
                      echo $this->Html->link($user['Profile']['user_name'],
                                array('controller' => 'Employee', 'action' => 'viewProfile', $user['Profile']['id']));
                    }
                    echo '<br/>';
          
                  endif;
                endforeach; 
                echo '</div>';
              }
            }
          }
        endforeach;
        ?>
        <!-- /Project Feed ends -->
    <button class="btn-small btn-primary pull-right" id="view_more_feeds" data-resultcount="10" >View more...</button>
    </div>
  </div> <!-- /Span 8 : FEEDS -->

  <!-- SPAN 12 : Leave requests -->
</div>


<?php
    if($role == 1){
?>
<div class="row-fluid">
  <div class="span12">
    <div class="top-bar">
       <h3>Leave Requests</h3>
    </div>
    <div class="well">  
          <?php
            if(!empty($leaveRequests)){ ?>
            <div class="span8 well">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Status</th>
                    <th>Title</th>
                    <th>Details </th>
                    <th></th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                <?php 
                foreach($leaveRequests as $request){ 
                  foreach($leaveDetails as $detail){      
                    if($request['Profile']['id']==$detail['Event']['profile_id']){
                      if($detail['Event']['status'] == 'In Progress'){
                      echo '<tr>';
                        echo '<td>';
                        echo $this->Html->link($request['Profile']['user_name'], array('controller' => 'Employee', 'action' => 'viewProfile', $request['Profile']['id']));
                        echo '</td>';
                        echo '<td>';
                        echo $this->Html->tag('span', 'Pending', array('class' => 'label label-important'));
                        echo '</td>';
                        echo '<td>';
                        echo $this->Html->link($detail['Event']['title'], array('controller' => 'Calendar', 'action' => 'leave_view', $detail['Event']['id']));
                        echo '</td>';
                        echo '<td>';
                        echo $detail['Event']['details'];
                        echo '</td>';
                        $difference = abs(strtotime($detail['Event']['start']) - strtotime($detail['Event']['end']));
                        $days = round((($difference/60)/60)/24,0);
                        ?>
                        <td class="actions">
                          <a href="<?php echo $this->Html->url(array('action' => 'approve_request', $detail['Event']['id'], $request['Profile']['id'], $days));?>" class="btn btn-small"><i class="icon-ok"></i> <strong>Approve</strong></a>
                            </td>
                        <td class="actions">
                          <a href="<?php echo $this->Html->url(array('action' => 'decline_request', $detail['Event']['id'], $request['Profile']['id'])); ?>" class="btn btn-small"><i class="icon-remove"></i> <strong>Decline</strong></a>
                        </td>
                        
                      <?php 
                      echo '</tr>';
                      }
                    }
                  }
                }?>
                
                </tbody>
              </table>
          </div>
            <?php } else {
              ?> <h5 class="center"> No Leave requests</h5> <?php
            }
          ?>
    </div>
  </div>
  <!-- SPAN 12 : Leave requests -->
</div>
<?php } ?>