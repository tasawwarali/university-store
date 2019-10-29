<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="style.css" />
<link rel="stylesheet" type="text/css" href="logoutbutton.css" />
	<?php require 'formcss.php';?>
<title>Add Item</title>
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
								<form  action="add_item.php" autocomplete="on" method="post" enctype="multipart/form-data"> 
									<h1>Add Item</h1> 
									<p> 
										<label for="username" class="uname" data-icon="" > Item Name </label>
										<input id="itemname" name="itemname" required="required" type="text" placeholder="eg. Marker"/>
									</p>
									<p> 
										<label for="password" class="youpasswd" data-icon=""> Market Price </label>
                                                                                <input id="price" name="price" required="required" min="1" max="90000000" type="number" placeholder="eg. 250" /> 
									</p>
                                                                        <p> 
										<label for="stock" class="uname" data-icon=""> Stock in Store </label>
                                                                                <input id="stock" name="stock" required="required" min="0" max="100000" type="number" placeholder="eg. 125" /> 
									</p>
									<p> 
									<br>
										<label for="name" class="name" > Type &nbsp &nbsp</label>
										<select name=typei style="padding:10px">
											<option value=consumable >Consumable</option>
											<option value=non-consumable >Non-Consumable</option>
										</select>
										
									</p>
									
								<br>
									<input type="file" name="itempic" id="itempic">
									<br>
									<br>
									
									<p class="login button"> 
										<input type="submit" name="Add" value="Add" /> 
									</p>
								</form>
							</div>

							
						</div>
						<br><br><br><br>
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
