	<?php
	require 'connectToDatabase.php';
	session_start();
	$name=$_GET['name'] ;
	$_SESSION['name']=$name;
	$query="select * from vendors where name = $name ";
	$result = $conn->query($query);
	if($result)
	{
			while($queryRow=$result->fetch_assoc())
			{
				$name=$queryRow['name'];	
                                $email=$queryRow['email'];
				$companyName=$queryRow['companyName'];
				$phoneNumber=$queryRow['phoneNumber'];
				$product=$queryRow['productTheySell'];
                                
			}			
	}
	?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="style.css" />
<link rel="stylesheet" type="text/css" href="logoutbutton.css" />
	<?php 
        require 'formcss.php';?>
<title>Update Vendor</title>
</head>
<body>
    <div id="page">	
	<br>
	<br><br><br>
	<?php
require 'mainMenu.php';
?>	
		<div id="main">
           	<div class="main_body">
				
								<section>				
					<div id="container_demo" >
						<a class="hiddenanchor" id="toregister"></a>
						<a class="hiddenanchor" id="tologin"></a>
						<div id="wrapper">
							<div id="login" class="animate form">
								<form  action="edit_vendor.php" autocomplete="on" method="post" enctype="multipart/form-data"> 
									<h1>Update Vendor</h1> 
									<p> 
										<label for="username" class="uname" data-icon="u" > Vendor Name </label>
                                                                                <input id="name" name="name" required="required" type="text" placeholder="eg. Khan" value=<?php echo $name; ?> ></input>
									</p>
                                                                        
									<p> 
										<label for="email" class="email" data-icon="e"> Email </label>
										<input id="email" name="email" required="required" type="email" placeholder="eg. abc@abc.com" value=<?php echo $email; ?> /> 
									</p>
									<p> 
										<label for="name" class="name" data-icon="u"> Company Name </label>
										<input id="companyName" name="companyName" required="required" type="text" placeholder="eg. bilal electronics" value=<?php echo $companyName; ?> /> 
									</p>
                                                                        <p> 
										<label for="phoneNumber" class="name" data-icon=""> Phone Number </label>
                                                                                <input id="phoneNumber" name="phoneNumber" required="required" type="number" placeholder="eg. 03123456789" value=<?php echo $phoneNumber; ?> /> 
									</p>
                                                                        <p> 
										<label for="productTheySell" class="name" data-icon=""> Product They Sell </label>
										<input id="productTheySell" name="productTheySell" required="required" type="text" placeholder="eg. printers" value=<?php echo $product; ?> /> 
									</p>
                                                                        
                                                                        <p class="login button"> 
										<input type="submit" name="update" value="Update" /> 
									</p>
								</form>
							</div>

							
						</div>
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
