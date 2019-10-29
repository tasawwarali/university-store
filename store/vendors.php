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
<title>Vendors Management</title>
</head>

<body>
	<script>
function myFunction() {
    alert("Vendor added... ");
}
function VendorAddingError() {
    alert("Error adding vendor...");
}
</script>
<?php
if(isset($_SESSION["VendorAdded"]) && $_SESSION["VendorAdded"]==true)
{
	echo '<script type="text/javascript">',
						'myFunction();',
						'</script>';						
}
if(isset($_SESSION["VendorAdded"]) && $_SESSION["VendorAdded"]==false)
{
	echo '<script type="text/javascript">',
						'userAddingError();',
						'</script>';						
}
?>
    <?php
            if(isset($_SESSION["VendorAdded"]))
            {
                unset($_SESSION["VendorAdded"]);
            }	
    ?>
    <div id="page">
	
		<br>
	<br><br><br>
	
	<div style="width:373px;display:inline-block; height:60px; background-color:#616366; border-radius: 8px; position:absolute; top:0px; left:545px">
	<?php
        
		echo '<img  style="display:inline-block; position:relative; left:15px; padding:2px;" height="55px" width="55px" src="users/'.$_SESSION['username'].'.jpg">
		<h1 style="display:inline-block; position:relative; bottom:18px; left:35px;">'.$_SESSION['username'].'</h1>
		<a style="display:inline-block; color:white; position:relative; bottom:26px; left:180px;" href="logout.php">Logout</a>
		';
	?>
	</div>
	
	
	<?php require 'mainMenu.php';?>

        <div id="main">

        	<div class="main_top">
            	<h1>Vendors Management</h1>
			
            </div>

           	<div class="main_body">
               
			   
			   
			   	
				<br>
				<br>
				
				<br>
                                    <h2 style="padding:40px"><a href="addVendor.php">Add Vendor</a></h2>
				<br>
				<br>
				<h2 style="padding:40px"><a href="view_vendor.php">View Vendors</a></h2>
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
