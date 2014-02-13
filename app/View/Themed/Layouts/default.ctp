<?php 
	$cssArray = array('assets/chosen', 'assets/bootstrap.min', 'assets/theme/avocado', 'assets/prism','assets/fullcalendar', 'assets/bootstrap-responsive','libs/modernizr-2.5.3-respond-1.1.0.min');

	$jsArrayPreDOM = array('assets/excanvas.min.js', 'assets/jquery.flot.js', 'assets/jquery.jpanelmenu.min.js', 'assets/jquery.cookie.js', 'assets/avocado-custom-predom.js');

	$jsArrayPostDOM = array('assets/js/jquery.hotkeys.js', 'assets/calendar/fullcalendar.min.js', 'assets/jquery-ui-1.10.2.custom.min.js', 'assets/jquery.pajinate.js', 'assets/jquery.dataTables.min.js', 'assets/charts/jquery.flot.time.js', 'assets/charts/jquery.flot.pie.js', 'assets/charts/jquery.flot.resize.js', 'assets/bootstrap/bootstrap.min.js', 'assets/bootstrap/bootstrap-wysiwyg.js', 'assets/bootstrap/bootstrap-typeahead.js', 'assets/jquery.easing.min.js', 'assets/jquery.chosen.min.js', 'assets/avocado-custom.js');
?>	
<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!-->
<html lang="en">
<!--<![endif]-->
<head>
<?php echo $this->Html->charset(); ?>

<?php echo $this->Html->meta(array('name' => 'X-UA-Compatible', 'content' => 'IE=edge,chrome=1')); ?>

<title><?php echo $title_for_layout; ?></title>


<?php echo $this->Html->meta('keywords',''); ?>
<?php echo $this->Html->meta('description',''); ?>
<?php echo $this->Html->meta(array('name' => 'author', 'content' => 'Hardik Shah')); ?>
<?php echo $this->Html->meta(array('name' => 'viewport', 'content' => 'width=device-width')); ?>

	<?php echo $this->Html->css($cssArray); ?>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,400,600,300' rel='stylesheet' type='text/css'> 

  	<!-- FILE UPLOAD STYLE -->
  	<link rel="stylesheet" href="http://blueimp.github.com/Bootstrap-Image-Gallery/css/bootstrap-image-gallery.min.css">
  	<link rel="stylesheet" href="<?php echo Router::url('/', true) ?>file_upload/css/jquery.fileupload-ui.css">


    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> 
  	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=false"></script>
	<?php echo $this->Html->script($jsArrayPreDOM); ?>
	
<?php
	echo $this->fetch('meta');
	echo $this->fetch('css');
	echo $scripts_for_layout;
?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/libs/jquery-1.7.2.min.js"><\/script>')</script>
 <style type="text/css">
  	body { padding-top: 102px; }
  </style>   
</head>
<body>
	<header>
		<?php 
			echo $this->element('home/header'); 
		?>
	</header>
	<div class="content">
		<div class="container">
		<?php echo $this->Session->flash(); ?>
		<?php echo $this->fetch('content'); ?>
		</div>
	</div>
	<footer>
		<?php 
			echo $this->element('home/footer');			
		?>
	</footer>


<?php echo $this->Html->script($jsArrayPostDOM); ?>

<?php echo $this->fetch('script'); ?>
<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', '<?php echo Configure::read('ga');?>']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</body>
</html>