<?php

	session_start();
	include "connection.php";
	
	$otp=$_SESSION['otp'];
	if(isset($_GET['msg']))
	{
		echo "<center>".$_GET['msg']."</center>";
	}
	
	if($_POST['otp']==$otp)
	{
		echo "
		<form action='resetpassword.php' method='post'>
			<center>
			New Password :<input type='password' name='pass'><br>
			Re-Enter New Password :<input type='password' name='rpass'><br>
			<input type='submit' value='Reset Password'><br>
			</center>
		</form>
		";
	}
	else
	{
		header("location:forgot1.php?msg=You have entered wrong otp");
	}
	
	

?>