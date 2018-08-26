<?php

session_start();
include "connection.php";
if(isset($_SESSION['uname']))
{
	echo "
	<html>
	<body>
	<form action='details.php' method='POST'>";
	{

	echo "Select your bank:&nbsp&nbsp&nbsp";
	$con=mysqli_connect("localhost","root","","digital_wallet");
	$sql=mysqli_query($con,'SELECT bank FROM banks');
	if(mysqli_num_rows($sql)){
		
	echo "<select name='banks'>";
	while($rs=mysqli_fetch_array($sql)){
		  echo "<option value=".$rs['bank'].">".$rs['bank']."</option>";
	  }
	}
	echo "</select>";

	mysqli_close($con);

	echo "<br>
	To add new bank click here:&nbsp<a href='bankaccounts.php'>NEW ACCOUNT</a><br>";

	if(isset($_GET['msg']))
	{
		echo "".$GET_['msg'];
	}

	echo "
	Select Date:&nbsp&nbsp&nbsp&nbsp<input type='date' name='ddate'>

	<br><br>
	Choose any one option:<select name='transact'>
	<option value='Debit'>Debit</option>
	<option value='Credit'>Credit</option>
	</select>

	<br>
	Amount:<input type='number' name='amount'>
	<br>
	Remarks:<input type='text' name='remarks'>
	<br>
	<input type='Submit' value='Submit' name='Submit1'>
	";

	echo "</form></body></html>";
	}
}
else
{
	header("location:C:\wamp64\www\project\abcd\index.php?msg=please login first");
}

?>
