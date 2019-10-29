<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="style.css" />
<link rel="stylesheet" type="text/css" href="logoutbutton.css" />
	<?php require 'formcss.php';?>
<title>Add Vendor</title>
</head>
<body>
    <div id="page">	
	<br>
	<br><br><br>
	<?php
session_start();
require 'mainMenu.php';
?>	
		<div id="main">
           	<div class="main_body">
								<section>				
					<div id="container_demo" >
					
					<br><br><br><br>
						<a class="hiddenanchor" id="toregister"></a>
						<a class="hiddenanchor" id="tologin"></a>
						<div id="wrapper">
							<div id="login" class="animate form">
								<form  action="add_Vendor.php" autocomplete="on" method="post" enctype="multipart/form-data"> 
									<h1>Add Vendor</h1> 
									<p> 
										<label for="username" class="uname" data-icon="u" > Name </label>
										<input id="username" name="VendorName" required="required" type="text" placeholder="eg. Khan"/>
									</p>
									<p> 
										<label for="email" class="email" data-icon="e" > Email </label>
                                                                                <input id="email" name="email" required="required" type="email" placeholder="abc@abc.com"/>
									</p>
									
									<p> 
										<label for="name" class="name" data-icon="u"> Company Name </label>
										<input id="designation" name="companyName" required="required" type="text" placeholder="eg. Idrees Electronics" /> 
									</p>
                                                                        <p> 
										<label for="name" class="name" data-icon=""> Phone Number </label>
                                                                                <input id="number" name="number" required="required" type="number" placeholder="eg. 03123456789" /> 
									</p>
                                                                        <p> 
										<label for="name" class="name" data-icon=""> Product they sell </label>
										<input id="designation" name="product" required="required" type="text" placeholder="eg. Laptops" /> 
									</p>
                                                                        
									
									<br><br>
						
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
