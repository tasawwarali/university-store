<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="style.css" />
<link rel="stylesheet" type="text/css" href="logoutbutton.css" />
				<?php
                                session_start();
                                require 'formcss.php';
                                ?>
<title>View All Users</title>
</head>
<body>
    <script>
function myFunction() 
{
    alert("user updated successfully!");
}
function userUpdateError() 
{
    alert("oops!there was a problem updating the user...please try again");
}
</script>
<?php
if(isset($_SESSION["userUpdateSuccess"]) && $_SESSION["userUpdateSuccess"]==true)
{
	echo '<script type="text/javascript">',		'myFunction();',
						'</script>';						
}
if(isset($_SESSION["userUpdateSuccess"]) && $_SESSION["userUpdateSuccess"]==false)
{
	echo '<script type="text/javascript">',		'userUpdateError();',
						'</script>';						
}
?>
    <div id="page">	
	<br>
	<br><br><br>
	<?php
        if(isset($_SESSION["userUpdateSuccess"]))
			{
				unset($_SESSION["userUpdateSuccess"]);
			}
	
	require 'mainMenu.php';
?>	
		<div id="main">

        	

           	<div class="main_body">
			
								<section>				
					<div id="container_demo" >
						<a class="hiddenanchor" id="toregister"></a>
						<a class="hiddenanchor" id="tologin"></a>
						<div id="wrapper">
							<div id="userView" >
							 
									<h1>ALL USERS</h1>
									<div >
									<?php
										require 'connectToDatabase.php';

									$query="select * from users where username!='{$_SESSION['username']}'";
									$result = $conn->query($query);

									if($result->num_rows > 0)
									{
										
										
									?>
                                                                            <table   style="border: 3px solid black;   padding:10px; width:80%; margin-right:500px" align="center" width="150">
										<tr style="border: 2px solid black;">
										<th style="border: 1px solid black;  padding:10px;text-align: center;">
										<b>Teacher Name</b> </th>
										<th style="border: 1px solid black;  padding:10px; text-align: center;"><b>Designation</b> </th>
                                        <th style="border: 1px solid black;  padding:10px; text-align: center;"><b>Email</b> </th>
										<th title="Demand, History, Users, Items, Approval, Vendors, Billing, Clearance" style="border: 1px solid black;  padding:10px;text-align: center;"><b>Privileges<br>[D,H,U,I,A,V,B,C]</b><br></th>
										<th style="border: 1px solid black;  padding:10px;text-align: center;"> <b>Edit User<b>  </th>
										<th style="border: 1px solid black;  padding:10px;text-align: center;"><b>Delete User</b>  </th>

										</tr>
											<?php
											$i=1;
												while($row = $result->fetch_assoc())
												{
													$uname=$row['username'];													
													$designation=$row['designation'];
                                                    $email=$row['email'];
													$privileges=$row['privileges'];
															
											?>
											<tr>
											
											<td style="border: 1px solid black;  padding:10px; text-align: center;">
											<?php 
											echo $uname;
											?>
											</td>
											<td style="border: 1px solid black;  padding:10px; text-align: center;"><?php echo $designation;?></td>
                                            <td style="border: 1px solid black;  padding:10px; text-align: center;"><?php echo $email;?></td>
                                            <td style="border: 1px solid black;  padding:10px; text-align: center;"><?php echo $privileges;?></td>
											<td style="border: 1px solid black;  padding:10px; text-align: center;"><a href='edituser.php?uname="<?php echo $uname;?>"'  id="<?php echo $uname;?>"> Edit</a> </td>
											<td style="border: 1px solid black;  padding:10px; text-align: center;"><a href='delete_user.php?uname="<?php echo $uname;?>"'  id="<?php echo $uname;?>"> Delete</a> </td> </tr>
											<?php
											
													
													$i++;
												
											}
										}
														
										
										?>
										
									</table>
												
														
									
									</div> 
									
							</div>

							
						</div>
					</div>  
				</section>

			</div>

           	<div class="main_bottom"></div>

        </div>



        <div id="footer">
       
        </div>

        </div>
</body>
</html>
