
 
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="ThemeBucket">
    <link rel="shortcut icon" href="<?php echo BASE_PATH; ?>webroot/img/favicon.png">
    <title>Easy Quote website</title>
	<script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.11.2.min.js"></script>
    <!--Core CSS -->
    <link href="<?php echo ADMIN_PATH; ?>bs3/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo ADMIN_PATH; ?>assets/jquery-ui/jquery-ui-1.10.1.custom.min.css" rel="stylesheet">
    <link href="<?php echo ADMIN_PATH; ?>css/bootstrap-reset.css" rel="stylesheet">
    <link href="<?php echo ADMIN_PATH; ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="<?php echo ADMIN_PATH; ?>assets/jvector-map/jquery-jvectormap-1.2.2.css" rel="stylesheet">
    <link href="<?php echo ADMIN_PATH; ?>css/clndr.css" rel="stylesheet">
    <!--clock css-->
    <link href="<?php echo ADMIN_PATH; ?>assets/css3clock/css/style.css" rel="stylesheet">
    <!--Morris Chart CSS -->
    <link rel="stylesheet" href="<?php echo ADMIN_PATH; ?>assets/morris-chart/morris.css">
    <!-- Custom styles for this template -->
    <link href="<?php echo ADMIN_PATH; ?>css/style.css" rel="stylesheet">
    <link href="<?php echo ADMIN_PATH; ?>css/style-responsive.css" rel="stylesheet"/>
    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="js/ie8/ie8-responsive-file-warning.js"></script><![endif]-->
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<section id="container">
<!--header start-->
<?php $empt=$this->request->session()->read('type')==""; ?>
	<?php if(!($empt)){?>
<header class="header fixed-top clearfix">
<!--logo start-->
<!--<div class="brand">

    <a href="index.html" class="logo">
        <img src="<?php echo ADMIN_PATH; ?>webroot/images/logo.png" alt="">
		<!--<img src="<?php echo UPLOAD_IMAGE ?><?php echo $this->request->session()->read('User.logo') ?>" alt="">-->
   <!-- </a>
    <div class="sidebar-toggle-box">
        <div class="fa fa-bars"></div>
    </div>
</div>-->
<!--logo end-->

<div class="nav notify-row" id="top_menu">
   
   
</div>
<div class="top-nav clearfix">
    <!--search & user info start-->
	
    <ul class="nav pull-right top-menu">
        <!-- user login dropdown start-->
        <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <img alt="" src="images/avatar1_small.jpg">
                <span class="username">John Doe</span>
                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu extended logout">
                <li><a href="<?php echo BASE_PATH; ?>users/view/<?php echo $this->request->session()->read('id'); ?>"><i class=" fa fa-suitcase"></i>Profile</a></li>
                <li><a href="#"><i class="fa fa-cog"></i> Settings</a></li>
				<li><a data-toggle="modal" href="#myModal"><i class="fa fa-key"></i>Change Password</a></li>
                <li><a href="<?php echo BASE_PATH; ?>users/logout"><i class="fa fa-key"></i> Log Out</a></li>
            </ul>
        </li>
        <!-- user login dropdown end -->
        
    </ul>
	
    <!--search & user info end-->
</div>
</header>
<?php } ?>
<!--header end-->

<!-- Modal -->
		<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
		  <div class="modal-dialog">
			  <div class="modal-content">
				  <div class="modal-header">
					  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					  <h4 class="modal-title">Change Password ?</h4>
				  </div>
				  <form action="<?php echo BASE_PATH ?>users/changepass" method="post">
					  <div class="modal-body">
						  <p>Enter your New Password.</p>
						  <input type="password" name="data[User][password]" required="required" placeholder="Password" autocomplete="off" id="UserPassword" class="form-control placeholder-no-fix">
						  <p>Enter your Old Password.</p>
						  <input type="password" name="data[User][oldpassword]" required="required" placeholder="Password" autocomplete="off" id="UserOldpassword" class="form-control placeholder-no-fix">
						  <p>Enter your Confirm Password.</p>
						  <input type="password" name="data[User][cpassword]" required="required" placeholder="Password" autocomplete="off" id="UserCpassword" class="form-control placeholder-no-fix">
					  </div>
					  <div class="modal-footer">
						  <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
						  <button class="btn btn-success"  type="submit">Submit</button>
					  </div>
				  </form>
			  </div>
		  </div>
		</div>
		<!-- modal -->

