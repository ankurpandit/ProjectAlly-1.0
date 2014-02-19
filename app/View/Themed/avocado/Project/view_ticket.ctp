<div class="row-fluid">
	<div class="span7 well">
		<?php 
			foreach($tickets as $ticket){
				echo '<b>Ticket: </b>';
				echo $ticket['BugAndFeature']['title'];
				echo '<br/>';
				echo '<br/>';
				echo '<b>Details: </b>';
				echo $ticket['BugAndFeature']['description'];
				echo '<br/>';
				echo '<br/>';
				echo '<b>Ticket created by: </b>';
				foreach ($users as $user){
					if($user['Profile']['id'] == $ticket['BugAndFeature']['reported_by'])
						echo $this->Html->link($user['Profile']['user_name'],
																array('controller' => 'Employee', 'action' => 'viewProfile', $user['Profile']['id']));
				}
				echo '<br/>';
				echo '<b>Ticket assigned to: </b>';
				foreach ($users as $user){
					if($user['Profile']['id'] == $ticket['BugAndFeature']['assigned_to'])
						echo $this->Html->link($user['Profile']['user_name'],
																array('controller' => 'Employee', 'action' => 'viewProfile', $user['Profile']['id']));
				}	
				echo '<br/>';
				echo '<b>Remaining Hours: </b>'.$ticket['BugAndFeature']['remaining_hours']."<br>";
				echo '<b>Total Worked Hours: </b>'.$ticket['BugAndFeature']['worked_hours'];
				echo '<br/>';
		?>
		<?php 
			echo $this->Form->create('BugAndFeature', array('url' => array('controller'=>'Project',
																	 'action'=>'updateTime',$ticket['BugAndFeature']['id'])));
			echo "Remaining Hours  ";
			echo $this->Form->input('remaining_hours',array('type'=>'text',
															'label'=>false,
															'div'=>false,
															'value'=>$ticket['BugAndFeature']['remaining_hours']));
			echo '<br/>';	
			echo "Worked Hours  ";
			echo $this->Form->input('worked_hours',array('type'=>'text',
														 'label'=>false,
													     'div'=>false));
			echo $this->Form->submit('Update Time',array('class'=>'btn'));
			echo $this->Form->end();
		?>
		<br/>
		<div class="well">
		<?php 
			echo $this->element('comments/index', array('model' => 'BugAndFeature', 'foreignKey' => $ticket['BugAndFeature']['id']));
		?>
		</div>
	</div>
	<div class="span3 well">
			<a href="<?php echo $this->Html->url(array('action' => 'editTicket', $ticket['BugAndFeature']['id'], $ticket['BugAndFeature']['project_id'])); ?>" class="btn btn-primary"><i class="icon-edit"></i> <strong>Edit</strong></a>
			<br/>
			<br/>
			<a href="<?php echo $this->Html->url(array('action' => 'deleteTicket', $ticket['BugAndFeature']['id'], $ticket['BugAndFeature']['project_id']));?>" class="btn btn-primary"><i class="icon-remove"></i> <strong>Delete</strong></a>
	</div>                
	<?php } ?>
			
</div>