<!--<script src="js/analytics.js" async="" type="text/javascript"></script>
		<script src="<?php echo ADMIN_PATH; ?>js/analytics_002.js" async="" type="text/javascript"></script>
		<script src="<?php echo ADMIN_PATH; ?>js/widgets.js" id="twitter-wjs"></script>
		<script src="<?php echo ADMIN_PATH; ?>js/sdk.js" id="facebook-jssdk"></script>
		<script src="<?php echo ADMIN_PATH; ?>js/fdh7aco.js"></script>

		<link href="<?php echo ADMIN_PATH; ?>css/d.css" rel="stylesheet">
	<script src="<?php echo ADMIN_PATH; ?>js/main.js"></script>
-->

<script type="text/javascript" src="<?php echo ADMIN_PATH  ?>js/jquery-1.3.2.js" ></script>
<script type="text/javascript" src="<?php echo ADMIN_PATH  ?>js/ajaxupload.3.5.js" ></script>
<!-- Drawings frame start -->

<div id="main">


    <div class="demo statemachine-demo" id="statemachine-demo" style="display:none;">
	
	<!--  Dynamic Stacks for questions and options start  -->
	
		<div style="width:15%;height:50px!important;padding:10px;!important;">
		
		<!--##################### Stack for Questions #############################-->
		
			<div style="width:20%!important;float:left!important;">
				<?php 
				$limit = 50;
				for($i = 1; $i<=$limit;$i++){
					if($i==$limit){
					/* Create empty start object */
				?>
				<div class="w" id="<?php echo $i ?>">
					<input type="hidden"  id="type<?php echo $i ?>" value="question" />
					<input type="hidden" value="0" autocomplete="off" id="last_insert_id_<?php echo $i ?>" />
						Start  
					<div class="ep"></div>
				</div>
				<?php 
					}else{
					/* Create Question Object */
					?>
					<div class="w" id="<?php echo $i ?>">
					
						<input type="hidden"  id="type<?php echo $i ?>" value="question" />
						<input type="hidden" autocomplete="off" id="last_insert_id_<?php echo $i ?>" />
						<input type="hidden" id="parent_id_<?php echo $i ?>" value="" />
				
				<!-- Add Button  -->
				<a href="#question" id="add1<?php echo $i ?>" onclick="setID(<?php echo $i ?>,'question')" data-toggle="modal" data-target="#question" > </a>
				
				<a id="add<?php echo $i ?>" href="javascript:getClk(<?php echo $i ?>)" >Add Questions</a>
				
				
				<!-- Update Button -->
				<a href="#question" data-original-title="Question" data-content="" data-placement="right" data-trigger="hover" class="popovers" style="display:none" id="edit<?php echo $i ?>" onclick="setID(<?php echo $i ?>,'question'),editQuestion(<?php echo $i ?>);" data-toggle="modal" data-target="#question" ></a>
				
				
						<div class="ep"></div>
					</div>
					
					<?php  
					}
				} ?>
			</div>
			
