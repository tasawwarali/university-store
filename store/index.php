	<?php session_start(); ?>
	<!DOCTYPE html>
	<html lang="en" class="no-js"> <!--<![endif]-->
		<head>
			<meta charset="UTF-8" />
			<!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">  -->
			<title>Login Form</title>
			<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
			<link rel="stylesheet" type="text/css" href="css/demo.css" />
			<link rel="stylesheet" type="text/css" href="css/style3.css" />
			<link rel="stylesheet" type="text/css" href="css/animate-custom.css" />
		</head>
		<body>
		
<script>
function myFunction() {
    alert("wrong username or password");
}
function emailSent() {
    alert("email sent successfully!");
}
</script>
<?php
if(isset($_SESSION["wrongUsernameOrPwd"]) && $_SESSION["wrongUsernameOrPwd"]==true)
{
	echo '<script type="text/javascript">',		'myFunction();',
						'</script>';						
}
if(isset($_SESSION["emailSent"]) && $_SESSION["emailSent"]==true)
{
	echo '<script type="text/javascript">',		'emailSent();',
						'</script>';						
}
?>
		
		
		<?php
		
		 if(isset($_COOKIE['siteAuth']['username'])  && isset($_COOKIE['siteAuth']['privileges']) )
				{	
					$username = $_COOKIE['siteAuth']['username'];
							$privileges = $_COOKIE['siteAuth']['privileges'];
							$_SESSION['username'] = $username;
							$_SESSION['privileges'] = $privileges;
							header("Location:demand.php"); 
				}
		if(isset($_SESSION["username"]))
		{
			header("Location:demand.php");
    	}
		
		
		
		if(isset($_SESSION["wrongUsernameOrPwd"]))
			{
				unset($_SESSION["wrongUsernameOrPwd"]);
			}
		if(isset($_SESSION["emailSent"]))
			{
				unset($_SESSION["emailSent"]);
			}
		?>
			<div class="container">
				<div class="codrops-top">
				   
					<span class="right">
					   
					</span>
					<div class="clr"></div>
				</div>
				<header>
					<h1>Login Page <span>Store logo here</span></h1>
					<nav class="codrops-demos">
						
					</nav>
				</header>
				<section>				
					<div id="container_demo" >
						<a class="hiddenanchor" id="toregister"></a>
						<a class="hiddenanchor" id="tologin"></a>
						<div id="wrapper">
							<div id="login" class="animate form">
								<form  action="login.php" autocomplete="on" method="post"> 
									<h1>Log in</h1> 
									<p> 
										<label for="username" class="uname" data-icon="u" > Your username </label>
										<input id="username" name="username" required="required" type="text" placeholder="myusername"/>
									</p>
									<p> 
										<label for="password" class="youpasswd" data-icon="p"> Your password </label>
										<input id="password" name="password" required="required" type="password" placeholder="eg. X8df!90EO" /> 
									</p>
									<p class="keeplogin"> 
										<input type="checkbox" name="loginkeeping" id="loginkeeping" value="loginkeeping" /> 
										<label for="loginkeeping">Keep me logged in</label>
									</p>
									<p class="forgetpass"> 
										<a href='forgetpassword.php'>Forget Password????</a>	
									</p>
									<p class="login button"> 
										<input type="submit" name="login" value="Login" /> 
									</p>
								</form>
							</div>

							
						</div>
					</div>  
				</section>
			</div>
		</body>
	</html>