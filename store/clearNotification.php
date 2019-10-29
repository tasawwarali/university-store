<?php
	require 'connectToDatabase.php';
	session_start(); 
	$d=$_POST['did'];
	if($d<0)
	{
		$d = $d*-1;
		$query="update notifications set status = 0 where id = $d ";
	}
	else
	{
		$query="update demanditem set notification = 0 where did = $d ";
	}
	if($queryRun=$conn->query($query) )
	{
		
            echo true;
		
	}
	else
	{
		echo false;
	}
									
?>
	