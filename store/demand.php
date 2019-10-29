<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="style.css" />
<link rel="stylesheet" type="text/css" href="logoutbutton.css" />
<title>Demands</title>
</head>
    
<body>
    <?php session_start(); ?>
    <script>
        function demandSuccess()
        {
            alert("item demanded successfully");
        }
        function demandFailure()
        {
            alert("Error demanding item");
        }
        function StockNotPresent()
        {
            alert("item you are demanding is not present in stock now...Request is Pending...");
        }
        </script>
    <?php

 if(isset($_SESSION["demandSuccess"]) && $_SESSION["demandSuccess"]==false)
{
	echo '<script type="text/javascript">',		'demandFailure();',
						'</script>';						
}
else if(isset($_SESSION["stockNotPresent"]) && $_SESSION["stockNotPresent"]==true)
{
	echo '<script type="text/javascript">',		'StockNotPresent();',
						'</script>';						
}
else if(isset($_SESSION["demandSuccess"]) && $_SESSION["demandSuccess"]==true)
{
	echo '<script type="text/javascript">',		'demandSuccess();',
						'</script>';						
}


?>
    <?php
    if(isset($_SESSION["demandSuccess"]))
			{
				unset($_SESSION["demandSuccess"]);
			}
                          if(isset($_SESSION["stockNotPresent"]))
			{
				unset($_SESSION["stockNotPresent"]);
			}
                       
    
    ?>

    <div id="page">	
	<br>
	<br><br><br>
	<?php
