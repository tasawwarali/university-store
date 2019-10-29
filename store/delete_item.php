<?php
	require 'connectToDatabase.php';
	session_start(); 
	$id=$_GET['id'];
	$query="delete from items where id= $id ";
	if($queryRun=$conn->query($query))
	{	
			echo "record deleted successfully";
			header("Location:view_item.php");
		
	}
	else
	{
		echo "query mistake" ;
	}
									
?>
	