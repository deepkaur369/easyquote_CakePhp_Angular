<!DOCTYPE html>
<html lang="en">
<head>
	<?php echo $this->Html->charset() ?>
    <link rel="shortcut icon" href="images/favicon.png">
    <title>
        <?php echo $this->fetch('title') ?>
	</title>
	<script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.11.2.min.js"></script>
    <link href="<?php echo ADMIN_PATH; ?>bs3/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo ADMIN_PATH; ?>css/bootstrap-reset.css" rel="stylesheet">
	 <link href="<?php echo ADMIN_PATH; ?>bs3.0/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo ADMIN_PATH; ?>css/style.css" rel="stylesheet">


</head>
<body>

<section id="container">

<header class="header fixed-top clearfix">

<!--<div class="brand">
    <a href="<?php echo ADMIN_PATH; ?>" class="logo">  <img src="<?php echo ADMIN_PATH; ?>webroot/images/logo.png" alt="logo"> </a>
</div>-->


<div class="nav notify-row" id="top_menu">

	<!--<div style="width:180px;float:left">
		<?php echo $this->Form->input('category_id',['options' => $categories,'label'=>false,'class'=>"form-control",'placeholder'=>"",'empty'=>'Select Category','id'=>'category']); ?>
	</div>
	
	<div style="width:180px;float:left;margin-left:10px;">	
		<input type="text" id="service"  class="form-control" placeholder="Service Name" />
		<input type="hidden" id="serviceID"  class="form-control" autocomplete="off" />
	</div>

	<div style="width:300px;float:left;margin-left:10px;">	
		<button type="submit" id="creatService" onclick="setService()" class="btn btn-default">Create Flow</button>
		<button style="display:none;" type="submit" id="saveService" onclick="saveService('no')" class="btn btn-default">Save Flow</button>
		<button style="display:none;" type="submit" id="save_Service" onclick="saveService('yes')" class="btn btn-default">Save and New</button>
	</div>	-->

</div>

<!--<div class="top-nav clearfix">
    <ul class="nav pull-right top-menu">
        <li class="dropdown">
            <a  class="dropdown-toggle" href="<?php echo ADMIN_PATH; ?>">
              &nbsp;  Go Back
            </a>
        </li>   
    </ul>
</div>-->
</header>
	<section id="main-content" style="margin-left:0px!important">
		<section class="wrapper" style="  margin-top: 0px!important">
	
		
<!--mini statistics start  AND FLOW CSS AND JQUERY -->

			<link href="<?php echo ADMIN_PATH; ?>flow/font-awesome.css" rel="stylesheet">
			<link href="<?php echo ADMIN_PATH; ?>flow/jsplumb.css" rel="stylesheet">
			<link rel="stylesheet" href="<?php echo ADMIN_PATH; ?>flow/demo.css">

			<div class="row">
				<?= $this->fetch('content') ?>
			</div>

		
		
			
<!--mini statistics end  AND FLOW CSS AND JQUERY -->
			
		</section>
	</section>
</section>

<script src="<?php echo ADMIN_PATH; ?>bs3/js/bootstrap.min.js"></script>
<script src="<?php echo ADMIN_PATH; ?>js/scripts.js"></script>
</body>
</html>