<?php
session_start();
require 'connectToDatabase.php';
	


	if(isset($_POST['name']) && isset($_POST['type']) && isset($_POST['price']) && isset($_POST['stock']) )
	{
		$tid=$_POST["id"];
		$name=$_POST['name'];
		$type=$_POST['type'];
		$price=$_POST['price'];
		$stock=$_POST['stock'];
                
				
				
		if(!empty($name) && !empty($type)  )
		{
			
			
			$query="UPDATE items SET name = '$name', type= '$type' ,  marketPrice = '$price' ,stock='$stock'   WHERE id= '$tid' ";
			//echo $query;
			
			$result=mysqli_query($conn,$query); 
            if($result)
            {
				$_SESSION["updateItemSuccess"]=true;	

				//echo $name.$type.$price.$stock.$id;		
							
				header("Location:view_item.php");
			}
			else
			{
				$_SESSION["updateItemSuccess"]=false;		
				header("Location:view_item.php");
			}
			
		}
	}
	?>