<!--sidebar start-->
<!--<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
       <!-- <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
               <!-- <li>
                    <a class="active" href="index.html">
                        <i class="fa fa-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>-->
				<!--<?php  
				$customer=$this->request->session()->read('type')=="customer";
				$user=$this->request->session()->read('type')=="user";
				$empt=$this->request->session()->read('type')=="";
				if(!($customer || $user || $empt)){ ?>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-laptop"></i>
                        <span>Users</span>
                    </a>
                    <ul class="sub">
                        <li><a href="<?php echo BASE_PATH; ?>users/add">Add Users</a></li>
                        <li><a href="<?php echo BASE_PATH; ?>users/index">List Users</a></li>
                    </ul>
                </li>
				<?php }elseif($user){ ?>
				<li class="sub-menu">
                    <a href="<?php echo BASE_PATH; ?>Users/index">
                        <i class="fa fa-laptop"></i>
                        <span>Users</span>
                    </a>
                </li>
				<?php } ?>
				
				
				<?php  if(!($customer || $user || $empt)){ ?>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Categories</span>
                    </a>
                    <ul class="sub">
                        <li><a href="<?php echo BASE_PATH; ?>categories/add">Add Category</a></li>
						<li><a href="<?php echo BASE_PATH; ?>categories/index">List Categories</a></li>
                    </ul>
                </li>
				<?php } ?>
				
				<?php  if(!($customer || $user || $empt)){ ?>
                <li>
                    <a href="<?php echo BASE_PATH; ?>QuestionFlows/index">
                        <i class="fa fa-bullhorn"></i>
                        <span>Question Flows </span>
                    </a>
                </li>
				<?php } ?>
				
			
				<?php if(!($user || $empt)){ ?>
				<li class="sub-menu">
                    <a href="<?php echo BASE_PATH; ?>Customers/index">
                        <i class="fa fa-th"></i>
                        <span>Customers</span>
                    </a>
                </li>
				<?php } ?>
				
				<?php if(!($empt)){ ?>
				<li>
                    <a href="<?php echo BASE_PATH; ?>Hires/index">
                        <i class="fa fa-bullhorn"></i>
                        <span>Hires </span>
                    </a>
                </li>
				<?php } ?>
				
				<?php  if(!($customer || $user || $empt)){ ?>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-tasks"></i>
                        <span>Hourly Rates</span>
                    </a>
                    <ul class="sub">
                        <li><a href="<?php echo BASE_PATH; ?>HourlyRates/add">Add hourly rates</a></li>
                        <li><a href="<?php echo BASE_PATH; ?>HourlyRates/index">List hourly rates</a></li>
                    </ul>
                </li>
				<?php }else if($user){ ?>
				<li class="sub-menu">
                    <a href="<?php echo BASE_PATH; ?>HourlyRates/index">
                        <i class="fa fa-tasks"></i>
                        <span>Hourly Rates</span>
                    </a>
                </li>
				<?php } ?>
				
				<?php  if(!($customer || $user || $empt)){ ?>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-envelope"></i>
                        <span>Options </span>
                    </a>
                    <ul class="sub">
                        <li><a href="<?php echo BASE_PATH; ?>Options/add">Add options</a></li>
                        <li><a href="<?php echo BASE_PATH; ?>Options/index">List options</a></li>
                    </ul>
                </li>
				<?php } ?>
				
				<?php  if(!($customer || $user || $empt)){ ?>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class=" fa fa-book"></i>
                        <span>Projects</span>
                    </a>
                    <ul class="sub">
                        <li><a href="<?php echo BASE_PATH; ?>Projects/add">Add Projects</a></li>
                        <li><a href="<?php echo BASE_PATH; ?>Projects/index">List Projects</a></li>
                    </ul>
                </li>
				<?php }else if($user){ ?>
				<li class="sub-menu">
                    <a href="<?php echo BASE_PATH; ?>Projects/index">
                        <i class="fa fa-book"></i>
                        <span>Projects</span>
                    </a>
                </li>
				<?php } ?>
				
				<?php  if(!($customer || $user || $empt)){ ?>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class=" fa fa-bar-chart-o"></i>
                        <span>Questions</span>
                    </a>
                    <ul class="sub">
                        <li><a href="<?php echo BASE_PATH; ?>Questions/add">Add Questions</a></li>
                        <li><a href="<?php echo BASE_PATH; ?>Questions/index">List Questions</a></li>
                    </ul>
                </li>
				<?php } ?>
				
				<?php  if(!($customer || $user || $empt)){ ?>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-envelope"></i>
                        <span>Selections</span>
                    </a>
                    <ul class="sub">
                        <li><a href="<?php echo BASE_PATH; ?>Selections/add">Add Selection</a></li>
                        <li><a href="<?php echo BASE_PATH; ?>Selections/index">List Selection</a></li>
                    </ul>
                </li>
				<?php }else if($customer){ ?>
				<li class="sub-menu">
                    <a href="<?php echo BASE_PATH; ?>Selections/index">
                        <i class="fa fa-envelope"></i>
                        <span>Selections</span>
                    </a>
                </li>
				<?php } ?>
				
				<?php  if(!($customer || $user || $empt)){ ?>
				<li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Services</span>
                    </a>
                    <ul class="sub">
                        <li><a href="<?php echo BASE_PATH; ?>Services/add">Add Services</a></li>
                        <li><a href="<?php echo BASE_PATH; ?>Services/index">List Services</a></li>
                    </ul>
                </li>
				<?php } ?>
				
				<?php  if(!($customer || $user || $empt)){ ?>
				<li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-glass"></i>
                        <span>Working Hours</span>
                    </a>
                    <ul class="sub">
                        <li><a href="<?php echo BASE_PATH; ?>WorkingHours/add">Add working hours</a></li>
                        <li><a href="<?php echo BASE_PATH; ?>WorkingHours/index">List working hours</a></li>
                    </ul>
                </li>
				<?php }else if($user){ ?>
				<li class="sub-menu">
                    <a href="<?php echo BASE_PATH; ?>WorkingHours/index">
                        <i class="fa fa-glass"></i>
                        <span>Working Hours</span>
                    </a>
                </li>
				<?php } ?>
				
            </ul>            
		</div>-->
        <!-- sidebar menu end-->
    <!--</div>