require 'mainMenu.php';
?>	
		<div id="main">

        	<div class="main_top">
            	<h1>Demand Items Here :</h1>
            </div>

           	<div class="main_body">
			
               <div style="width:220px; border: 3px outset #999da3; padding:10px; position:relative;  float:right; right:40px">
			   
					<img style=" " src="cons.png " height="130px" width="220px">
					<br>
					<br>
					<h2>Description :</h2>
					<p>
					This page is for demand items. Orange color border shows that the item is consumable and blue color shows that the item is non-consumable.
					</p>
				
				
				
			   </div>

			   <br><br>
			   
			
			   
			   	<?php
			    require 'connectToDatabase.php';
				
			  
			   $allc="";
			   $conc="";
			   $nonc="";
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
			   
			   
			   
			   
			   
			   
			   
			   echo'
			
			   
			   
			    <div style="padding:30px;  position:relative; left:70px;">
			    <form  action="demand.php" method="post">
				<input style="padding:12px; width:350px;" type="text" name="itemName" value="'.$in.'"  placeholder="Search Item Here... "/>
				<br><br><br><br>
				<div style="display:inline-block;">
				
			    <input type="checkbox" '.$allc.' name="option[]" value="all"> &nbsp All items <br>
				<input type="checkbox" name="option[]" '.$conc.' value="consumable"> &nbsp Consumable <br>
				<input type="checkbox" name="option[]" '.$nonc.' value="non-consumable"> &nbsp Non-consumable 
				</div>
				
				<div style="display:inline-block; position:relative;left:100px;bottom:14px;">
				<input type="radio" name="view" value="table" '.$t.'/>Table View <br>
				<input type="radio" name="view" value="grid" '.$g.' />Grid View <br>
				</div>
				<br><br><br><br>
				<input style=" position:relative;padding:9px" type="submit" value="Filter">
				</form>
			   </div>
			   
			   <br><br><br><br><br>';
			   
			  
			   
		
			    $orange="rgb(255,127,39)";
			    $blue="rgb(0,162,232)";
				
				$query="select * from items";
				$result = $conn->query($query);
				
				
				
				   
				
				
				
		
				
				if(isset($_POST['view']) && $_POST['view']=="table")
				{
					echo '<table style="border: 3px solid black; width:70%" >
							<tr style="border: 3px solid black; padding:10px;">
							<th style="border: 1px solid black; padding:10px;" >Picture</th>
							<th style="border: 1px solid black; padding:10px;" >Item Name</th> 
							<th style="border: 1px solid black; padding:10px;" >Market Price</th>
							<th style="border: 1px solid black; padding:10px;" >Type</th>
							<th style="border: 1px solid black; padding:10px;">Demand Item</th>
							</tr>';
				}
				
			    for($i=0;$i<$result->num_rows;$i++)
				{
					$queryRow = $result->fetch_assoc();
					if($queryRow['type']=="consumable")
					{
						$color=$orange;
					}
					else
					{
						$color=$blue;
					}
					$name=$queryRow['name'];
					$price=$queryRow['marketPrice'];
					$type=" (".$queryRow['type'].")";
					$id=$queryRow['id'];
					if(isset($_POST['view']) && $_POST['view']=="grid")
					{
						
						if(isset($_POST['option']))
						{
						
							$opr=$_POST['option'];
							$tp=$queryRow['type'];
							if(checkType($opr,$tp))
							{
								if(!empty($_POST['itemName']))
								{
									$iname=$_POST['itemName'];
									if(stristr($name,$iname)!=null)
									{
										echo ' <div style="padding:35px; display:inline-block;">
										<img style="border-style: solid; border-color:'. $color .';border-width: 8px; " width=200px height=200px src="items/'.$name.'.jpg" />
										<br>	
							
										<form action="demand_item.php" method="post">
										<input name="itemid" type="text" hidden value="'.$id.'" >
										<input style="background-color:'.$color.';border-color:'. $color .'; color:white;width:215px;padding:10px;" type="submit" value="Demand Item">
										</form>
							
										<h3>'.$name. $type.'</h3>Market Price : '.$price.'
										</div>';
									}
					
					
								}
								
								else
								{
									echo ' <div style="padding:35px; display:inline-block;">
									<img style="border-style: solid; border-color:'. $color .';border-width: 8px; " width=200px height=200px src="items/'.$name.'.jpg" />
									<br>	
							
									<form action="demand_item.php" method="post">
									<input name="itemid" type="text" hidden value="'.$id.'" >
									<input style="background-color:'.$color.';border-color:'. $color .'; color:white;width:215px;padding:10px;" type="submit" value="Demand Item">
									</form>
									
									<h3>'.$name. $type.'</h3>Market Price : '.$price.'
									</div>';
								}
							}
						}
					}
					else
					{
						if(isset($_POST['option']))
						{
							
							$opr=$_POST['option'];
							$tp=$queryRow['type'];
						if(checkType($opr,$tp))
						{
							
								if(!empty($_POST['itemName']))
								{
									$iname=$_POST['itemName'];
									if(stristr($name,$iname)!=null)
									{
											
										echo '<tr style="border: 1px solid black; ">
										<th style="border: 1px solid black; text-align: center; " ><img src="items/'.$name.'.jpg" width="70px" hieght="65px" ></th>
										<th style="border: 1px solid black; text-align: center; " >'.$name.'</th> 
										<th style="border: 1px solid black; text-align: center; " >'.$price.'</th>
										<th style="border: 1px solid black; text-align: center; " >'.$type.'</th>
										<th style="border: 1px solid black; text-align: center; ">
						
										<form action="demand_item.php" method="post">
										<input name="itemid" type="text" hidden value="'.$id.'" >
										<input style="background-color:'.$color.';border-color:'. $color .'; color:white;padding:10px;" type="submit" value="Demand Item">										</form></th>
										</tr>';
									
									}
					
					
								}
								
								
								else
								{
							
									echo '<tr style="border: 1px solid black; ">
									<th style="border: 1px solid black; text-align: center; " ><img src="items/'.$name.'.jpg" width="70px" hieght="65px" ></th>
									<th style="border: 1px solid black;  text-align: center;" >'.$name.'</th> 
									<th style="border: 1px solid black; text-align: center; " >'.$price.'</th>
									<th style="border: 1px solid black;  text-align: center;" >'.$type.'</th>
									<th style="border: 1px solid black; text-align: center; ">
					
									<form  action="demand_item.php" method="post"  >
									<input name="itemid" type="text" hidden value="'.$id.'" >
									<input style="background-color:'.$color.';border-color:'. $color .'; color:white;padding:10px;" type="submit" value="Demand Item">										</form></th>
									</tr>';
							
							
								}
						
						}
						}
						
						
					}
					
					
				}
				
				if(isset($_POST['view']) && $_POST['view']=="table")
				{
					echo '</table>';
				}
				
				
		
				
				
				
				
				
				function checkType($opr,$tp)
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
				
				
				
			   
			   ?>			   		   
			</div>

           	<div class="main_bottom"></div>

        </div>



        <div id="footer">
       
        </div>

        </div>
</body>
</html>
