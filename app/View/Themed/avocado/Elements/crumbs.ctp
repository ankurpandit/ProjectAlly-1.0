<?php 
	$cont = $this->request->params['controller'];
	$act = $this->request->params['action'];
?>
<div class="breadcrumb clearfix">
		<div class="container">

			<ul class="pull-left">
				<li><a href="#"><i class="icon-home"></i> Home</a> <span class="divider">/</span></li>
				<li class="active"><a href="#"><i class="icon-align-justify"></i> <?php echo $cont; ?></a>
					<span class="divider">/</span>
				</li>
				<li class="active"><a href="#"><i class="icon-align-justify"></i> <?php echo $act; ?></a></li>
			</ul>
		</div>
		
	</div>
