<?php
    $act = $this->request->params['action'];
    $cont = $this->request->params['controller'];
	$role = $this->Session->read('User.role');
    $name = $this->Session->read('User.name');
?>
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
				
				<!-- User Navigation: Notifications -->
				<li class="dropdown">

					<!-- User Navigation: Notifications Link -->
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="icon-align-justify icon-white"></i>
						<span class="hidden-phone"> Notifications </span>
						<span class="badge badge-inverse"></span>
					</a>
					<!-- / User Navigation: Notifications Link -->

					<!-- User Navigation: Notifications Dropdown -->
					<ul class="dropdown-menu widget">

						<!-- User Navigation: Notifications Top -->
						<li>

							<!-- User Navigation: Notifications Add News -->
							<a href="#" class="send" rel="tooltip" title="Add News"><i class="icon-edit"></i></a>
							<!-- / User Navigation: Notifications Add News -->

							<!-- User Navigation: Notifications Header -->
							<h2><i class="icon-align-justify"></i> Notifications 
							<span class="badge badge-light small"><?php echo $notify; ?></span></h2>
							<!-- / User Navigation: Notifications Header -->
						</li>
						<!-- / User Navigation: Notifications Top -->

						<!-- User Navigation: Notifications Item -->
						<li>
							<a href="#" class="note">
								<small>1 hour ago</small>
								<p><i class="icon-edit"></i> <b>You</b> added <b>We´ve launched!</b></p>
							</a>
						</li>
						<!-- / User Navigation: Notifications Item -->

						<!-- User Navigation: Notifications Item -->
						<li>
							<a href="#" class="note">
								<small>6 hour ago</small>
								<p><i class="icon-edit"></i> <b>You</b> added <b>Some changes</b></p>
							</a>
						</li>
						<!-- / User Navigation: Notifications Item -->

						<!-- User Navigation: Notifications Item -->
						<li>
							<a href="#" class="note">
								<small>12 hour ago</small>
								<p><i class="icon-envelope"></i> <b>Jason</b> sendt you a message</p>
							</a>
						</li>
						<!-- / User Navigation: Notifications Item -->

						<!-- User Navigation: Notifications Item -->
						<li>
							<a href="#" class="note">
								<small>15 hour ago</small>
								<p><i class="icon-user"></i> <b>Kate</b> added you as friend</p>
							</a>
						</li>
						<!-- / User Navigation: Notifications Item -->

						<!-- User Navigation: Notifications View All -->
						<li><a href="#" class="text-center"><i class="icon-inbox"></i> View All Notifications</a></li>
						<!-- / User Navigation: Notifications View All -->

					</ul>
					<!-- / User Navigation: Notifications Dropdown -->

				</li>
				<!-- / User Navigation: Notifications -->

				<!-- User Navigation: Messages -->
				<li class="dropdown">

					<!-- User Navigation: Messages Link -->
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="icon-envelope icon-white"></i>
						<span class="hidden-phone"> Messages </span>
						<span class="badge badge-inverse">5</span>
					</a>
					<!-- / User Navigation: Messages Link -->

					<!-- / User Navigation: Messages Dropdown -->
					<ul class="dropdown-menu widget">

						<!-- User Navigation: Messages Top -->
						<li>

							<!-- User Navigation: Messages New Message -->
							<a href="#" class="send" rel="tooltip" title="New Message"><i class="icon-edit"></i></a>
							<!-- / User Navigation: Messages New Message -->

							<!-- User Navigation: Messages Header -->
							<h2><i class="icon-envelope"></i> Messages <span class="badge badge-light small">6</span></h2>
							<!-- / User Navigation: Messages Header -->

						</li>
						<!-- / User Navigation: Messages Top -->

						<!-- User Navigation: Messages Message -->
						<li>
							<a href="#" class="message">
								<small>1 hour ago</small>
								<h3><i class="icon-user"></i> Jason</h3>
								<p>Keep up the work! </p>
							</a>
						</li>
						<!-- / User Navigation: Messages Message -->

						<!-- User Navigation: Messages Message -->
						<li>
							<a href="#" class="message">
								<small>3 hour ago</small>
								<h3><i class="icon-user"></i> Janika</h3>
								<p>Did you update that thing? </p>
							</a>
						</li>
						<!-- / User Navigation: Messages Message -->

						<!-- User Navigation: Messages View All Messages -->
						<li>
							<a href="#" class="text-center">
								<i class="icon-inbox"></i> View All Messages
							</a>
						</li>
						<!-- / User Navigation: Messages View All Messages -->

					</ul>
					<!-- / User Navigation: Messages Dropdown -->

				</li>
				<!-- / User Navigation: Messages -->

				<!-- User Navigation: User -->
				<li class="dropdown">

					<!-- User Navigation: User Link -->
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="icon-user icon-white"></i> 
						<span class="hidden-phone"><?php echo $this->Session->read('User.name') ?></span>
					</a>
					<!-- / User Navigation: User Link -->

					<!-- User Navigation: User Dropdown -->
					<ul class="dropdown-menu">
						<li><a href="<?php echo $this->Html->url(array('controller' => 'Employee', 'action' => 'userProfile')) ?>"><i class="icon-user"></i> Profile</a></li>
						<li><a href="#settings" data-toggle="modal"><i class="icon-cog"></i> Settings</a></li>
						<li><a href="#messages" data-toggle="modal"><i class="icon-envelope"></i> Messages</a></li>
						<li class="divider"></li>
						<li><a href="#"><i class="icon-off"></i> Logout</a></li>
					</ul>
					<!-- / User Navigation: User Dropdown -->

				</li>
				<!-- / User Navigation: User -->

			</ul>
			<!-- / User Navigation -->

		</div>
		<!-- / Top Fixed Bar: Container -->

	</div>
	<!-- / Top Fixed Bar: Navbar Inner -->

	<!-- Top Fixed Bar: Breadcrumb -->
	<?php echo $this->element('crumbs'); ?>

</div>
<!-- / Top Fixed Bar -->


