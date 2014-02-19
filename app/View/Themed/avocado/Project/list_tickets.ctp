<?php
$role = $this->Session->read('User.role');
?>
<div class="row-fluid">
	<div class="span12">
    <div class="span3">
				<ul class="nav nav-tabs nav-stacked span9">
				<?php 
			 		if ($role==1 || $role==2)
	        			{
	        				echo '<li>';
				            echo $this->Html->link('New Ticket',
				                array('controller' => 'Project', 'action' => 'newTicket', $projectid));
				            echo '</li>';
				        }
				     ?>   
                   <li>
		               <?php echo $this->Html->link('Milestones',array('controller' => 'Project', 'action' => 'listMilestones', $projectid)); ?>
		            </li>
		            <li>
		                <?php echo $this->Html->link('Go Back',array('controller' => 'Project', 'action' => 'viewProject', $projectid)); ?>
		            <li>
	            </ul>
	   
    </div>

    <div class="span9">
    <?php
        foreach($milestones as $milestone){
            ?>
            <h3><strong>
            <?php  
            echo $this->Html->link($milestone['Milestone']['title'], array('controller' => 'Project', 
               															   'action' => 'viewMilestone', $milestone['Milestone']['id'])); 
            ?>
            </strong></h3>
            <br/>
            <table class="table table-bordered">
            	<thead>
        			<tr>
	        			<th>Ticket id</th>
	        			<th>Title</th>
	        			<th>Assigned to</th>
	        			<th>Status</th>
	        			<th></th>
	        			<th></th>
                        <th></th>
        			</tr>
        		</thead>
        	<?php
            foreach($tickets as $ticket){
            	if($milestone['Milestone']['id']==$ticket['BugAndFeature']['milestone_id']){
        	?>
        			<tr>
                        <td>
                            <?php echo $ticket['BugAndFeature']['id']; ?>
                        </td>
                        <td>
                        	<?php
                             echo $this->Html->link($ticket['BugAndFeature']['title'], array('controller' => 'Project', 'action' => 'viewTicket', $ticket['BugAndFeature']['id']));
                        	?>
                        </td>
                        <td>
                            <a href="#"><?php echo $assignedto[$ticket['BugAndFeature']['assigned_to']]; ?></a>
                        </td>
                        <td>
                            <?php echo $status[$ticket['BugAndFeature']['status']]; ?>
                        </td>
						<td class="actions">
							<a href="<?php echo $this->Html->url(array('action' => 'editTicket', $ticket['BugAndFeature']['id'], $projectid)); ?>"><i class="icon-edit"></i> <strong>Edit</strong></a>
						</td>
			            <td class="actions">
							<a href="<?php echo $this->Html->url(array('action' => 'deleteTicket', $ticket['BugAndFeature']['id'], $projectid));?>"><i class="icon-remove"></i> <strong>Delete</strong></a>
				        </td>
                        <!--dropdown start-->
                        <td>
                            <div class="btn-group">
                                <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                                    Action
                                    <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- dropdown menu links -->
                                    <li>
			                           <?php		                            
			                           echo $this->Html->link('Attach Files', array('controller' => 'Project', 'action' => 'attachFiles', $ticket['BugAndFeature']['id']));
					     			   ?>
									</li>
	                            </ul>
                            </div>
                        </td>
                        <!--dropdown end-->
                    </tr>
                    <?php 
           	}
       	}?>
            </table>
        <?php
    	}
  		?>
		</div>
    </div>
</div>
