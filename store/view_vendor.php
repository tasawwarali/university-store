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
<title>View All Vendors</title>
</head>
<body>
    <script>
function myFunction() 
{
    alert("Vendor updated successfully!");
}
function VendorUpdateError() 
{
    alert("oops!there was a problem updating the Vendor...please try again");
}
</script>
<?php
if(isset($_SESSION["VendorUpdateSuccess"]) && $_SESSION["VendorUpdateSuccess"]==true)
{
	echo '<script type="text/javascript">',		'myFunction();',
						'</script>';						
}
if(isset($_SESSION["VendorUpdateSuccess"]) && $_SESSION["VendorUpdateSuccess"]==false)
{
	echo '<script type="text/javascript">',		'VendorUpdateError();',
						'</script>';						
}
?>
    <div id="page">	
	<br>
	<br><br><br>
	<?php
        if(isset($_SESSION["VendorUpdateSuccess"]))
			{
				unset($_SESSION["VendorUpdateSuccess"]);
			}
	
	require 'connectToDatabase.php';
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
							 
									<h1>ALL VENDORS</h1>
									<div >
									<?php
									$query="select * from vendors ";
									$result = $conn->query($query);

									if($result->num_rows > 0)
									{
										
										
									?>
                                                                            <table   style="border: 3px solid black;   padding:10px; width:80%; margin-right:500px" align="center" width="150">
										<tr style="border: 2px solid black;">
										<th style="border: 1px solid black;  padding:10px;text-align: center;">
										<b>ID</b> </th>
										<th style="border: 1px solid black;  padding:10px; text-align: center;"><b>Vendor Name</b> </th>
                                                                                <th style="border: 1px solid black;  padding:10px; text-align: center;"><b>Email</b> </th>
										<th style="border: 1px solid black;  padding:10px;text-align: center;"><b>Company Name</b></th>
										<th style="border: 1px solid black;  padding:10px; text-align: center;"> <b>phone number</b> </th>
										<th style="border: 1px solid black;  padding:10px;text-align: center;"><b>Product they Sell</b>  </th>
										<th style="border: 1px solid black;  padding:10px;text-align: center;"> <b>Edit Vendor<b>  </th>
										<th style="border: 1px solid black;  padding:10px;text-align: center;"><b>Delete Vendor</b>  </th>

										</tr>
											<?php
											
												while($row = $result->fetch_assoc())
												{
													$id=$row['id'];													
													$name=$row['name'];
                                                                                                        $email=$row['email'];
													$companyName=$row['companyName'];
													$phoneNumber=$row['phoneNumber'];
                                                                                                        $product=$row['productTheySell'];
											?>
											<tr>
											
											<td style="border: 1px solid black;  padding:10px; text-align: center;">
											<?php 
											echo $id;
											?>
											</td>
											<td style="border: 1px solid black;  padding:10px; text-align: center;"><?php echo $name;?></td>
                                                                                        <td style="border: 1px solid black;  padding:10px; text-align: center;"><?php echo $email;?></td>
                                                                                     
											<td style="border: 1px solid black;  padding:10px; text-align: center;"><?php echo $companyName;?></td>
											<td style="border: 1px solid black;  padding:10px; text-align: center;"><?php echo $phoneNumber;?></td>
											<td style="border: 1px solid black;  padding:10px; text-align: center;"><?php echo $product;?></td> 
											<td style="border: 1px solid black;  padding:10px; text-align: center;"><a href='editVendor.php?name="<?php echo $name;?>"'  id="<?php echo $name;?>"> Edit</a> </td>
											
											
											<td style="border: 1px solid black;  padding:10px; text-align: center;"><a href='delete_vendor.php?name="<?php echo $name;?>"'  id="<?php echo $name;?>"> Delete</a> </td> </tr>
											<?php
											
													
													
												
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
