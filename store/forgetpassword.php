	<?php session_start(); ?>
	<!DOCTYPE html>
	<html lang="en" class="no-js"> <!--<![endif]-->
		<head>
			<meta charset="UTF-8" />
			<!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">  -->
			<title>Forget Password form</title>
			<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
			<link rel="stylesheet" type="text/css" href="css/demo.css" />
			<link rel="stylesheet" type="text/css" href="css/style3.css" />
			<link rel="stylesheet" type="text/css" href="css/animate-custom.css" />
		</head>
<script>
function myFunction() {
    alert("wrong username or email! Enter again...");
}
function errorSendingEmail() {
    alert("There was a problem sending email! Try again...");
}
</script>
<?php
if(isset($_SESSION["wrongUsernameOrEmail"]) && $_SESSION["wrongUsernameOrEmail"]==true)
{
	echo '<script type="text/javascript">',		'myFunction();',
						'</script>';						
}
if(isset($_SESSION["errorSendingEmail"]) && $_SESSION["errorSendingEmail"]==true)
{
	echo '<script type="text/javascript">',		'errorSendingEmail();',
						'</script>';						
}
?>
	<?php
	if(isset($_SESSION["wrongUsernameOrEmail"]))
			{
				unset($_SESSION["wrongUsernameOrEmail"]);
			}
	if(isset($_SESSION["errorSendingEmail"]))
			{
				unset($_SESSION["errorSendingEmail"]);
			}		
	?>
		<body>
		
			<div class="container">
				<!-- Codrops top bar -->
				<div class="codrops-top">
				   
					<span class="right">
					   
					</span>
					<div class="clr"></div>
				</div><!--/ Codrops top bar -->
				<header>
					<h1>Forget Password Page <span>Store logo here</span></h1>
					<nav class="codrops-demos">
						
					</nav>
				</header>
				<section>				
					<div id="container_demo" >
						<a class="hiddenanchor" id="toregister"></a>
						<a class="hiddenanchor" id="tologin"></a>
						<div id="wrapper">
							<div id="login" class="animate form">
								<form  action="forget_password.php" autocomplete="on" method="post"> 
									<h1>Enter Data</h1> 
									<p> 
										<label for="username" class="uname" data-icon="u" > Your username </label>
										<input id="username" name="username" required="required" type="text" placeholder="myusername"/>
									</p>
									<p> 
										<label for="Email" class="Email" data-icon="p"> Your Email </label>
										<input id="Email" name="Email" required="required" type="Email" placeholder="eg. abc@abc.com" /> 
									</p>
										<p class="Get password"> 
										<input type="submit" name="get password" value="Get password" /> 
										</p>
								</form>
							</div>

							
						</div>
					</div>  
				</section>
			</div>
		</body>
	</html>
