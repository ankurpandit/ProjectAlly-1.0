<?php 
	$cssArray = array('/Themed/avocado/css/chosen', '/Themed/avocado/css/bootstrap.min', '/Themed/avocado/theme/css/avocado', '/Themed/avocado/css/prism','/Themed/avocado/css/fullcalendar', '/Themed/avocado/css/bootstrap-responsive', '/Themed/avocado/css/custom.css','/Themed/avocado/css/libs/modernizr-2.5.3-respond-1.1.0.min');

	$jsArrayPreDOM = array('/Themed/avocado/js/excanvas.min.js', '/Themed/avocado/js/jquery.flot.js', '/Themed/avocado/js/jquery.jpanelmenu.min.js', '/Themed/avocado/js/jquery.cookie.js', '/Themed/avocado/js/avocado-custom-predom.js');

	$jsArrayPostDOM = array('/Themed/avocado/js/jquery.hotkeys.js', '/Themed/avocado/js/calendar/fullcalendar.min.js', '/Themed/avocado/js/jquery-ui-1.10.2.custom.min.js', '/Themed/avocado/js/jquery.pajinate.js', '/Themed/avocado/js/jquery.dataTables.min.js', '/Themed/avocado/js/charts/jquery.flot.time.js', '/Themed/avocado/js/charts/jquery.flot.pie.js', '/Themed/avocado/js/charts/jquery.flot.resize.js', '/Themed/avocado/js/bootstrap/bootstrap.min.js', '/Themed/avocado/js/bootstrap/bootstrap-wysiwyg.js', '/Themed/avocado/js/bootstrap/bootstrap-typeahead.js', '/Themed/avocado/js/jquery.easing.min.js', '/Themed/avocado/jjs/query.chosen.min.js', '/Themed/avocado/js/avocado-custom.js');
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

	<?php echo $this->Session->flash(); ?> 
		
	<?php echo $this->fetch('content'); ?>
	

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