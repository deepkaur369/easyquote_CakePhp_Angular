<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="ThemeBucket">
    <link rel="shortcut icon" href="images/favicon.png">
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

<style>
.fa-user-md:before {
  content: "\f0f0";
}
.fa-dollar:before,
.fa-usd:before {
  content: "\f155";
}
</style>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>	
<script>
function chngpass(){

	document.getElementById('p1').style.display="none";
	document.getElementById('p2').style.display="none";
	var newpass = document.getElementById('UserPassword').value;
	var oldpass = document.getElementById('UserOldpassword').value;
	var confmpass = document.getElementById('UserCpassword').value;
	var dat = { 'newpassword': newpass , 'password': oldpass, 'cpassword': confmpass};
	if(newpass != confmpass){
	
		
		document.getElementById('p2').style.display="block";
		document.getElementById('p2').innerHTML="Your new and confirm password doesn't match.Please try again";
		document.getElementById("UserPassword").value="";
		document.getElementById("UserOldpassword").value="";
		document.getElementById("UserCpassword").value="";
		
		
	
	}else{
	
		$.ajax({
			url: "<?php echo ADMIN_PATH; ?>users/c_changepass/" ,
			type: 'POST',
			data: dat,
			success: function (result) {
				//alert(result);
				if(result=="wrong"){
					document.getElementById('p1').style.display="block";
					document.getElementById('p1').innerHTML="Your password is wrong.Please try again";
					document.getElementById("UserPassword").value="";
					document.getElementById("UserOldpassword").value="";
					document.getElementById("UserCpassword").value="";
				}else{
					document.getElementById('p1').style.display="none";
					document.getElementById('p2').style.display="none";
					$("#close").click();
				}
				return false;
			}
		});
	}
return false;
}

function changeclass(id){
	document.getElementById('chng'+id).className="active";
}
</script>


<body>
<section id="container">

<!--header start-->
<header class="header fixed-top clearfix">
<!--logo start-->


<div class="brand">

    <a href="<?php echo ADMIN_PATH; ?>users/c_view" class="logo">
        <img src="<?php echo ADMIN_PATH; ?>webroot/images/logo.png" alt="">
		<!--<img src="<?php echo BASE_PATH; ?>webroot/<?php echo $this->request->session()->read('logo') ?>" alt="">-->
    </a>
    <div class="sidebar-toggle-box">
        <div class="fa fa-bars"></div>
    </div>
</div>
<!--logo end-->

<div class="nav notify-row" id="top_menu">
   
   
</div>

<div class="top-nav clearfix">
    <!--search & user info start-->
    <ul class="nav pull-right top-menu">
        <!-- user login dropdown start-->
        <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <img alt="" src="<?php echo BASE_PATH; ?>webroot/<?php echo $this->request->session()->read('logo') ?>">
                <span class="username"><?php echo $this->request->session()->read('name'); ?></span>
                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu extended logout">
                <li><a href="<?php echo BASE_PATH; ?>users/c_view/<?php echo $this->request->session()->read('id'); ?>"><i class=" fa fa-suitcase"></i>Profile</a></li>
                <!--<li><a href="#"><i class="fa fa-cog"></i> Settings</a></li>-->
				<li><a data-toggle="modal"  href="#myModal"><i class="fa fa-key"></i>Change Password</a></li>
                <li><a href="<?php echo BASE_PATH; ?>users/c_logout"><i class="fa fa-key"></i> Log Out</a></li>
            </ul>
        </li>
        <!-- user login dropdown end -->
        
    </ul>
    <!--search & user info end-->
</div>

</header>

<!--header end-->

