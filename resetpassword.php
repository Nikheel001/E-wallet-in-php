<?php
session_start();
include "connection.php";
	if($_POST['pass']==$_POST['rpass'])
	{
		$mailid=$_SESSION['mailid'];
		$query=$dbhandler->query("UPDATE user_data SET password='$pass' WHERE mailid='$mailid'");
		header("location:index.php?msg=Password Reset Successfully");
	}
	else
		header("location:reset.php?msg=Enter Same Password...");

?>