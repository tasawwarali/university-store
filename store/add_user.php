
	<?php
	session_start();
	require 'connectToDatabase.php';
	if(isset($_POST['username']) && isset($_POST['email']) && isset($_POST['designation']) )
	{
		$username=$_POST['username'];
		$email=$_POST['email'];
		$designation=$_POST['designation'];
		
		if(!empty($username) && !empty($email) && !empty($designation))
		{
			$pre="";
			if(!empty($_POST['privileges']))
			{
				$pre1="0";
				$pre2="0";
				$pre3="0";
				$pre4="0";
				$pre5="0";
				$pre6="0";
				$pre7="0";
				$pre8="0";
				
				foreach($_POST['privileges'] as $i)
				{
					if($i=="demand")
					{
						$pre1="1";
					}
					
					if($i=="history")
					{
						$pre2="1";
					}
					
					if($i=="user")
					{
						$pre3="1";
					}
					
					if($i=="item")
					{
						$pre4="1";
					}
					if($i=="approve")
					{
						$pre5="1";
					}
					if($i=="vendors")
					{
						$pre6="1";
					}
					
					if($i=="billing")
					{
						$pre7="1";
					}
					
					if($i=="clearance")
					{
						$pre8="1";
					}
				}
				
				$pre=$pre1.','.$pre2.','.$pre3.','.$pre4.','.$pre5.','.$pre6.','.$pre7.','.$pre8;
				
			}
		
require 'randomString.php';
$pwd=randomString();
			$sql = "INSERT INTO users (username, email, designation, privileges,password ) VALUES ('$username','$email','$designation','$pre','$pwd')";
			if (mysqli_query($conn, $sql)) 
			{
				$_SESSION["userAdded"]=true;
                                $to=$email;
                                $subject="USER ADDED";
                                $txt="You have been given access to PUCIT STORE AUTOMATION WEBSITE:<br>"
                                        . "USERNAME:".$username."<br>PASSWORD:".$pwd."<br>DESIGNATION:".$designation;
                                $headers = "From: PUCIT STORE WEBSITE" . "\r\n" ;
                                mail($to,$subject,$txt,$headers);
				header("Location:users.php"); 	
			}
			else
			{
				$_SESSION["userAdded"]=false;
				header("Location:users.php"); 	
			}

			//mysqli_close($conn);
			
			
			$targetfolder = 'users/'.$username.'.jpg';
 
			move_uploaded_file($_FILES['profile']['tmp_name'], $targetfolder);
 			
		}
	}
	?>	
