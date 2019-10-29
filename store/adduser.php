<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="style.css" />
<link rel="stylesheet" type="text/css" href="logoutbutton.css" />
	<?php require 'formcss.php';?>
<title>Add User</title>
</head>
<body>
    <div id="page">	
	<br><br><br>

		<div id="main">
		
			<?php
session_start();
require 'mainMenu.php';
?>	
		
           	<div class="main_body">
								<section>				
					<div id="container_demo" >
					
					<br><br><br><br>
						<a class="hiddenanchor" id="toregister"></a>
						<a class="hiddenanchor" id="tologin"></a>
						<div id="wrapper">
							<div id="login" class="animate form">
								<form  action="add_user.php" autocomplete="on" method="post" enctype="multipart/form-data"> 
									<h1>Add User</h1> 
									<p> 
										<label for="username" class="uname" data-icon="u" > Username </label>
										<input id="username" name="username" required="required" type="text" placeholder="eg. Khan"/>
									</p>
									<p> 
										<label for="email" class="email" data-icon="e" > Email </label>
                                                                                <input id="email" name="email" required="required" type="email" placeholder="abc@abc.com"/>
									</p>
									
									<p> 
										<label for="name" class="name" data-icon="u"> Designation </label>
										<input id="designation" name="designation" required="required" type="text" placeholder="eg. Professor" /> 
									</p>
									
									<br><br>
									<label  for="name" class="name" > Privileges </label><br>
									<br>
									<p style="padding:10px"> 
										<input  type="checkbox" name="privileges[]" value="demand"> &nbsp  Demand Items <br> 
										<input  type="checkbox" name="privileges[]" value="history"> &nbsp  History <br> 
										<input  type="checkbox" name="privileges[]" value="user"> &nbsp  User Management <br> 
										<input  type="checkbox" name="privileges[]" value="item"> &nbsp  Item Management  <br>
										<input  type="checkbox" name="privileges[]" value="approve"> &nbsp Demands Approval<br>
										<input  type="checkbox" name="privileges[]" value="vendors"> &nbsp  Vendors <br> 
										<input  type="checkbox" name="privileges[]" value="billing"> &nbsp  Billing <br> 
										<input  type="checkbox" name="privileges[]" value="clearance"> &nbsp  Clearance <br> 

									</p>
									
									<br>
									<input type="file" name="profile" id="profile">
									<p class="login button"> 
										<input type="submit" name="Add" value="Add" /> 
									</p>
								</form>
								
							</div>

							
						</div>
						
						<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
					</div>  
				</section>

			
			</div>

           	<div class="main_bottom"></div>

        </div>



        <div id="footer">
       
          
        </div>
		</div>
		
</body>
</html>
