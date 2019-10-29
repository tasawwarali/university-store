	<?php
	require 'connectToDatabase.php';
	session_start();
	$iditem=$_GET['id'] ;
	//$_SESSION['item']=$iditem;
	$query="select * from items where id = $iditem ";
	if($queryRun=$conn->query($query))
	{		
			while($queryRow=$queryRun->fetch_assoc())
			{
				$id=$queryRow['id'];		
				$name=$queryRow['name'];
				$type=$queryRow['type'];
				$marketPrice=$queryRow['marketPrice'];
				$stock=$queryRow['stock'];	
			}		
	}
	?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="style.css" />
<link rel="stylesheet" type="text/css" href="logoutbutton.css" />
	<?php require 'formcss.php';?>
<title>Update Item</title>
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
								<form  action="edit_Item.php" autocomplete="on" method="post" enctype="multipart/form-data"> 
									<h1>Update ITEM</h1> 
                                                                        
									<p> 
										<label for="name" class="name" data-icon="p"> Name </label>
										<input id="name" name="name" required="required" type="text" placeholder="eg. umair" value="<?php echo $name; ?>" /> 
									</p>
                                                                        
                                                                        <p>
                                                                                <label  for="price" class="price" > Price </label><br>
                                                                                    <input id="price" name="price" required="required" min="1" max="90000000" type="number" placeholder="eg.200" value="<?php echo $marketPrice; ?>" />
                                                                        </p>
                                                                        
                                                                        <p>
                                                                                <label  for="stock" class="stock" > Stock in store </label><br>
                                                                                <input id="stock" name="stock" required="required" min="0" max="100000" type="number" placeholder="eg.120" value="<?php echo $stock; ?>" />
                                                                        </p>

                                                                        <input type="hidden" name="id" value=<?php echo $iditem; ?>  />  
                                                                        
									<p> 
										<label for="type" class="type" > Type </label>
										
										<select autofocus name="type" >
										
										<?php
										
										if($type=="consumable")
										{
											echo '<option value=consumable >Consumable</option>
											<option value=non-consumable >Non-Consumable</option>';
										}
										else
										{
											echo'<option value=non-consumable >Non-Consumable</option>
											<option value=consumable >Consumable</option>';
										}
											
											?>
										</select>
									</p>
									
                                                                                                                                                
									<input type="file" name="profile" id="profile">
									<p class="login button"> 
										<input type="submit" name="update" value="Update" /> 
									</p>
								</form>
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