</aside>-->
<!--sidebar end-->
<!--main content start-->
<section id="main-content" style="margin-left:0px;margin-top:0px;">
<section class="wrapper" style="margin-top:0px;">

<!--mini statistics start-->
<div class="row">
    <?= $this->fetch('content') ?>
</div>
<!--mini statistics end-->


</section>
</section>
<!--main content end-->
<!--right sidebar start-->

<!--right sidebar end-->
</section>
<!-- Placed js at the end of the document so the pages load faster -->
<!--Core js-->
<script src="<?php echo ADMIN_PATH; ?>js/lib/jquery.js"></script>
<script src="<?php echo ADMIN_PATH; ?>assets/jquery-ui/jquery-ui-1.10.1.custom.min.js"></script>
<script src="<?php echo ADMIN_PATH; ?>bs3/js/bootstrap.min.js"></script>
<script src="<?php echo ADMIN_PATH; ?>js/accordion-menu/jquery.dcjqaccordion.2.7.js"></script>
<script src="<?php echo ADMIN_PATH; ?>js/scrollTo/jquery.scrollTo.min.js"></script>
<script src="<?php echo ADMIN_PATH; ?>assets/jQuery-slimScroll-1.3.0/jquery.slimscroll.js"></script>
<script src="<?php echo ADMIN_PATH; ?>js/nicescroll/jquery.nicescroll.js"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="<?php echo ADMIN_PATH; ?>js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="<?php echo ADMIN_PATH; ?>assets/skycons/skycons.js"></script>
<script src="<?php echo ADMIN_PATH; ?>assets/jquery.scrollTo/jquery.scrollTo.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
<script src="<?php echo ADMIN_PATH; ?>assets/calendar/clndr.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.5.2/underscore-min.js"></script>
<script src="<?php echo ADMIN_PATH; ?>assets/calendar/moment-2.2.1.js"></script>
<script src="<?php echo ADMIN_PATH; ?>js/calendar/evnt.calendar.init.js"></script>
<script src="<?php echo ADMIN_PATH; ?>assets/jvector-map/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo ADMIN_PATH; ?>assets/jvector-map/jquery-jvectormap-us-lcc-en.js"></script>
<!--<script src="<?php //echo ADMIN_PATH; ?>assets/gauge/gauge.js"></script>-->
<!--clock init-->
<script src="<?php echo ADMIN_PATH; ?>assets/css3clock/js/script.js"></script>
<!--Easy Pie Chart-->
<script src="<?php echo ADMIN_PATH; ?>assets/easypiechart/jquery.easypiechart.js"></script>
<!--Sparkline Chart-->
<script src="<?php echo ADMIN_PATH; ?>assets/sparkline/jquery.sparkline.js"></script>
<!--Morris Chart-->
<script src="<?php echo ADMIN_PATH; ?>assets/morris-chart/morris.js"></script>
<script src="<?php echo ADMIN_PATH; ?>assets/morris-chart/raphael-min.js"></script>
<!--jQuery Flot Chart-->
<!--<script src="<?php //echo ADMIN_PATH; ?>assets/flot-chart/jquery.flot.js"></script>
<script src="<?php //echo ADMIN_PATH; ?>assets/flot-chart/jquery.flot.tooltip.min.js"></script>
<script src="<?php //echo ADMIN_PATH; ?>assets/flot-chart/jquery.flot.resize.js"></script>
<script src="<?php //echo ADMIN_PATH; ?>assets/flot-chart/jquery.flot.pie.resize.js"></script>
<script src="<?php //echo ADMIN_PATH; ?>assets/flot-chart/jquery.flot.animator.min.js"></script>
<script src="<?php //echo ADMIN_PATH; ?>assets/flot-chart/jquery.flot.growraf.js"></script>
<script src="<?php //echo ADMIN_PATH; ?>js/dashboard.js"></script>
<script src="<?php echo ADMIN_PATH; ?>js/custom-select/jquery.customSelect.min.js" ></script>-->
<!--common script init for all pages-->
<script src="<?php echo ADMIN_PATH; ?>js/scripts.js"></script>

