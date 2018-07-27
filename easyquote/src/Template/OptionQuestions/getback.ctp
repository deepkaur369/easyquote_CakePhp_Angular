<!DOCTYPE HTML>
<html lang="en">
<head>
<title>
	Login
</title>
<meta name="viewport" content="width=device-width" />
<meta charset="utf-8">

<link rel="stylesheet" type="text/css" href="<?php echo BASE_PATH; ?>css/bs3/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo BASE_PATH; ?>css/bootstrap-reset.css" />
<link rel="stylesheet" type="text/css" href="<?php echo BASE_PATH; ?>css/assets/font-awesome/css/font-awesome.css" />
<link rel="stylesheet" type="text/css" href="<?php echo BASE_PATH; ?>css/style.css" />
<link rel="stylesheet" type="text/css" href="<?php echo BASE_PATH; ?>css/style-responsive.css" />

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
  <script>
	function forgotPass() {
		var email = $('#UserUsername2').val();
		var data = 'data[User][Username]='+email;
		
		$.ajax({
			url: "<?php echo BASE_PATH ?>users/forgot",
			type: "POST",
			data: data,
			success: function(abcd) {
				alert(abcd);
				$("#myModal").modal("hide")
				document.getElementById("UserUsername2").value="";
			}
		});
		return false;
	}
	
	function setCookie() {
		var email = $('#UserUsername').val();
		var password = $('#UserPassword').val();
		if(email == "" || password == ""){
			document.getElementById('remember').checked=false;
			alert("Please Enter User name and password first!");
		}else{
			document.cookie="email=" + email;
			document.cookie="password=" + password;
		}
	}

	function getEmail(){
		var email = $('#UserUsername').val();
		//alert(email);
		document.cookie="email1=" + email;
		return true;
	}
	
</script>
    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="js/ie8/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>

  <body class="login-body">

    <div class="container">

      <form class="form-signin" action="<?php echo BASE_PATH ?>users/login" id="UserLoginForm" method="post" accept-charset="utf-8">
        <h2 class="form-signin-heading" style= "background:#1fb5ac;border-bottom:0px">
				<img src="<?php echo BASE_PATH ?>files/users/<?php echo $this->Session->read('companyLogo');?>" alt="<?php echo $this->Session->read('companyName'); ?>" style="width:168px; height:32px;"/>
			</h2>
		
		<?php 
		if(isset($_GET['false'])){
			echo '&nbsp;Please Enter a valid Email ID';
		}else if(isset($_GET['true'])){
			echo '&nbsp;New Password has been sent to your Email ID';
		}else if(isset($_GET['error'])){
			echo '&nbsp;Your User name or password was incorrect.';
		}else if(isset($_GET['success'])){
			echo '&nbsp;You are successfully Registered For Demo.';
		}
		?>
        <div class="login-wrap">
            <div class="user-login-info">
                <input type="text" id="UserUsername" name="data[User][username]" 
				value="<?php  echo (isset($_COOKIE['email']))? $_COOKIE['email']:'' ?>" autocomplete="off" class="form-control myfor" placeholder="User ID" autofocus>
				<input name="data[User][password]" value="<?php  echo (isset($_COOKIE['password']))? $_COOKIE['password']:'' ?>" type="password" class="form-control myfor" placeholder="Password" autocomplete="off" id="UserPassword">
            </div>
            <label class="checkbox">
                <input type="checkbox" onclick="setCookie()" id="remember" value="remember-me"> Remember me
                <span class="pull-right">
                    <a data-toggle="modal" href="#myModal"> Forgot Password?</a>

                </span>
            </label>
            <button class="btn btn-lg btn-login btn-block" onclick="return getEmail()" type="submit">Sign in</button>
		</div>
	</form>
		<!-- Modal -->
		<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
		  <div class="modal-dialog">
			  <div class="modal-content">
				  <div class="modal-header">
					  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					  <h4 class="modal-title">Forgot Password ?</h4>
				  </div>
				  <form action="<?php echo BASE_PATH ?>users/forgot" method="post">
					  <div class="modal-body">
						  <p>Enter your e-mail address below to get your password.</p>
						  <input type="email" name="data[User][username]" required="required" placeholder="Email" autocomplete="off" id="UserUsername2" class="form-control placeholder-no-fix">
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
    </div>
<footer class="footer-section" style="background:#000; position:fixed">
			<div class="text-center" style="color:#fff">
			<?php echo date('Y'); ?> ©  Project  Pier  by <a href="<?php echo $this->Session->read('companyWebsite_URL');?>" style="color:#fff"> DesignersX</a>
				
			</div>
		</footer>

<script src="<?php echo BASE_PATH; ?>js/lib/jquery.js"></script>
<script src="<?php echo BASE_PATH; ?>css/bs3/js/bootstrap.min.js"></script>

  </body>
</html>
