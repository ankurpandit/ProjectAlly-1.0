<!--validation code starts here-->
<?php
    echo $this->Html->script('jqBootstrapValidation');
?>
<script>
    $(function () { $("input,select,textarea").not("[type=submit]").jqBootstrapValidation(); } );
</script>
<div class="row-fluid">
	<div class="eventTypes form well span6">
	<?php echo $this->Form->create('EventType');?>
		<fieldset>
	 		<legend>Add Event Type</legend>
		<?php
			echo $this->Form->input('name', array('required'));
			echo $this->Form->input('color', 
						array('options' => array(
							'Blue' => 'Blue',
							'Red' => 'Red',
							'Pink' => 'Pink',
							'Purple' => 'Purple',
							'Orange' => 'Orange',
							'Green' => 'Green',
							'Gray' => 'Gray',
							'Black' => 'Black',
							'Brown' => 'Brown'
						)));
	
		?>
		</fieldset>
	<?php echo $this->Form->end(__('Submit', true));?>
	</div>
	<div class="actions span6">
		<ul class="nav nav-tabs nav-stacked span3">
			<li><?php echo $this->Html->link('Manage Events', array('action' => 'event')); ?></li>
	        <li><?php echo $this->Html->link('View Calendar', array('action' => 'index')); ?></li>
		</ul>
	</div>
</div>