<!--######################### Stack for Options ##########################-->	
			
			<div style="width:15%!important;float:right!important;text-align:right;">
				<?php for($i = 100; $i<=200;$i++){?>
				<div class="w" id="<?php echo $i ?>">
					
					
					<input type="hidden"  id="type<?php echo $i ?>" value="option" />
					<input type="hidden" id="last_insert_id_<?php echo $i ?>" value="" />
					<input type="hidden" id="parent_id_<?php echo $i ?>" value="" />
				
					<a href="#option" id="clickMe_<?php echo $i ?>" onclick="setID(<?php echo $i ?>,'option')" data-toggle="modal" data-target="#option" ></a>
					
				<!-- Add Button -->
					<a id="add<?php echo $i ?>" href="javascript:getClick(<?php echo $i ?>,'dummy')" >Add Options</a>
				<!-- Update Button -->
					<a data-original-title="Option" data-content="" data-placement="right" data-trigger="hover" class="popovers" style="display:none" id="edit<?php echo $i ?>" href="javascript:getClick(<?php echo $i ?>,'getdata')" > </a>
					
					
					<div class="ep"></div>
				</div>
				<?php } ?>
			</div>
			
	
			
		</div>


	</div>
	<div class="container">
	<!-- Corners -->
	<div class="corner-wrapper">
		<div class="corners-top-wrapper">
			
			<div class="corners corner--t-m hidden-xs">
				<span class="js-sitename" >
					How Much to Make an App			</span>
				&nbsp;
			</div>
			
		</div>
		
	</div>
		<!-- Content -->
		<div class="content">
			<div class="container">
				<div class="js-page">
					<div class="row landing fadeIn">
						<div class="col-sm- col-centered text-center">

							<div class="banner fadeInDown hidden-md hidden-lg"><img class="lander" src="images/landing.png"></div>
							<div class="device-container hidden-xs hidden-sm">
								<div class="device d-iphone bounceInRight"><img src="images/iphone-c.png" alt=""></div>
								<div class="device d-ipad fadeInUpT"><img src="images/ipad-c.png" alt=""></div>
								<div class="device d-android bounceInLeft"><img src="images/android-c.png" alt=""></div>
								<img class="line bounceInLeftT" src="images/line.png" alt="">
							</div>
							<form method="post" action="<?php echo ADMIN_PATH; ?>/questions/front_flow">
							<input type="hidden" value="start" name="start">
							<h1>Start the Project</h1>
							<p>Easily calculate the cost of a using this handy tool</p>
							<button class="btn btn-lg btn-info js-get-started" type="submit">Start <span>→</span></button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
	
<!--<body data-twttr-rendered="true">
<div class="container">
<nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">
				<ul class="nav navbar-nav">
				<li>
				<a href="#">About</a>
				</li>
				<li class="active">
				<a href="#">Blog</a>
				</li>
				<li>
				<a href="#">We're Hiring</a>
				</li>
				
				</ul>
				<ul class="nav navbar-nav navbar-right">
				<li>
				<a onclick="ga('send', 'event', 'Navbar', 'Community links', 'Expo');" href="#">Suggest FiXR Listing</a>
				</li>
				<li>
				<a onclick="ga('send', 'event', 'Navbar', 'Community links', 'Blog');" href="#">Login</a>
				</li>
				</ul>
			</nav>
</div>
<!-- Loader -->
<!--<div id="loader" class="js-loader">
	<div>
    	<span>
        	<img src="images/spinner.svg" id="spinner" alt="Loading">
    	</span>
	</div>
</div>



<!-- Border -->

<!--<div class="container">
<!-- Corners -->
<!--<div class="corner-wrapper">
	<div class="corners-top-wrapper">
		<div class="corners corner--t-l">
							<a class="js-back" style="display:none;">← Previous Question</a>
						<a class="js-startover" style="display:none;" href="">← Start Again</a>
		</div>
		<div class="corners corner--t-m hidden-xs">
			<span class="js-sitename" style="display:none;">
			    How Much to Make an App			</span>
			&nbsp;
		</div>
		
	</div>
	
</div>

<!-- Content -->
<!--<div class="content">
	<div class="container">
		<div class="js-page"><div class="row landing fadeIn">
    <div class="col-sm- col-centered text-center">

        <div class="banner fadeInDown hidden-md hidden-lg"><img class="lander" src="images/landing.png"></div>
						<div class="device-container hidden-xs hidden-sm">
							<div class="device d-iphone bounceInRight"><img src="images/iphone-c.png" alt=""></div>
							<div class="device d-ipad fadeInUpT"><img src="images/ipad-c.png" alt=""></div>
							<div class="device d-android bounceInLeft"><img src="images/android-c.png" alt=""></div>
							<img class="line bounceInLeftT" src="images/line.png" alt="">
						</div>
        <h1>Start the Project</h1>
        <p>Easily calculate the cost of a using this handy tool</p>
        <button class="btn btn-lg btn-info js-get-started" onclick="window.location.href='step.php'" >Start <span>→</span></button>
    </div>
</div></div>
	</div>
</div>
</div>



</body></html>