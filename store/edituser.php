	<?php
	require 'connectToDatabase.php';
	session_start();
	$uname=$_GET['uname'] ;
	
	$query="select * from users where username = $uname ";
	$result = $conn->query($query);
	if($result)
	{
			while($queryRow=$result->fetch_assoc())
			{
				$username=$queryRow['username'];	
                $email=$queryRow['email'];
				$designation=$queryRow['designation'];
				$privileges=$queryRow['privileges'];
				$userPrivileges=explode(',',$privileges);
                                
			}			
	}
	?>
<script>
//    $(document).ready(function(){
//	var checkboxes = document.getElementsByTagName('input');
//for (var i=0; i<checkboxes.length; i++)  {
//  if (checkboxes[i].type == 'checkbox')   {
//    checkboxes[i].checked = false;
//  }
//}
////$('#myCheckbox').attr('checked', false);
//});
    </script>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="style.css" />
<link rel="stylesheet" type="text/css" href="logoutbutton.css" />
	<?php 
        require 'formcss.php';?>
<title>Update User</title>
</head>
<body>
    <div id="page">	
	<br>
	<br><br>

		<div id="main">
			<?php
require 'mainMenu.php';
?>	
           	<div class="main_body">
				
								<section>				
					<div id="container_demo" >
						<a class="hiddenanchor" id="toregister"></a>
						<a class="hiddenanchor" id="tologin"></a>
						<div id="wrapper">
							<div id="login" class="animate form">
								<form  action="edit_user.php" autocomplete="on" method="post" enctype="multipart/form-data"> 
									<h1>Update User</h1> 
									<p> 
										<label for="username" class="uname" data-icon="u" > Username </label>
										<input id="username" name="username" required="required" type="text" placeholder="eg. Khan" value="<?php echo $username; ?>" readonly/>
									</p>
                                                                        
									<p> 
										<label for="email" class="email" data-icon="e"> Email </label>
										<input id="email" name="email" required="required" type="email" placeholder="eg. abc@abc.com" value=<?php echo $email; ?> /> 
									</p>
									<p> 
										<label for="name" class="name" data-icon="u"> Designation </label>
										<input id="designation" name="designation" required="required" type="text" placeholder="eg. Professor" value="<?php echo $designation; ?>" /> 
									</p>
									
									<br><br>
									<label  for="name" class="name">Privileges</label><br>
									<br>
									<p style="padding:10px"> 
                                                                       
									<?php 
                                        if($userPrivileges[0]==0 )
                                        {  
											echo '<input  type="checkbox" name="privileges[]" value="demand" > &nbsp;  Demand Items <br>';
                                        }
                                        else
                                        {
                                            echo '<input  type="checkbox" name="privileges[]" value="demand" checked> &nbsp  Demand Items <br>'; 
                                        }

										if($userPrivileges[1]==0 )
                                        {  
											echo '<input  type="checkbox" name="privileges[]" value="history" > &nbsp;  History <br>';
                                        }
                                        else
                                        {
                                            echo '<input  type="checkbox" name="privileges[]" value="history" checked> &nbsp;  History <br>'; 
                                        } 

										if($userPrivileges[2]==0 )
                                        {  
											echo '<input  type="checkbox" name="privileges[]" value="user" > &nbsp;  User Management <br>';
                                        }
                                        else
                                        {
                                            echo '<input  type="checkbox" name="privileges[]" value="user" checked> &nbsp;  User Management <br>'; 
                                        } 

										if($userPrivileges[3]==0 )
                                        {  
											echo '<input  type="checkbox" name="privileges[]" value="item" > &nbsp;  Item Management <br>';
                                        }
                                        else
                                        {
                                            echo '<input  type="checkbox" name="privileges[]" value="item" checked> &nbsp;  Item Management <br>'; 
                                        } 

										if($userPrivileges[4]==0 )
                                        {  
											echo '<input  type="checkbox" name="privileges[]" value="approve" > &nbsp;  Demands Approval <br>';
                                        }
                                        else
                                        {
                                            echo '<input  type="checkbox" name="privileges[]" value="approve" checked> &nbsp;  Demands Approval <br>'; 
                                        } 

										if($userPrivileges[5]==0 )
                                        {  
											echo '<input  type="checkbox" name="privileges[]" value="vendors" > &nbsp;  Vendors <br>';
                                        }
                                        else
                                        {
                                            echo '<input  type="checkbox" name="privileges[]" value="vendors" checked> &nbsp;  Vendors <br>'; 
                                        } 

										if($userPrivileges[6]==0 )
                                        {  
											echo '<input  type="checkbox" name="privileges[]" value="billing" > &nbsp;  Billing <br>';
                                        }
                                        else
                                        {
                                            echo '<input  type="checkbox" name="privileges[]" value="billing" checked> &nbsp;  Billing <br>'; 
                                        } 

										if($userPrivileges[7]==0 )
                                        {  
											echo '<input  type="checkbox" name="privileges[]" value="clearance" > &nbsp;  Clearance <br>';
                                        }
                                        else
                                        {
                                            echo '<input  type="checkbox" name="privileges[]" value="clearance" checked> &nbsp;  Clearance <br>'; 
                                        } 										
                                                                        
                                    ?>
									</p>
									
									<br>
									<input type="file" name="profile" id="profile">
									<p class="login button"> 
										<input type="submit" name="update" value="Update" /> 
									</p>
								</form>
							</div>

							
						</div>
					</div>  
				</section>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
			
			</div>

           	<div class="main_bottom"></div>

        </div>



        <div id="footer">
       
        </div>

        </div>
</body>
</html>
