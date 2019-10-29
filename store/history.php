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
<title>Demand History</title>
</head>

<body>

    <div id="page">

		<br>
	<br><br>
	
	
       

        <div id="main">
			<?php require 'mainMenu.php';?>
        	<div class="main_top">
            	<h1>Demand History :</h1>
            </div>

			
			
			
			
			
			
			
			
			
           	<div class="main_body">
      
               <div style="width:220px; border: 3px outset #999da3; position:relative; right:40px; float:right">
			   <img src="rpa.png" height="220px" width="220px">
			   
					<br><br>
		
					<h2>Description :</h2>
					<p>
					This page is for demand items history. RED color border shows that the item is rejected, BLUE color shows that the item is still pendding and GREEN color shows that the item is approved.
					</p>
			   
			   
			   </div>
			   
			



			
			<?php
			
			
			
			
			
				  
			   $allc="";
			   $conc="";
			   $nonc="";
			   $rej="";
			   $pend="";
			   $appr="";
			   
			   
			   $in="";
			   
			   if(isset($_POST['itemName']))
			   {
				   $in=$_POST['itemName'];
			   }
			   
			   
			   
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
					if($arr[$i]=="Pendding")
					{
						$pend="checked";
					}
					
				  }
			   }
			   
			   $t="checked";
			   $g="";
			   
			if(isset($_POST['view']))
			{
				if($_POST['view']=="table")
				{
					$t="checked";
					$g="";
				}
				
				else
				{
					$t="";
					$g="checked";
				}
				
			}
			   
			   
			
			
			
			
			
			
			
			
			echo '
			
			<br><br><br><br>
			    <div style="position:relative;left:80px ">
			    <form  action="history.php" method="post">
				<input style="padding:12px; width:350px;" type="text" name="itemName" value="'.$in.'" placeholder="Search Item Here... "/>
				<br><br><br>
				<br>
				<div style="display:inline-block;">
			    <input type="checkbox" '.$allc.' name="option[]" value="all"> &nbsp All items <br>
				<input type="checkbox" name="option[]" '.$conc.' value="consumable"> &nbsp Consumable <br>
				<input type="checkbox" name="option[]" '.$nonc.' value="non-consumable"> &nbsp Non-consumable <br>
				<input type="checkbox" name="option[]" '.$rej.' value="Rejected"> &nbsp Rejected <br>
				<input type="checkbox" name="option[]" '.$pend.' value="Pendding"> &nbsp Pendding <br>
				<input type="checkbox" name="option[]" '.$appr.' value="Approved"> &nbsp Approved <br>
				</div>
				
				<div style="display:inline-block; position:relative;left:80px;bottom:17px; ">
				<h2>Select Time Period :</h2><br>
				<b>Start Date :</b><input  style="position:relative;left:1px;" type="date" name="startDate" /><br>
				<b>End Date :&nbsp</b> <input  type="date" name="endDate" />
				</div>
				
				<br><br><br><br>
				<div style=" display:inline-block; position:relative;left:70px;">
				<input type="radio" name="view" value="table" '.$t.'/>Table View <br>
				<input type="radio" name="view" value="grid" '.$g.' />Grid View 
				</div>
				
				<input style=" display:inline-block;position:relative;left:180px;bottom:10px; padding:9px" type="submit" value="Filter">
				</form>
			   </div>
			   
			   <br><br><br><br><br><br><br><br>';
			
		





			
			   
			 
			   
			  	
				
			    require 'connectToDatabase.php';
				$username=$_SESSION['username'];
				$red="#ff7451";
				$green="#a0ff75";
				$blue="#7cf8ff";
				
				$temp="";
				if(!empty($_POST['startDate']) || !empty($_POST['endDate']))
				{
					$sd=$_POST['startDate']." 00:00:00";
					$ed=$_POST['endDate']." 23:59:59";
					if(!empty($_POST['startDate']) && !empty($_POST['endDate']))
					{
						
						$temp=" and demanditem.date >= '$sd' and demanditem.date <= '$ed' " ;
					}
					else
					{
						if(!empty($_POST['startDate']))
						{
							$temp=" and demanditem.date >= '$sd' " ;
						}
						else
						{
							$temp=" and demanditem.date <= '$ed' " ;
						}
					}
				}
				
				
				$q="select * from demanditem inner join items on demanditem.item_id=items.id where demanditem.username='$username'";
				$query=$q.$temp;
				$result = $conn->query($query);
				
				
				
				
				
				if(isset($_POST['view']) && $_POST['view']=="table")
				{
					echo '<table style="border: 3px solid black; width:70%" >
							<tr style="border: 3px solid black  ; background-color:#c4c9d1 ;  padding:10px;text-align: center;">
							<th style="border: 1px solid black; padding:10px; text-align: center;" ><h2>Picture</h2></th>
							<th style="border: 1px solid black; padding:10px; text-align: center;" ><h2>Item Name</h2></th> 
							<th style="border: 1px solid black; padding:10px; text-align: center;" ><h2>Market Price</h2></th>
							<th style="border: 1px solid black; padding:10px; text-align: center;" ><h2>Type</h2></th>
							<th style="border: 1px solid black; padding:10px; text-align: center;"><h3>Date (When Demanded)</h3></th>
							<th style="border: 1px solid black; padding:10px; text-align: center;"><h2>Status</h2></th>

							</tr>';
				}
				
				
				
				
				
				
				
				
				
				
			    for($i=0;$i<$result->num_rows;$i++)
				{
					$queryRow=$result->fetch_assoc();
					if($queryRow['status']=="Pending")
					{
						$color=$blue;
					}
					if($queryRow['status']=="Approved")
					{
						$color=$green;
					}
					if($queryRow['status']=="Rejected")
					{
						$color=$red;
					}
					$status=$queryRow['status'];
					$name=$queryRow['name'];
					$price=$queryRow['marketPrice'];
					$type=$queryRow['type'];
					$d=explode(" ",$queryRow['date']);
					
					
					
					
					
					
					
		
					
					
					
					
					
					
					
					
					
					
					if(isset($_POST['view']) && $_POST['view']=="grid")
					{
					
						if(isset($_POST['option']))
						{
							$o=$_POST['option'];
						
							if(checkCS($o))
							{
								if(checkOption($o,$status) && checkOption($o,$type))
								{
												
					
									if(!empty($_POST['itemName']))
									{
										$iname=$_POST['itemName'];
										if(stristr($name,$iname)!=null)
										{
							
											echo ' <div style="padding:40px; display:inline-block;">
											<img style="border-style: solid; border-color:'. $color .';border-width: 6px; " width=170px height=170px src="items/'.$name.'.jpg" />
											<h2 style=" text-align:centre;color:'.$color.'">'.$status.'</h2>
											<h3>'.$name.'('.$type.')</h3>Market Price : '.$price.'<br>
											Date when demanded :<b>'.$d[0].'<br>'.$d[1].'</b>
											</div>';
										}
									}
					
									else
									{
					
										echo ' <div style="padding:40px; display:inline-block;">
										<img style="border-style: solid; border-color:'. $color .';border-width: 6px; " width=170px height=170px src="items/'.$name.'.jpg" />
										<h2 style=" text-align:centre;color:'.$color.'">'.$status.'</h2>
										<h3>'.$name.'('.$type.')</h3>Market Price : '.$price.'<br>
										Date when demanded :<b>'.$d[0].'<br>'.$d[1].'</b>
										</div>';
									}
								}
							}
							else
							{
								if(checkOption($o,$status) || checkOption($o,$type))
								{
									
									
									if(!empty($_POST['itemName']))
									{
										$iname=$_POST['itemName'];
										if(stristr($name,$iname)!=null)
										{
							
											echo ' <div style="padding:40px; display:inline-block;">
											<img style="border-style: solid; border-color:'. $color .';border-width: 6px; " width=170px height=170px src="items/'.$name.'.jpg" />
											<h2 style=" text-align:centre;color:'.$color.'">'.$status.'</h2>
											<h3>'.$name.'('.$type.')</h3>Market Price : '.$price.'<br>
											Date when demanded :<b>'.$d[0].'<br>'.$d[1].'</b>
											</div>';
										}
									}
									else
									{
										echo ' <div style="padding:40px; display:inline-block;">
										<img style="border-style: solid; border-color:'. $color .';border-width: 6px; " width=170px height=170px src="items/'.$name.'.jpg" />
										<h2 style=" text-align:centre;color:'.$color.'">'.$status.'</h2>
										<h3>'.$name.'('.$type.')</h3>Market Price : '.$price.'<br>
										Date when demanded :<b>'.$d[0].'<br>'.$d[1].'</b>
										</div>';
									}
								}
							}
						}
					}
					else
					{
						if(isset($_POST['option']))
						{
							$o=$_POST['option'];
						
							if(checkCS($o))
							{
								if(checkOption($o,$status) && checkOption($o,$type))
								{
									
									if(!empty($_POST['itemName']))
									{
										$iname=$_POST['itemName'];
										if(stristr($name,$iname)!=null)
										{
											echo '<tr style="border: 1px solid black; ">
											<th style="border: 1px solid black; text-align: center;" ><img src="items/'.$name.'.jpg" width="70px" hieght="65px" ></th>
											<th style="border: 1px solid black; text-align: center;" >'.$name.'</th> 
											<th style="border: 1px solid black; text-align: center;" >'.$price.'</th>
											<th style="border: 1px solid black; text-align: center;" >'.$type.'</th>
											<th style="border: 1px solid black; text-align: center;" >'.$d[0].'<br>'.$d[1].'</th>
											<th style="border: 1px solid black; text-align: center;  background-color:'.$color.';" >'.$status.'</th>
											</tr>';
										}
									}
									else
									{
										echo '<tr style="border: 1px solid black; ">
										<th style="border: 1px solid black; text-align: center;" ><img src="items/'.$name.'.jpg" width="70px" hieght="65px" ></th>
										<th style="border: 1px solid black; text-align: center;" >'.$name.'</th> 
										<th style="border: 1px solid black; text-align: center;" >'.$price.'</th>
										<th style="border: 1px solid black; text-align: center;" >'.$type.'</th>
										<th style="border: 1px solid black; text-align: center;" >'.$d[0].'<br>'.$d[1].'</th>
										<th style="border: 1px solid black; text-align: center;  background-color:'.$color.';" >'.$status.'</th>
										</tr>';
									}
								}
							}
							else
							{
								if(checkOption($o,$status) || checkOption($o,$type))
								{
									
									if(!empty($_POST['itemName']))
									{
										$iname=$_POST['itemName'];
										if(stristr($name,$iname)!=null)
										{
											echo '<tr style="border: 1px solid black; ">
											<th style="border: 1px solid black; text-align: center;" ><img src="items/'.$name.'.jpg" width="70px" hieght="65px" ></th>
											<th style="border: 1px solid black; text-align: center;" >'.$name.'</th> 
											<th style="border: 1px solid black; text-align: center;" >'.$price.'</th>
											<th style="border: 1px solid black; text-align: center;" >'.$type.'</th>
											<th style="border: 1px solid black; text-align: center;" >'.$d[0].'<br>'.$d[1].'</th>
											<th style="border: 1px solid black; text-align: center;  background-color:'.$color.';" >'.$status.'</th>
											</tr>';
										}
									}
									else
									{
										echo '<tr style="border: 1px solid black; ">
										<th style="border: 1px solid black; text-align: center;" ><img src="items/'.$name.'.jpg" width="70px" hieght="65px" ></th>
										<th style="border: 1px solid black; text-align: center;" >'.$name.'</th> 
										<th style="border: 1px solid black; text-align: center;" >'.$price.'</th>
										<th style="border: 1px solid black; text-align: center;" >'.$type.'</th>
										<th style="border: 1px solid black; text-align: center;" >'.$d[0].'<br>'.$d[1].'</th>
										<th style="border: 1px solid black; text-align: center;  background-color:'.$color.';" >'.$status.'</th>
										</tr>';
									}
								}
							}
							
						}
					}
				}
				
				
				
				
				if(isset($_POST['view']) && $_POST['view']=="table")
				{
					echo '</table>';
				}
				
				
				
			
				
				
				
				
				
				
				
				
				
				
				
				
				
					
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
						if($opr[$i]=="Pendding" || $opr[$i]=="Approved" || $opr[$i]=="Rejected")
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
