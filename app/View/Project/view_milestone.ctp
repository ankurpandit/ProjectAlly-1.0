<div class="row-fluid">
	<div class="span9 well">
		<?php 
			foreach($milestones as $milestone){
				echo '<b>Milestone: </b>';
				echo $milestone['Milestone']['title'];
				echo '<br/>';
				echo '<br/>';
				echo '<b>Details: </b>';
				echo $milestone['Milestone']['description'];
				echo '<br/>';
				echo '<b>Due date: </b>';
				echo $this->Time->format('F jS, Y ', $milestone['Milestone']['due_date'])."<br/>";
				echo "<b>Remaining Hours: </b>".$milestone['Milestone']['remaining_hours']."<br/>";
				echo "<b>Total Worked Hours: </b>".$milestone['Milestone']['worked_hours'];
				echo '<br/>';
				echo '<br/>';
				echo '<b>Responsible user: </b>';
				foreach ($users as $user){
					if($user['Profile']['id'] == $milestone['Milestone']['responsible_user'])
					echo $this->Html->link($user['Profile']['user_name'],
																array('controller' => 'Employee', 'action' => 'viewProfile', $user['Profile']['id']));
				}
				echo '<br/>';
		?>
		<br/>
		<div class="well">
		<?php 
			echo $this->element('comments/index', array('model' => 'Milestone', 'foreignKey' => $milestone['Milestone']['id']));
		?>
		</div>
		</div>
		<div class="span3 well">
			<a href="<?php echo $this->Html->url(array('controller' => 'Project', 
            													 'action' => 'editMilestone', $milestone['Milestone']['id'], $milestone['Milestone']['project_id'])); ?>" class="btn btn-primary"><i class="icon-edit"></i> <strong>Edit</strong></a>
			<br/>
			<br/>
			<a href="<?php echo $this->Html->url(array('controller' => 'Project', 
            													 'action' => 'deleteMilestone', $milestone['Milestone']['id'], $milestone['Milestone']['project_id']));?>" class="btn btn-primary"><i class="icon-remove"></i> <strong>Delete</strong></a>
		</div>
	
</div>
<?php } ?>
		