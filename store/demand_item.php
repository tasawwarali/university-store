	<?php
	require 'connectToDatabase.php';
	session_start();
        if(!isset($_SESSION["username"]))
        {
            header("Location:index.php");
        }
	if(isset($_POST['itemid']))
	{
		
		$username = $_SESSION["username"];
		date_default_timezone_set("Asia/Karachi");
		$date=date("Y-m-d h:i:s");
			
            
		$itemid=$_POST['itemid'];		
		if(!empty($itemid) )
		{
			$query = "select * from items where id = $itemid ";	
			$result = mysqli_query($conn, $query) ;
                       
			if($result->num_rows > 0)
			{
				$row = $result->fetch_assoc() ;
				$stock= $row['stock'];
				
				
				if($stock<5)
				{
					$ntype="Warning";
					if ($stock==0)
					{	
						$_SESSION["stockNotPresent"]=true;
						$ntype="Critical";
						
					}
					$q="INSERT INTO notifications (status, time, type, iid) VALUES (1 , '$date' , '$ntype' , $itemid)";
					if (!mysqli_query($conn, $q)) 
					{
						echo "ERROR!!! Notification.";
					}
				}
            
					
					
				$sql = "INSERT INTO demanditem (item_id, username , date , status, notification) VALUES ('$itemid','$username', '$date', 'Pending' ,1)";
					if (mysqli_query($conn, $sql)) 
					{
						$_SESSION["demandSuccess"]=true;
							
							
					}
					else
					{
                        $_SESSION["demandSuccess"]=false;
							
					}
					header("Location:demand.php");
			}

			
			
			
			
		}
	}
        else
						{
							
							header("Location:demand.php");
							
						}
	
	
	?>	
