

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="style.css" />
<link rel="stylesheet" type="text/css" href="logoutbutton.css" />

<script src="jquery.js"></script>

<script>
$(document).ready(function(){
	 
	if($("#notify").text()=="0")
	{
		$("#notify").hide();
	}
	else
	{
		$("#notify").show();
	}
	 
	setInterval(function(){
		
		 $.post("getNotification.php", function(data){
			 if(data==0)
			 {
				$("#notify").hide(); 
			 }
			 else
			 {
				 $("#notify").show();
				$("#notify").text(data);
			 }
			 
		 });
		
	}, 3000);
	 
    $("#more").mouseover(function(){
       $("#extendedMenu").show();
    });
	
	$("#more").mouseleave(function(){
		$("#extendedMenu").hide();   
    });
	
	$("#extendedMenu").mouseover(function(){
       $("#extendedMenu").show();
    });
		
	$("#extendedMenu").mouseleave(function(){
		$("#extendedMenu").hide();
    });
		
	
});
</script>




</head>
	<div style="width:auto; height:60px; display:inline-block; background-color:#4c4b49; border-radius: 7px;  position:absolute; top:0px; right:2px">
	<?php
	
	
	
		function getNotify()
		{
				require 'connectToDatabase.php';
				 
				$username=$_SESSION["username"];
				
				$q1="select * from demanditem where notification = 1 or (username = '$username' and notification != 0) ";
	
				$q2="select * from demanditem where notification > 1  and username = '$username'";
				
				$q3="select * from notifications where status = 1";
									
				$pre=explode(',',$_SESSION["privileges"]);
	
				$notifications = $conn->query($q3)->num_rows;
	
				if($pre[4]=="1")
				{
					$result = $conn->query($q1)->num_rows;
					return $result + $notifications;
		
				}
				else
				{
		
					$result2 = $conn->query($q2)->num_rows;
		
					if($pre[3]=="1" || $pre[5]=="1")
					{
						return $result2 + $notifications;
					}
					else
					{
						return $result2;
					}
				}			
		}
	
	
	
	
	
	
	
	
	
	
		echo '<img  style="display:inline-block; position:relative; left:0px; padding:2px;" height="55px" width="55px" src="users/'.$_SESSION['username'].'.jpg">
		<h1 style="display:inline-block; position:relative; bottom:18px; left:10px;">'.$_SESSION['username'].'</h1> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
		<a href="notifications.php"><img src="notification.png" title="Notifications" width ="30px" style="position:absolute; right :70px; bottom:13px"></a>
		<p hidden id="notify" style="background-color:red; font-size:14px; padding:0px 3px 0px 2px; position:absolute; right:95px; bottom:35px;">'. getNotify() .'</p>
		<a style="display:inline-block; color:white; position:absolute; bottom:23px; right:10px;" href="logout.php">Logout</a>
		';
	?>
	</div>
        <div id="header">
			<h1>PUCIT Store</h1>
        	<ul>
			<?php
			
				$temp=0;
				$pre=explode(',',$_SESSION["privileges"]);
				foreach($pre as $i)
				{
					if($i=="1")
					{
						$temp++;
					}
				}
				if($temp<=5)
				{
				
					if($pre[0]=="1")
					{
						echo' <li><a href="demand.php">Demands</a></li>';
					}
				
					if($pre[1]=="1")
					{
						echo' <li><a href="history.php">History</a></li>';
					}
				
					if($pre[2]=="1")
					{
						echo' <li><a href="users.php">Users</a></li>';
					}
				
					if($pre[3]=="1")
					{
						echo'  <li><a href="items.php">Items</a></li>';
					}
					
					if($pre[4]=="1")
					{
						echo'  <li><a href="approval.php">Approval</a></li>';
					}
					
					if($pre[5]=="1")
					{
						echo' <li><a href="vendors.php">Vendors</a></li>';
					}
					
					if($pre[6]=="1")
					{
						echo' <li><a href="billing.php">Billing</a></li>';
					}
					
					if($pre[7]=="1")
					{
						echo' <li><a href="clearance.php">Clearance</a></li>';
					}
				
				echo '</ul>';
				}
				else
				{
					$s4=0;
					if($pre[0]=="1")
					{
						echo' <li><a href="demand.php">Demands</a></li>';
						$s4++;
					}
				
					if($pre[1]=="1")
					{
						echo' <li><a href="history.php">History</a></li>';
						$s4++;
					}
				
					if($pre[2]=="1")
					{
						echo' <li><a href="users.php">Users</a></li>';
						$s4++;
					}
				
					if($pre[3]=="1")
					{
						echo'  <li><a href="items.php">Items</a></li>';
						$s4++;
						if($s4==4)
						{
							goto a;
						}
					}
					
					if($pre[4]=="1")
					{
						echo'  <li><a href="approval.php">Approval</a></li>';
						$s4++;
						if($s4==4)
						{
							goto a;
						}
					}
					
					if($pre[5]=="1")
					{
						echo' <li><a href="vendors.php">Vendors</a></li>';
						$s4++;
						if($s4==4)
						{
							goto a;
						}
					}
					
					if($pre[6]=="1")
					{
						echo' <li><a href="billing.php">Billing</a></li>';
						$s4++;
						if($s4==4)
						{
							goto a;
						}
					}
					
					if($pre[7]=="1")
					{
						echo' <li><a href="clearance.php">Clearance</a></li>';
						$s4++;
						if($s4==4)
						{
							goto a;
						}
					}

					
					
					
					
					
					
				a:	echo '<div  id="more"><li><img width="16px" src="more.png"></li></div>';
					echo '</ul>';
				
				
				
				
				
				
			
			
			echo'<div hidden id="extendedMenu" style="width:155px; z-index:10; height:auto; background-color:#4c4b49; position:absolute; right:0px; top:125px; border-radius: 8px; ">
			<br>';
			$temp=$temp-5;
			
			if($temp>=0 && $pre[7]=="1")
			{
				echo '<a style="color: white; padding-left: 37px;  font-size:18px " href="clearance.php">Clearance</a><br><br>';
				$temp--;
			}
			
			if($temp>=0 && $pre[6]=="1")
			{
				echo '<a style="color: white; padding-left: 47px; font-size:18px " href="billing.php">Billing</a><br><br>';
				$temp--;
			}
			
			if($temp>=0 && $pre[5]=="1")
			{
				echo '<a  style="color: white; padding-left: 41px;  font-size:18px " href="vendors.php">Vendors</a><br><br>';
				$temp--;
			}
			
			if($temp>=0 && $pre[4]=="1")
			{
				echo '<a style="color: white; padding-left: 39px; font-size:18px " href="approval.php">Approval</a><br><br>';
				$temp--;
			}
			
			echo ' </div>';
				}
			?>
        </div>
		
		
	