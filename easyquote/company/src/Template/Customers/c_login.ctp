<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="ThemeBucket">
    <link rel="shortcut icon" href="images/favicon.png">

    <title>Login</title>

    <!--Core CSS -->
    <link href="bs3/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-reset.css" rel="stylesheet">
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="js/ie8/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
	
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
	<script>
		function forgotPass() {
			var email = $('#CustomerUsername').val();
			var data = 'data[Customer][Username]='+email;
			
			$.ajax({
				url: "<?php echo BASE_PATH ?>customers/forgot",
				type: "POST",
				data: data,
				success: function(abcd) {
					alert(abcd);
					$("#myModal").modal("hide")
					document.getElementById("CustomerUsername").value="";
				}
			});
			return false;
		}
		
		function setCookie() {
			var email = $('#CustomerUsername').val();
			var password = $('#CustomerPassword').val();
			if(email == "" || password == ""){
				document.getElementById('remember').checked=false;
				alert("Please Enter User name and password first!");
			}else{
				document.cookie="email=" + email;
				document.cookie="password=" + password;
			}
		}

		/*function getEmail(){
			var email = $('#username').val();
			
			document.cookie="email1=" + email;
			
			return true;
		}*/
		function getEmail(){
			var email = $('#username').val();
			
			document.cookie="email1=" + email;
			
			return true;
		}
		
	</script>
</head>
<body class="login-body">


  
   <div class="container">
	
		
			<?= $this->Form->create('Customers', ['label'=>false,'class'=>"form-signin"]); ?>
			<h2 class="form-signin-heading">sign in now</h2>
			
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
			<p><?php echo $this->Flash->render('auth'); ?></p>
			
			<div class="login-wrap">
			
			<? //echo $this->Flash->error('auth'); ?>
				<div class="user-login-info">
				<?php
					echo $this->Form->input('username',['class'=>"form-control", 'placeholder'=>"User Id" ]);
					echo $this->Form->input('password',['class'=>"form-control", 'placeholder'=>"Password"]);
				?>
				</div>
				<label class="checkbox">
					<input type="checkbox" onclick="setCookie()" id="remember" value="remember-me"> Remember me
					<span class="pull-right">
						<a data-toggle="modal" href="#myModal"> Forgot Password?</a>

					</span>
				</label>
				<?= $this->Form->button('Login',['type'=>"submit",'class'=>"btn btn-lg btn-login btn-block"]) ?>
				<div class="registration">
					Don't have an account yet?
					<?= $this->Html->link(__('Create an account'), ['action' => 'add']) ?>
					
				</div>

			</div>
			
			 <!-- Modal -->
           <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
					    <div class="modal-header">
						    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						    <h4 class="modal-title">Forgot Password ?</h4>
					    </div>
						<form action="<?php echo BASE_PATH ?>customers/forgot" method="post">
							<div class="modal-body">
								<p>Enter your e-mail address below to reset your password.</p>
								<input type="text" name="email" name="data[Customer][username]"  placeholder="Email" autocomplete="off" id="CustomerUsername" class="form-control placeholder-no-fix">

							</div>
						    <div class="modal-footer">
								<button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
								<button class="btn btn-success" type="button">Submit</button>
						    </div>
						</form>
                    </div>
                </div>
            </div>
          <!-- modal -->
		  
		  
			<?= $this->Form->end() ?>
	</div>
		
	<script src="js/lib/jquery.js"></script>
    <script src="bs3/js/bootstrap.min.js"></script>

  </body>
</html>

   