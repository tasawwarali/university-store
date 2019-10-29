<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="style.css" />
<link rel="stylesheet" type="text/css" href="logoutbutton.css" />
				<?php require 'formcss.php';?>
<title>View All Users</title>
</head>
<body>
    <div id="page">	
	<br>
	<br><br><br>
	<?php
	session_start();
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
							 
									<h1>ALL BillS</h1>
									<div >
									<?php
									$query="select * from bill ";
									$result = $conn->query($query);

									if($result->num_rows > 0)
									{
										
										
									?>
									<table   style="border: 3px solid black; padding:10px; width:80%">
										<tr style="border: 2px solid black;">
											<th style="border: 1px solid black;  padding:10px; text-align: center;"><b>ItemName</b> </th>
										<th style="border: 1px solid black;  padding:10px;text-align: center;"><b>Quantity</b></th>
										<th style="border: 1px solid black;  padding:10px; text-align: center;"> <b>Extra</b> </th>
										<th style="border: 1px solid black;  padding:10px;text-align: center;"><b>Total Bill</b>  </th>
										<th style="border: 1px solid black;  padding:10px;text-align: center;"><b>Date</b>  </th>
										
										

										</tr>
											<?php
											$i=1;
												while($row = $result->fetch_assoc())
												{
													$itemname=$row['itemname'];													
													$quantity=$row['quantity'];
													$extra=$row['extra'];
													$bill=$row['bill'];
													$date=$row['date'];
															
											?>
											<tr>
											
											<td style="border: 1px solid black;  padding:10px; text-align: center;">
											<?php 
											echo $itemname ;
											?>
											</td>
											<td style="border: 1px solid black;  padding:10px; text-align: center;"><?php echo $quantity;?></td>
											<td style="border: 1px solid black;  padding:10px; text-align: center;"><?php echo $extra;?></td>
											<td style="border: 1px solid black;  padding:10px; text-align: center;"><?php echo $bill;?></td>
											<td style="border: 1px solid black;  padding:10px; text-align: center;"><?php echo $date;?></td> 
											
											
											
											
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
