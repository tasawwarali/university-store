<?php
session_start();
require 'connectToDatabase.php';
if(isset($_POST['Email']) && isset($_POST['username']) )
{
	$Email=$_POST['Email'];
	$username=$_POST['username'];		
if(!empty($username) && !empty($Email))
{	
	$query="select * from users where username='$username' and email='$Email'  ";
	$result = mysqli_query($conn,$query);
		if($result->num_rows > 0)
	{				
				require 'randomString.php';
				$txt= randomString();
				//$prevPassword=
				$to = $Email;
				$subject = "PASSWORD";
				$headers = "From: PUCIT STORE WEBSITE" . "\r\n" ;
				
				
				if(mail($to,$subject,$txt,$headers))
				{
					$_SESSION["emailSent"]=true;
					$updatePass="Update users Set  password= '$txt'  where username='$username'  ";
					$conn->query($updatePass);												
					header("Location:index.php");
				}
				else
				{
					$_SESSION["errorSendingEmail"]=true;
					header("Location:forgetpassword.php");
				}
	}
	else 
	{
		$_SESSION["wrongUsernameOrEmail"]=true;
		header("Location:forgetpassword.php");
	}
}
}

?>