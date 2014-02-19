<?php
    $act = $this->request->params['action'];
    $cont = $this->request->params['controller'];
	$role = $this->Session->read('User.role');
    $name = $this->Session->read('User.name');
?>
<div class="navbar navbar-inverse" id="nav">

	<!-- Main Navigation: Inner -->
	<div class="navbar-inner">

		<!-- Main Navigation: Nav -->
		<ul class="nav">

			<li class="<?php if($cont == 'Home'){ echo "active"; }?>">
				<a href="<?php echo $this->Html->url(array('controller' => 'Home', 'action' => 'homePage')); ?>">
					<i class="icon-align-justify"></i> Dashboard
				</a>
			</li>
			<li class="<?php if($cont == 'Project'){ echo "active"; }?>">
				<a href="<?php echo $this->Html->url(array('controller' => 'Project', 'action' => 'listProject')); ?>" >
					<i class="icon-th"></i>Project 
				</a>
			</li>
			<li class="<?php if($cont == 'Employee'){ echo "active"; }?>">
				<a href="<?php echo $this->Html->url(array('controller' => 'Employee', 'action' => 'index')); ?>">
					<i class="icon-magic"></i> Employee Summary
				</a>
			</li>
			<li class="<?php if($cont == 'Calendar'){ echo "active"; }?>">
				<a href="<?php echo $this->Html->url(array('controller' => 'Calendar', 'action' => 'index')); ?>" >
					<i class="icon-th-large"></i> Calendar 
				</a>
			</li>
			
		</ul>
		
		<form class="navbar-search pull-right">
			<input type="text" class="search-query typeahead" placeholder="Search">
		</form>
		
	</div>
	
</div>