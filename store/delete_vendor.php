<?php
	require 'connectToDatabase.php';
	session_start(); 
	$name=$_GET['name'];
	$query="delete from vendors where name= $name ";
	if($queryRun=$conn->query($query) )
	{	
			header("Location:view_vendor.php");
		
	}									
?>
	