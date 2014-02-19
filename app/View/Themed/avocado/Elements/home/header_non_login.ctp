<!-- Top Fixed Bar -->
<div class="navbar navbar-inverse navbar-fixed-top">

	<!-- Top Fixed Bar: Navbar Inner -->
	<div class="navbar-inner">

		<!-- Top Fixed Bar: Container -->
		<div class="container">

			<!-- Mobile Menu Button -->
			<a href="#">
				<button type="button" class="btn btn-navbar mobile-menu">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</a>
			<!-- / Mobile Menu Button -->

			<!-- / Logo / Brand Name -->
			<a class="brand" href="#"><i class="icon-leaf"></i> Project<span class="header-text-color"><strong>Ally</strong></a>
			<!-- / Logo / Brand Name -->

			<!-- User Features -->
			<ul class="nav pull-right">
				<li class="dropdown">
					<a href="<?php echo $this->Html->url(array('controller' => 'Home', 'action' => 'index')); ?>" >
						<i class="icon-home icon-white"></i> 
						<span class="hidden-phone">Home</span>
					</a>
				</li>
				<li class="dropdown">
					<a href="<?php echo $this->Html->url(array('controller' => 'Home', 'action' => 'aboutUs')); ?>" >
						<i class="icon-group icon-white"></i> 
						<span class="hidden-phone">About us</span>
					</a>
				</li>
				<li class="dropdown">
					<a href="<?php echo $this->Html->url(array('controller' => 'Home', 'action' => 'signIn')); ?>" >
						<i class="icon-signin icon-white"></i> 
						<span class="hidden-phone">Sign in</span>
					</a>
				</li>
				<li class="dropdown">
					<a href="<?php echo $this->Html->url(array('controller' => 'Home', 'action' => 'signUp')); ?>" >
						<i class="icon-signout icon-white"></i> 
						<span class="hidden-phone">Sign up</span>
					</a>
				</li>
			</ul>

		</div>
		<!-- / Top Fixed Bar: Container -->

	</div>
	<!-- / Top Fixed Bar: Navbar Inner -->


</div>
<!-- / Top Fixed Bar -->


