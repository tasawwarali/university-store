<?php
require 'connectToDatabase.php';
session_start();	
	if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['companyName']) && isset($_POST['phoneNumber']) && isset($_POST['productTheySell']) )
	{
		$name=$_POST['name'];
		$email=$_POST['email'];
		$companyName=$_POST['companyName'];
                $phoneNumber=$_POST['phoneNumber'];
                $product=$_POST['productTheySell'];
		
		if(!empty($name) && !empty($email) && !empty($companyName) && !empty($phoneNumber) && !empty($product))
		{   
                        $query="Update vendors Set  email= '$email' ,  name= '$name' , companyName= '$companyName' , phoneNumber= '$phoneNumber' , productTheySell= '$product' where name={$_SESSION['name']}  ";	
                        $result=mysqli_query($conn, $query);
			if($result)
			{
                                $_SESSION["VendorUpdateSuccess"]=true;
                                unset($_SESSION["name"]);
				header("Location:view_vendor.php");
			
			}
			else
			{
                            $_SESSION["VendorUpdateSuccess"]=false;
                            unset($_SESSION["name"]);
                            header("Location:view_vendor.php");
			}
			
		}
	}
	?>