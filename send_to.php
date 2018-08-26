<?php	

	session_start();
	include "./../connection.php";
	
	if(isset($_SESSION['uname']))
	{
		echo "
		<form action='change_data.php' method='post'>
		Enter Acc no:<br>
		<input type='number' name='acno2'/>
		<br> Enter Bank name : <br>
		<input type='text' name='bank_nm2'/>
		<input type='submit' value='proceed'/>
		</form>
		";
	}
	else
	{
		header("location:C:\wamp64\www\project\index.php?msg=Please login first");
	}
?>