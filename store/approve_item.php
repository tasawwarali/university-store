	<?php
        session_start();
	if(isset($_POST['aiid']))
	{
		$iid=$_POST['aiid'];
		
		if(!empty($iid) )
		{			
                    require 'connectToDatabase.php';
			
                        
                        $query="SELECT item_id FROM demanditem WHERE did='$iid'";
                        $result=  mysqli_query($conn, $query);
                        $row=$result->fetch_assoc();
                        $itemid=$row["item_id"];
                        
                        
                        $query2="select stock from items where id='$itemid'";
                        $result=  mysqli_query($conn, $query2);
                        $row=$result->fetch_assoc();
                        $stock=$row["stock"];
                        if($stock>0)
                            {
                       
			$sql = "UPDATE demanditem  SET status='Approved', notification=2 WHERE did='$iid'";
                        mysqli_query($conn, $sql);
                        $stock=$stock-1;
			$sql2 = "UPDATE items SET stock= ' $stock ' WHERE id='$itemid'";
                        mysqli_query($conn, $sql2);
                        
					$_SESSION["approveItem"]=true;
					header("Location:approval.php");
                            }
                            else
                            {
                                $_SESSION["stockNotPresent"]=true;
                                header("Location:approval.php");
                            }
			
		}
	}
	else
	{
            $_SESSION["approveItem"]=false;			
	    header("Location:approval.php");
	}
	?>	