<!--<link rel="stylesheet" type="text/css" href="<?php //echo ADMIN_PATH; ?>css/fv.css" />

<script src="<?php //echo ADMIN_PATH; ?>js/multifield.js"></script>
<script src="<?php //echo ADMIN_PATH; ?>js/validator.js"></script>-->



<!--script for this page-->
</body>
</html>
 
 
 
 
 
 
 
 <!--<?php
 
$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?//= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?//= $cakeDescription ?>:
        <?//= $this->fetch('title') ?>
    </title>
    <?//= $this->Html->meta('icon') ?>

    <?//= $this->Html->css('base.css') ?>
    <?//= $this->Html->css('cake.css') ?>

    <?//= $this->fetch('meta') ?>
    <?//= $this->fetch('css') ?>
    <?//= $this->fetch('script') ?>
</head>
<body>
    <header>
        <div class="header-title">
            <span><?//= $this->fetch('title') ?></span>
        </div>
        <div class="header-help">
            <span><a target="_blank" href="http://book.cakephp.org/3.0/">Documentation</a></span>
            <span><a target="_blank" href="http://api.cakephp.org/3.0/">API</a></span>
        </div>
    </header>
    <div id="container">

        <div id="content">
            <?//= $this->Flash->render() ?>

            <div class="row">
                <?//= $this->fetch('content') ?>
            </div>
        </div>
        <footer>
        </footer>
    </div>
</body>
</html>-->
