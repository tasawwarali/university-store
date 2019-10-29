	<?php
        session_start();
	if(isset($_POST['riid']))
	{
		$iid=$_POST['riid'];
		
		if(!empty($iid) )
		{
                    require 'connectToDatabase.php';

			if ($conn->connect_error)
			{
				die("Connection failed: " . $conn->connect_error);
			} 

			$sql = "UPDATE demanditem SET status='Rejected',notification=3 WHERE did='$iid'";

			if ($conn->query($sql) === TRUE) 
			{
                            $_SESSION["rejectItem"]=true;
                            header("Location:approval.php");
				//echo "Item Rejected successfully";
			}
			else
			{
				//echo "Error updating record: " . $conn->error;
			}

			//$conn->close();
 
			
		}
	}
	
	else
	{
		//echo 'Error!';
	}
	?>	
