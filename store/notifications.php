<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="style.css" />
<link rel="stylesheet" type="text/css" href="logoutbutton.css" />
<title>Notifications</title>






</head>
   
    
    
    <script src="jquery.js"></script>

<script>



    function markRead(a)
    {
        document.getElementById(a).remove();
        $.post("clearNotification.php", {did : a}, function(result){
            
            if(!result)
            {
                alert("There is an error occur!!!");
            }
        });  
    }




</script>
    
    
    
    
    
<body>
 <div id="page">	
	<br>
	<br><br>
	
		<div id="main">
	<?php
	session_start();
	
	require 'mainMenu.php';
?>

			<div class="main_top">
            	<h1>Notifications :</h1>
			
            </div>
        	
           	<div class="main_body">
				
				
				
				
				<form action="clearAllNotification.php" method="post">
				<input  style=" padding:12px; background-color:grey;color:white; float:right "  type="submit" value="Mark All Read"/>
				</form>
				
				<br><br><br><br><br><br>
					<div style="border: 1px solid black;">			
				<?php
					
					require 'connectToDatabase.php';
					$q="select * from demanditem inner join items on demanditem.item_id=items.id where notification != 0 ";
					
					$result = $conn->query($q);
					
					$pre=explode(',',$_SESSION["privileges"]);
					
					
					 for($i=0;$i<$result->num_rows;$i++)
						{
							$queryRow=$result->fetch_assoc();
							
                             $a=$queryRow['did'];
                                                        
							if($i%2==0)
							{
								$color="#c9c9c9";
							}
							else
							{
								$color="white";
							}
					
							if($queryRow['notification']==1 && $pre[4]=="1")
							{
								echo '<div id="'.$a.'" style =" border:1px solid black; padding :7px; background-color:'.$color.'; ">
								<p style="display:inline-block; font-size:16px"> <b>'.$queryRow['username'].'</b>  has demanded an item named <b>'.$queryRow['name'].'</b>
								at the time <b>'.$queryRow['date'].'</b>.</p>
								<button onclick="markRead('.$a.')"  style=" float:right; display:inline-block;" >Mark read</button>
								</div>';
							}


							if($queryRow['notification']==2 && $queryRow['username']==$_SESSION['username'])
							{
								echo '<div   id="'.$a.'" style =" border:1px solid black; padding :7px; background-color:'.$color.';">
								<p style="display:inline-block; font-size:16px">Your demand of <b>'.$queryRow['name'].'</b>
								has been <b>accepted</b>.</p>
								<button onclick="markRead('.$a.')"  style=" float:right; display:inline-block;" >Mark read</button>
								</div>';
							}
							
							
							
							if($queryRow['notification']==3 && $queryRow['username']==$_SESSION['username'])
							{
								echo '<div  id="'.$a.'" style =" border:1px solid black; padding :7px; background-color:'.$color.'; ">
								<p style="display:inline-block; font-size:16px">Your demand of <b>'.$queryRow['name'].'</b>
								has been <b>rejected</b>.</p>
								<button   onclick="markRead('.$a.')"   style=" float:right; display:inline-block;" >Mark read</button>
								</div>';
							}
							
							
							
							
							
						}
					
					
				
				
				
				
				
				if($pre[3]=="1" || $pre[4]=="1" || $pre[5]=="1")
				{
				
					$q2="select notifications.id  , notifications.type, notifications.time, items.name from notifications inner join items on notifications.iid = items.id where status=1";

					$result2 = $conn->query($q2);
					
					for($j=0;$j<$result2->num_rows;$j++)
					{
						
						if($j%2==0)
							{
								$color="#c9c9c9";
							}
							else
							{
								$color="white";
							}
					
						
						
						$queryRow2=$result2->fetch_assoc();

						$z=$queryRow2['id']*-1;
						
						
							if($queryRow2['type']=="Warning")
							{
								echo '<div  id="'.$z.'" style=" border:1px solid black; padding :7px; background-color:'.$color.'; ">
						
								<p style="display:inline-block; font-size:16px">
								<b style="color:green">'.$queryRow2['type'].' : </b> The stock of item named <b>'.$queryRow2['name'].'</b> is very low i-e(less than 5). <br>
								The last demand is at <b>'.$queryRow2['time'].'</b> 
								</p>
								<button   onclick="markRead('.$z.')"   style=" float:right; display:inline-block;" >Mark read</button>
								</div>';
							}
							else
							{
								echo '<div  id="'.$z.'" style=" border:1px solid black; padding :7px; background-color:'.$color.'; ">
						
								<p style="display:inline-block; font-size:16px">
								<b style="color:red">'.$queryRow2['type'].' : </b> The stock of item named <b>'.$queryRow2['name'].'</b> is ZERO. <br>
								The last demand is at <b>'.$queryRow2['time'].'</b> 
								</p>
								<button   onclick="markRead('.$z.')"   style=" float:right; display:inline-block;" >Mark read</button>
								</div>';	
							}
						
					}
				
				
				}
														
				?>
				</div>
							
				<br><br><br>
			</div>
							
			<div class="main_bottom">
			</div>
							
		</div>
		


		<div id="footer">
        
        </div>		
</div>
							
							 
 </body>
 </html>