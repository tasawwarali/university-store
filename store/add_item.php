	<?php
	session_start();
	require 'connectToDatabase.php';
	if(isset($_POST['itemname']) && isset($_POST['price']) && isset($_POST['stock']) )
	{
		$itemname=$_POST['itemname'];
		$price=$_POST['price'];
		$stock=$_POST['stock'];
                
		if(!empty($itemname) && !empty($price) )
		{
			
				$cons=$_POST['typei'];
		
				
			
			

			if (!$conn)
			{
				die("Connection failed: " . mysqli_connect_error());
			}

			$sql = "INSERT INTO items (name, marketPrice , type, stock) VALUES ('$itemname','$price', '$cons','$stock' )";

			if (mysqli_query($conn, $sql)) 
			{
				$_SESSION["itemAdded"]=true;
				header("Location:items.php"); 	
			}
			else
			{
				//echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                            
			}

			mysqli_close($conn);
			
			
			$targetfolder = 'items/'.$itemname.'.jpg';

			move_uploaded_file($_FILES['itempic']['tmp_name'], $targetfolder);
 
			
		}
	}
	
	else
	{
		//echo 'Error!';
	}
	?>	
