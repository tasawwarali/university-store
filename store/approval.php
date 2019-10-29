	<?php
session_start();
if(!isset($_SESSION["username"]))
{
		header("Location:index.php");
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="style.css" />
<link rel="stylesheet" type="text/css" href="logoutbutton.css" />

<title>Demands Approval</title>
</head>
<body>
    <script>
         function approvalSuccess()
        {
            alert("item approved successfully");
        }
        function approvalFailure()
        {
            alert("Error occured while approving item!");
        }
          function rejectItem()
        {
            alert("item rejected successfully");
        }
        function StockNotPresent()
        {
            alert("item you are approving is not present in stock yet...!");
        }
        </script>
    <?php
if(isset($_SESSION["approveItem"]) && $_SESSION["approveItem"]==true)
{
	echo '<script type="text/javascript">',		'approvalSuccess();',
						'</script>';						
}
if(isset($_SESSION["approveItem"]) && $_SESSION["approveItem"]==false)
{
	echo '<script type="text/javascript">',		'approvalFailure();',
						'</script>';						
}
if(isset($_SESSION["rejectItem"]) && $_SESSION["rejectItem"]==true)
{
	echo '<script type="text/javascript">',		'rejectItem();',
						'</script>';						
}
if(isset($_SESSION["stockNotPresent"]) && $_SESSION["stockNotPresent"]==true)
{
	echo '<script type="text/javascript">',		'StockNotPresent();',
						'</script>';						
}
?>
<?php
    if(isset($_SESSION["approveItem"]))
			{
				unset($_SESSION["approveItem"]);
			}
                         if(isset($_SESSION["rejectItem"]))
			{
				unset($_SESSION["rejectItem"]);
			}
                        if(isset($_SESSION["stockNotPresent"]))
			{
				unset($_SESSION["stockNotPresent"]);
			}
                       
    
    ?>    

    <div id="page">

		<br>
	<br><br>
	
	
	
      

        <div id="main">
<?php require 'mainMenu.php';?>
        	<div class="main_top">
            	<h1>Requests :</h1>
            </div>

           	<div class="main_body">
      
	  
			<?php
			
			
			
			
			
			
			
			
			
			
			
				  
			   $allc="";
			   $conc="";
			   $nonc="";
			   $rej="";
			   $pend="";
			   $appr="";
			   
			   if(isset($_POST['option']))
			   {
				   $arr=$_POST['option'];
				   $N = count($arr);
				  for($i=0;$i<$N;$i++)
				  {
					 if($arr[$i]=="all")
					 {
						$allc="checked";
				     }
					if($arr[$i]=="consumable")
					{
						$conc="checked";
					}
					if($arr[$i]=="non-consumable")
					{
						$nonc="checked";
					}
					if($arr[$i]=="Approved")
					{
						$appr="checked";
					}
					if($arr[$i]=="Rejected")
					{
						$rej="checked";
					}
					if($arr[$i]=="Pending")
					{
						$pend="checked";
					}
					
				  }
			   }
			   
			   $un="";
			   $in="";
			  
			   
			    if(isset($_POST['username']))
				{
					$un=$_POST['username'];
				}
				if(isset($_POST['itemName']))
				{
					$in=$_POST['itemName'];
				}
			
			
			
			
			
			echo '<br>
			
			<div style="position:relative; left:170px; ">
			  <div style="padding:20px">
			  
			   <form  action="approval.php" method="post">
			   <input style="padding:12px; width:210px;" type="text" name="username" value="'.$un.'" placeholder="Username ...  "/>
   			   <input style="padding:12px; width:200px;" type="text" name="itemName" value="'.$in.'" placeholder=" Item ... "/>

			   </div>

			    <div style="padding:20px;">
			    
				<div style="display:inline-block;">
			    <input type="checkbox" '.$allc.' name="option[]" value="all"> &nbsp All items <br>
				<input type="checkbox" name="option[]" '.$conc.' value="consumable"> &nbsp Consumable <br>
				<input type="checkbox" name="option[]" '.$nonc.' value="non-consumable"> &nbsp Non-consumable <br>
				<input type="checkbox" name="option[]" '.$rej.' value="Rejected"> &nbsp Rejected <br>
				<input type="checkbox" name="option[]" '.$pend.' value="Pending"> &nbsp Pending <br>
				<input type="checkbox" name="option[]" '.$appr.' value="Approved"> &nbsp Approved <br>
				</div>
				
				<div style="display:inline-block; position:relative;left:120px;bottom:17px; ">
				<h2>Select Time Period :</h2><br>
				<b>Start Date :</b><input  style="position:relative;left:1px;" type="date" name="startDate" /><br>
				<b>End Date :&nbsp</b> <input  type="date" name="endDate" />
				</div>
				
				<br><br><br>
			
				
				<input style=" display:inline-block;width:90px;text-align: center ;padding:9px" type="submit" value="Filter">
				</form>
			   </div>
			  </div>';
			   
			
		

			
			
			
			
			require 'connectToDatabase.php';
			$demands= array();
			
			class DemandItem
			{
				public $id;
				public $itemName;
				public $date;
				public $type;
				public $price;
				public $status;
			}
			
			
			
			function check($uname,$d)
			{
				for($z=0;$z<count($d);$z++)
				{
					if($d[$z][0]==$uname)
					{
						return $z;
					}
				}
				return count($d);
			}
			
			$dQuery="";
			
			if(!empty($_POST['startDate']) || !empty($_POST['endDate']))
			{
					$sd=$_POST['startDate']." 00:00:00";
					$ed=$_POST['endDate']." 23:59:59";
					if(!empty($_POST['startDate']) && !empty($_POST['endDate']))
					{
						
						$dQuery=" where demanditem.date >= '$sd' and demanditem.date <= '$ed' " ;
					}
					else
					{
						if(!empty($_POST['startDate']))
						{
							$dQuery=" where demanditem.date >= '$sd' " ;
						}
						else
						{
							$dQuery=" where demanditem.date <= '$ed' " ;
						}
					}
			}
			
			
			
			$query="select * from demanditem inner join items on demanditem.item_id=items.id ".$dQuery;
			
			$result = $conn->query($query);
			
			if($result->num_rows > 0)
			{
				$queryRow = $result->fetch_assoc();
				$temp= new DemandItem();
				$temp->id=$queryRow['did'];
				$temp->itemName=$queryRow['name'];
				$temp->date=$queryRow['date'];
				$temp->type=$queryRow['type'];
				$temp->price=$queryRow['marketPrice'];
				$temp->status=$queryRow['status'];

				array_push($demands ,array($queryRow['username'],$temp));
			}
			
			for($a=1;$a<$result->num_rows;$a++)
			{
				$queryRow=$result->fetch_assoc();
				$temp= new DemandItem();
				$temp->id=$queryRow['did'];
				$temp->itemName=$queryRow['name'];
				$temp->date=$queryRow['date'];
				$temp->type=$queryRow['type'];
				$temp->price=$queryRow['marketPrice'];
				$temp->status=$queryRow['status'];
				
				$count=check($queryRow['username'],$demands);
				if($count==count($demands))
				{
					array_push($demands ,array($queryRow['username'],$temp));
				}
				else
				{
					array_push($demands[$count] , $temp);
				}
			}
		
		
		     
					echo ' <br><br><br><br>
					<table style="border: 3px solid black; width:77%" >
							<tr style="border: 3px solid black  ; background-color:#c4c9d1 ;  padding:10px;text-align: center;">
							<th style="border: 1px solid black; padding:10px; text-align: center;" ><h2>User</h2></th>
							<th style="border: 1px solid black; padding:10px; text-align: center;" ><h2>Item </h2></th> 
							<th style="border: 1px solid black; padding:10px; text-align: center;" ><h2>Market <br>Price</h2></th>
							<th style="border: 1px solid black; padding:10px; text-align: centre;" ><h2>Type</h2></th>
							<th style="border: 1px solid black; padding:10px; text-align: center;"><h2>Date</h2></th>
							<th style="border: 1px solid black; padding:10px; text-align: center;"><h2>Status</h2></th>

							</tr>';

		
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			for($i=0;$i<count($demands);$i++)
			{
				

			$uname=$demands[$i][0];
			
			  
			  for($j=1;$j<count($demands[$i]);$j++)
			  {
				  $temp=$demands[$i][$j]; 
				  $d=explode(' ',$temp->date);
				  
				  if($temp->status=="Rejected")
				  {
					  $color="#ff7c6d";
				  }
				  else if($temp->status=="Approved")
				  {
					  $color="#44fc81";
				  }
				  else
				  {
					  $color="#62dce5";
				  }
				  
				  		if(isset($_POST['option']))
						{
							
							if(!empty($_POST['username']) || !empty($_POST['itemName']))
							{
								if(!empty($_POST['username']) && !empty($_POST['itemName']))
								{
									if(stristr($uname,$_POST['username'])==null || stristr($temp->itemName,$_POST['itemName'])==null )
									{
										continue;
									}
								}
								else if(!empty($_POST['username']) && empty($_POST['itemName']))
								{
									if(stristr($uname,$_POST['username'])==null)
									{
										continue;
									}
								}
								else if(empty($_POST['username']) && !empty($_POST['itemName']))
								{
									if( stristr($temp->itemName,$_POST['itemName'])==null )
									{
										continue;
									}
								}
							}
							
							$o=$_POST['option'];
						
							if(checkCS($o))
							{
								if(checkOption($o,$temp->status) && checkOption($o,$temp->type))
								{
			  
									echo '<tr style="border: 1px solid black; ">
										<th style="border: 1px solid black; text-align: center;" ><div>
										<h3>'.$uname.'</h3>
										<img style="width:80px;height:80px;" src="users/'.$uname.'.jpg" >
										</div></th>
										<th style="border: 1px solid black; text-align: center;" ><div>
										<h3>'.$temp->itemName.'</h3>
										<img style="width:80px;height:80px;" src="items/'.$temp->itemName.'.jpg" >
										</div></th>
							
										<th style="border: 1px solid black; text-align: center;" >'.$temp->price.'</th>
										<th style="border: 1px solid black; text-align: center;" >'.$temp->type.'</th>
										<th style="border: 1px solid black; text-align: center;" >'.$d[0].'<br>'.$d[1].'</th>
										<th style="border: 1px solid black; text-align: center; background-color:'.$color.'" >'.$temp->status;
									if($temp->status=="Pending")
									{
							
										echo'	
										<br>
										<br>
										<form action="reject_item.php"  method="post"  >
										<input type="text" name="riid" hidden value="'.$temp->id.'">
										<input style="background-color: red; color:white;" type="submit" value="Reject">
										</form>

										<form action="approve_item.php"  method="post" >
										<input type="text" name="aiid" hidden value="'.$temp->id.'">
										<input style="background-color: green; color:white; " type="submit" value="Approve">
										</form>';
									}
						
									echo '</th>


									</tr>';
								}
							}
							else
							{
								if(checkOption($o,$temp->status) || checkOption($o,$temp->type))
								{
			  
									echo '<tr style="border: 1px solid black; ">
										<th style="border: 1px solid black; text-align: center;" ><div>
										<h3>'.$uname.'</h3>
										<img style="width:80px;height:80px;" src="users/'.$uname.'.jpg" >
										</div></th>
										<th style="border: 1px solid black; text-align: center;" ><div>
										<h3>'.$temp->itemName.'</h3>
										<img style="width:80px;height:80px;" src="items/'.$temp->itemName.'.jpg" >
										</div></th>
							
										<th style="border: 1px solid black; text-align: center;" >'.$temp->price.'</th>
										<th style="border: 1px solid black; text-align: center;" >'.$temp->type.'</th>
										<th style="border: 1px solid black; text-align: center;" >'.$d[0].'<br>'.$d[1].'</th>
										<th style="border: 1px solid black; text-align: center; background-color:'.$color.'" >'.$temp->status;
									if($temp->status=="Pending")
									{
							
										echo'	
										<br>
										<br>
										<form action="reject_item.php"  method="post"  >
										<input type="text" name="riid" hidden value="'.$temp->id.'">
										<input style="background-color: red; color:white;" type="submit" value="Reject">
										</form>

										<form action="approve_item.php"  method="post" >
										<input type="text" name="aiid" hidden value="'.$temp->id.'">
										<input style="background-color: green; color:white; " type="submit" value="Approve">
										</form>';
									}
						
									echo '</th>


									</tr>';
								}
							}
						}
						
				 
			  }
			  
			  
			  
			   
			
			
			}      
				
			echo '</table>';
			
			
			
			
			
			
			
			
			
			
			
			
				
				function checkOption($opr,$tp)
				{
					$N=count($opr);
					for($i=0;$i<$N;$i++)
					{
						if($opr[$i]==$tp || $opr[$i]=="all")
						{
							return true;
						}
					}
					return false;
				}
				
				
				function checkCS($opr)
				{
					$N=count($opr);
					$c=false;
					$s=false;
					for($i=0;$i<$N;$i++)
					{
						if($opr[$i]=="consumable" || $opr[$i]=="non-consumable")
						{
							$c=true;
						}
						if($opr[$i]=="Pending" || $opr[$i]=="Approved" || $opr[$i]=="Rejected")
						{
							$s=true;
						}
					}
					
					return ($c && $s);
				}
				
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			?>

			      
           	<div class="main_bottom"></div>

        </div>



        <div id="footer">
       
        </div>

        </div>
</body>
</html>
