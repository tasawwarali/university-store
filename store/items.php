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

<title>Items Management</title>
</head>

<body>
<script>
function myFunction() {
    alert("item added successfully");
}
</script>
<?php
if(isset($_SESSION["itemAdded"]) && $_SESSION["itemAdded"]==true)
{
	echo '<script type="text/javascript">',
						'myFunction();',
						'</script>';

	$_SESSION["itemAdded"]=false;
}
?>

    <div id="page">
	
	
	<br><br><br>
	

	

        <div id="main">

	<?php require 'mainMenu.php';?>
        	<div class="main_top">
            	<h1>Manage Items Here :</h1>
            </div>

           	<div class="main_body">
      
			   	<br>
				<br>
				
				<br>
				<h2 style="padding:40px"><a href="additem.php">Add Item</a></h2>
				<br>
				<br>
				<h2 style="padding:40px"><a href="view_item.php">View Item</a></h2>
				<br>
				<br>
			
			   
			   
			</div>

           	<div class="main_bottom"></div>

        </div>



        <div id="footer">
       
        </div>

        </div>
</body>
</html>
