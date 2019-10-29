<?php
	require_once 'connectToDatabase.php';
	session_start(); 
	$username=$_SESSION["username"];
	$q1="select * from demanditem where notification = 1 or (username = '$username' and notification != 0) ";
	
	$q2="select * from demanditem where notification > 1  and username = '$username'";
	
	$q3="select * from notifications where status = 1";
		
	$pre=explode(',',$_SESSION["privileges"]);
	
	
	$notifications = $conn->query($q3)->num_rows;
	
	
	
	if($pre[4]=="1")
	{
		$result = $conn->query($q1)->num_rows;
		echo $result + $notifications;
		
	}
	else
	{
		
		$result2 = $conn->query($q2)->num_rows;
		
		if($pre[3]=="1" || $pre[5]=="1")
		{
			echo $result2 + $notifications;
		}
		else
		{
			echo $result2;
		}
	}
	
	
									
?>
	