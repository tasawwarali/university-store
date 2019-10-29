



<?php
	require 'connectToDatabase.php';
	session_start(); 
	$username=$_SESSION["username"];
	$pre=explode(',',$_SESSION["privileges"]);
	
	if($pre[3]=="1" || $pre[4]=="1" || $pre[5]=="1")
	{
		$q="update notifications set status = 0";
		if(!$queryRun=$conn->query($q))
		{
			echo "ERROR!! notifications.";
		}
	}
	
	
	
	
	
	
	if($pre[4]=="1")
	{
		$query="update demanditem set notification = 0 where username = '$username' or notification = 1 ";	
	}
	else
	{
		$query="update demanditem set notification = 0 where username = '$username' ";
	}	
	if($queryRun=$conn->query($query) )
	{
		
            header("Location:notifications.php");
		
	}
	else
	{
		echo "ERROR!!!".$query;
	}
									
?>
	