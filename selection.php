<?php
echo "<!DOCTYPE html5>";
	session_start();
	include "connection.php";
	
	if(isset($_GET['msg1']))
	{
		echo $_GET['msg1'];
		echo "<br>Welcome " .$_GET['uname'] ."<br><br>";
	}
	else
	{
		echo "
			our india green India 
		";
	}
	
	echo "
	<center>
		<form method='get' action='ewallet.php'>
		<input type='submit' value='E-Wallet'>
		</form>
		&nbsp;
		&nbsp;
		&nbsp;
		&nbsp;
		&nbsp;
		<form method='get' action='abcd/dw.php'>
		<input type='submit' value='Digital Wallet'>
		</form>
		</center>
		
	";
	
?>