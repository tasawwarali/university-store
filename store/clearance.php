<?php
session_start();
if(!isset($_SESSION["username"]))
{
		header("Location:index.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="style.css" />
<link rel="stylesheet" type="text/css" href="logoutbutton.css" />
<title>Clearance</title>
</head>

<body>
	
    <div id="page">
	
		<br>
	<br><br>
	
	
	
   

        <div id="main">
<?php require 'mainMenu.php';?>
        	<div class="main_top">
            	<h1>Clearance</h1>
			
            </div>

           	<div class="main_body">
               
			   
			   
			   	
				
			   

			</div>

           	<div class="main_bottom"></div>

        </div>



        <div id="footer">
        
        </div>

        </div>
</body>
</html>
