<?php
session_start();
session_destroy();

		if(isset($_COOKIE['siteAuth']['username'])  && isset($_COOKIE['siteAuth']['privileges']) )
				{
					$cookie_time = (3600 * 24 * 30); 
					setcookie("siteAuth[username]", $username, time() - $cookie_time); 
					setcookie("siteAuth[privileges]", $privileges ,time() - $cookie_time);
				}
header("Location:index.php");
exit; 
?>