
	<?php
	session_start();
	require 'connectToDatabase.php';
	if(isset($_POST['VendorName']) && isset($_POST['email']) && isset($_POST['companyName']) && isset($_POST['number']) && isset($_POST['product']) )
	{
		$VendorName=$_POST['VendorName'];
		$email=$_POST['email'];
		$companyName=$_POST['companyName'];
                $number=$_POST['number'];
                $product=$_POST['product'];
		
		if(!empty($VendorName) && !empty($email) && !empty($companyName) && !empty($number) && !empty($product) )
		{
                    
			$sql = "INSERT INTO vendors (name, companyName, email, phoneNumber,productTheySell ) VALUES ('$VendorName','$companyName','$email','$number','$product')";
			if (mysqli_query($conn, $sql)) 
			{
                            
				$_SESSION["VendorAdded"]=true;
				header("Location:vendors.php"); 	
			}
			else
			{
				$_SESSION["VendorAdded"]=false;
				header("Location:vendors.php"); 	
			}
			//mysqli_close($conn);			
		}
	}
	?>	
