<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="style.css" />
<link rel="stylesheet" type="text/css" href="logoutbutton.css" />
	<?php require 'formcss.php';?>

<title>View All Items</title>
</head>
<body>
<script>
function myFunction() {
    alert("item updated successfully!");
}
function itemUpdateError() {
    alert("oops!there was a problem updating the item...please try again");
}
</script>
<?php
if(isset($_SESSION["updateItemSuccess"]) && $_SESSION["updateItemSuccess"]==true)
{
	echo '<script type="text/javascript">',		'myFunction();',
						'</script>';						
}
if(isset($_SESSION["updateItemSuccess"]) && $_SESSION["updateItemSuccess"]==false)
{
	echo '<script type="text/javascript">',		'itemUpdateError();',
						'</script>';						
}
?>
    <div id="page">	
	<br>
	<br><br><br>
<?php
if(isset($_SESSION["updateItemSuccess"]))
			{
				unset($_SESSION["updateItemSuccess"]);
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
							<div id="userView" class="animate form">
							 
									<h1>ALL ITEMS</h1>
									<div>
									<?php
									$query="select * from items ";
												$result = $conn->query($query);

									if($result->num_rows > 0)
									{
										
									?>
									<table style="border: 3px solid black; padding:10px; " >
										<tr style="border: 2px solid black;">
										<th style="border: 1px solid black;  padding:10px;text-align: center;"><b>Id</b> </th>
										<th style="border: 1px solid black;  padding:10px;text-align: center;"><b>NAME</b> </th>
										<th style="border: 1px solid black;  padding:10px;text-align: center;"><b>TYPE</b> </th>
										<th style="border: 1px solid black;  padding:10px;text-align: center;"><b>MARKET PRICE</b> </th>
                                                                                <th style="border: 1px solid black;  padding:10px;text-align: center;"><b>STOCK IN STORE</b> </th>
										</tr>
											<?php
											$i=1;
												while($row = $result->fetch_assoc())
												{
													$id=$row['id'];
													
													$name=$row['name'];
													$type=$row['type'];
													$marketPrice=$row['marketPrice'];
                                                                                                        $stock=$row['stock'];
													
													
											?>
											<tr style="border: 1px solid black;  padding:8px;text-align: center;">
											<td style="border: 1px solid black;  padding:8px;text-align: center;"> <?php echo $id ;?></td>
											<td style="border: 1px solid black;  padding:8px;text-align: center;"><?php echo $name;?></td>
											<td style="border: 1px solid black;  padding:8px;text-align: center;"><?php echo $type;?></td>
											<td style="border: 1px solid black;  padding:8px;text-align: center;"><?php echo "Rs:$marketPrice";?>&nbsp;</td>
                                                                                        <td style="border: 1px solid black;  padding:8px;text-align: center;"><?php echo $stock;?></td>
											<td style="border: 1px solid black;  padding:8px;text-align: center;"><a href='editItem.php?id="<?php echo $id;?>"'  id="<?php echo $id ;?>"> Edit</a></td>
											
											<td style="border: 1px solid black;  padding:10px;text-align: center;"><a href='delete_item.php?id="<?php echo $id;?>"'  id="<?php echo $id ;?>"> Delete</a> </td> </tr>
											<?php
											
													
													$i++;
												
											}
										}
														
										
										?>
										
									</table>
												
										<br>
<br><br><br>										
									
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
