<?php

	session_start();
	
	if(isset($_SESSION['uname']))
	{
		$unm=$_SESSION['uname'];
	
	if(isset($_GET['msg']))
	{
		echo $_GET['msg']."<br>";
	}
	if(isset($_SESSION['acno']) || isset($_SESSION['bank_nm']) )
	{
		unset($_SESSION['acno']);
		unset($_SESSION['bank_nm']);
	}
	
	echo "
	<form action='store_acc_detail.php' method='post'>
	Select your bank :
		<select name = 'bank_nm'>
			<option value='sbi'> SBI </option>
			<option value='hdfc'> HDFC </option>
			<option value='axis'> AXIS </option>
			<option value='icici'> ICICI </option>
		</select>
	
	Account no : <input type='text' name='acno'>

	<input type ='submit' value = 'USE'>
	<button formaction='delete_acc.php'>Delete Account </button>
	</form>";
	}
	else
		header("location:C:\wamp64\www\project\index.php?msg=Please login first");
?>