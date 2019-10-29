
	<?php
	session_start();
	require 'connectToDatabase.php';	
	if(isset($_POST['username']) && isset($_POST['password']) )
	{
		$username=$_POST['username'];
		$password=$_POST['password'];
		if(!empty($username) && !empty($password))
		{
			$query="select username,password,designation,privileges from users where username='$username'  and password='$password'  ";
			$result = $conn->query($query);
				
			if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		$uname=$row["username"];
		$pwd=$row["password"];
		$designation=$row["designation"];
		$privileges=$row["privileges"];
		if($uname==$username && $pwd==$password)
								{
									$_SESSION["username"]=$username;
									$_SESSION["designation"]=$designation;
									$_SESSION["privileges"]=$privileges;
									
									if(isset($_POST['loginkeeping']))
									{

									$cookie_name = 'siteAuth';
									$cookie_time = (3600 * 24 * 30); // 30 days
									$password_hash = md5($password);
									
									setcookie("siteAuth[username]", $username, time() + $cookie_time); 
									setcookie("siteAuth[privileges]", $privileges ,time() + $cookie_time);

                                                                        }
									
									header("Location:demand.php");
								}
    }
} else {
   $_SESSION["wrongUsernameOrPwd"]=true;
   header("Location:index.php");
}	
		}
	}
	?>	