<!-- Modal -->
		<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
		  <div class="modal-dialog">
			  <div class="modal-content">
				  <div class="modal-header">
					  <button type="button" id="close" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					  <h4 class="modal-title">Change Password ?</h4>
				  </div>
				  <form><!--action="<?php echo BASE_PATH ?>users/changepass" method="post"-->
					  <div class="modal-body">
						  
						  <p>Enter your Old Password.</p>
						  <input type="password" name="password" required="required" placeholder="Password" autocomplete="off" id="UserOldpassword" class="form-control placeholder-no-fix">
						  <div id="p1" style="color:red;display:none;"></div>
						  <div id="p" style="color:red;display:none;"></div>
						  <p>Enter your New Password.</p>
						  <input type="password" name="newpassword" required="required" placeholder="Password" autocomplete="off" id="UserPassword" class="form-control placeholder-no-fix">
						  <p>Enter your Confirm Password.</p>
						  <input type="password" name="cpassword" required="required" placeholder="Password" autocomplete="off" id="UserCpassword" class="form-control placeholder-no-fix">
						  <div id="p2" style="color:red;display:none;"></div>
					  </div>
					  <div class="modal-footer">
						  <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
						  <button class="btn btn-success" onclick="return chngpass()" type="submit">Submit</button>
					  </div>
				  </form>
			  </div>
		  </div>
		</div>
		<!-- modal -->

<!--sidebar start-->

<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
             
				<?php  
				$customer=$this->request->session()->read('type')=="customer";
				$client=$this->request->session()->read('type')=="client";
				$empt=$this->request->session()->read('type')=="";
				$user=$this->request->session()->read('type')=="user";
				?>
				
			
				<li class="sub-menu">
                    <a  href="<?php echo BASE_PATH; ?>Customers/c_index">
                        <i class="fa fa-user-md"></i>
                        <span class="<?php echo $this->name == 'Customers'?'activee':''; ?>">Customers</span>
                    </a>
                </li>
				
				
				<li class="sub-menu">
                    <a  href="<?php echo BASE_PATH; ?>HourlyRates/c_index">
                        <i class="fa fa-usd"></i>
                        <span class="<?php echo $this->name == 'HourlyRates'?'activee':''; ?>" >Hourly Rates</span>
                    </a>
                </li>
				
							
				<li class="sub-menu">
                    <a  href="<?php echo BASE_PATH; ?>Projects/c_index">
                        <i class="fa fa-tasks"></i>
                        <span class="<?php echo $this->name == 'Projects'?'activee':''; ?>">Portfolio</span>
                    </a>
                </li>
				
				
				<li class="sub-menu">
                    <a  href="<?php echo BASE_PATH; ?>Services/c_allservice">
                        <i class="fa fa-th"></i>
                        <span class="<?php echo $this->name == 'Services'?'activee':''; ?>">Services</span>
                    </a>
                </li>
				
				
            </ul>            
		</div>
        <!-- sidebar menu end-->
    </div>
</aside>

<!--sidebar end-->
<!--main content start-->

<section id="main-content" >
<section class="wrapper" >

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

<!--start of form validations-->
<link rel="stylesheet" type="text/css" href="<?php echo ADMIN_PATH; ?>css/fv.css" />

<script src="<?php echo ADMIN_PATH; ?>js/multifield.js"></script>
<!--<script src="<?php echo ADMIN_PATH; ?>js/validator.js"></script>
		<script>
		
		
		
		// initialize the validator function
		validator.message['date'] = 'not a real date';
		
		// validate a field on "blur" event, a 'select' on 'change' event & a '.reuired' classed multifield on 'keyup':
		$('form')
			.on('blur', 'input[required], input.optional, select.required', validator.checkField)
			.on('change', 'select.required', validator.checkField)
			.on('keypress', 'input[required][pattern]', validator.keypress);
			
		$('.multi.required')
			.on('keyup blur', 'input', function(){ 
				validator.checkField.apply( $(this).siblings().last()[0] );
			});
				
		// bind the validation to the form submit event
		//$('#send').click('submit');//.prop('disabled', true);

		$('form').submit(function(e){
			e.preventDefault();
			var submit = true;
			// evaluate the form using generic validaing
			if( !validator.checkAll( $(this) ) ){
				submit = false;
			}

			if( submit )
				this.submit();
			return false;
		});
		
		/* FOR DEMO ONLY */
		$('#vfields').change(function(){
			$('form').toggleClass('mode2');
		}).prop('checked',false);
		
		$('#alerts').change(function(){
			validator.defaults.alerts = (this.checked) ? false : true;
			if( this.checked )
				$('form .alert').remove();
		}).prop('checked',false);
	</script>-->

<!--end of form validation -->

<!--common script init for all pages-->
<script src="<?php echo ADMIN_PATH; ?>js/scripts.js"></script>



<!--script for this page-->
</body>
</html>