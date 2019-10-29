<?php
	require 'connectToDatabase.php';
	session_start(); 
	$uname=$_GET['uname'];
	$query="delete from users where username= $uname ";
	$query2="delete from demanditem where username= $uname ";
	if($queryRun=$conn->query($query) && $queryRun=$conn->query($query))
	{
		
		
			echo "record deleted successfully";
			header("Location:view_user.php");
		
	}
	else
	{
		echo "query mistake" ;
	}
									
?>
	