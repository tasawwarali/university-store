<?php
	session_start();
	//require 'connectToDatabase.php';
	if(isset($_POST['itemname']) && isset($_POST['itemprice']) && isset($_POST['itemquantity'] ) && isset($_POST['date'] ) && isset($_POST['extra'] ) && isset($_POST['Bill'] ))
	{
		$itemprice="";
		$itemname="";
		$itemquantity="";
		$date=$_POST['date'];
		$extra=$_POST['extra'];
		$Bill=$_POST['Bill'];
		echo $date."<br>";
		echo $extra."<br>";
		echo $Bill."<br>";
		$myInputs = $_POST["itemname"];
		foreach ($myInputs as $eachInput) {
			echo $eachInput . "<br>";
			$itemname=$itemname.$eachInput;
			
		}
		echo $itemprice;
		$x = $_POST["itemprice"];
		foreach ($x as $eachInput) {
			echo $eachInput . "<br>";
			$itemprice=$itemprice.$eachInput;
				
		}
		$y = $_POST["itemquantity"];
		foreach ($y as $eachInput) {
			echo $eachInput . "<br>";
			$itemquantity=$itemquantity.$eachInput;
				
		}
		echo $itemname."<br>";
		echo $itemprice."<br>";
		echo $itemquantity."<br>";
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "sms";
		
		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		
		
		
		
		$sql = "INSERT INTO bill (itemname, price, quantity, date,extra,bill ) VALUES ('$itemname','$itemprice','$itemquantity','$date','$extra','$Bill')";
		echo $sql;
		
		if (mysqli_query($conn, $sql))
		{
			//$_SESSION["userAdded"]=true;
			header("Location:demand.php");
		}
		else
		{
			//$_SESSION["userAdded"]=false;
			header("Location:addbill.php");
		}
		
		
	}
	?>
	