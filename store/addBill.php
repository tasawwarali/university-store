<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="style.css" />
<link rel="stylesheet" type="text/css" href="logoutbutton.css" />
	<?php require 'formcss.php';?>
<title>Add Item</title>

</head>
<body>
    <div id="page">	
	<br>
	<br><br><br>
	<?php
	session_start();
require 'mainMenu.php';
?>
<script>
type="text/javascript"
function myFunction() {

    var x = document.createElement("INPUT");
    x.setAttribute("type", "text");
    x.setAttribute("value", "itemName!");
    x.setAttribute("name", "itemname[]");
    document.body.appendChild(x);
    var y = document.createElement("INPUT");
    y.setAttribute("type", "numbers");
    y.setAttribute("value", "Price");
    y.setAttribute("name", "itemprice[]");
    document.body.appendChild(y);
    var z = document.createElement("INPUT");
    z.setAttribute("type", "numbers");
    z.setAttribute("value", "quantity");
    z.setAttribute("name", "itemquantity[]");
    document.body.appendChild(z);
    
}
</script>
	
		<div id="main">

        	
           	<div class="main_body">
			
								<section>				
					<div id="container_demo" >
					<br><br><br><br>
						<a class="hiddenanchor" id="toregister"></a>
						<a class="hiddenanchor" id="tologin"></a>
						<div id="wrapper">
							<div id="login" class="animate form">
								<form  action="add_bill.php" autocomplete="on" method="post" > 
									<h1>Add Bill</h1> 
									<p> 
									<div id="dynamicInput">
										<label for="item" class="uname" data-icon="" > Item Name </label>
										<input id="itemname" name="itemname[]" required="required" type="text" placeholder="eg. Marker"/>
										 
										 </div>
									</p>
									<p> 
										<label for="price" class="youpasswd" data-icon=""> Market Price </label>
                                        <input id="price" name="itemprice[]" required="required" min="1" max="90000000" type="number" placeholder="eg. 250" /> 
									</p>
                                    <p> 
										<label for="stock" class="uname" data-icon=""> quantity </label>
                                        <input id="stock" name="itemquantity[]" required="required" min="0" max="100000" type="number" placeholder="eg. 12" /> 
									</p>
									<p>
									<input type="button" onclick="myFunction()" value="Add More Items" />
									</p>
									<p> 
									
										<label for="date" class="name" >Date </label>
										<input id="date" name="date" required="required"  type="date"  />
									
									
								
								     
										<label for="price" class="youpasswd" data-icon=""> Extra charges</label>
                                        <input id="price" name="extra" required="required" min="1" max="90000000" type="number" placeholder="eg. 250" /> 
									
                                    
                                    
										<label for="Bill" class="youpasswd" data-icon=""> Total Bill </label>
                                        <input id="Bill" name="Bill" required="required" min="1" max="90000000" type="number" placeholder="eg. 25000" /> 
									</p>
                                    
									
									<p class="login button"> 
										<input type="submit" name="submit" value="submit" /> 
									</p>
								</form>
							</div>

							
						</div>
						<br><br><br><br>
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
