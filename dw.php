<?php
session_start();

if(isset($_SESSION['uname']))
{
	echo "

	<html>
	<head>
	<link rel='stylesheet' type='text/css' href='C:\wamp64\www\project\abcd\css1.css'>
	<style type='text/css'>

	table, td
	{
	border-collapse:seperate;
	border-width:5px;
	border-style:ridge;
	overflow-y:auto;


	}
	tr
	{
	background-color:GREY;

	}



	</style>
	</head>
	<div class='background-image'></div>
	<div class='content'>
	<div class='scroll'>
	<body bgcolor='#F0E68C'>

	";
	if(isset($_SESSION['status']))
	{
	$status=$_SESSION['status'];
	echo "<h1>".$status."</h1>" ;
	}
	else
	{


	}
	if(isset($_SESSION['status1']))
	{
	$status1=$_SESSION['status1'];
	echo "<h1>".$status1."</h1>" ;
	}
	echo "
		<a href='signout.php'>Sign out</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<center><h3><table border='1' bgcolor=#C6B5FF ><tr><td><font size='5'>DIGITAL WALLET</font></td></tr></table></center></h3>
	<table bgcolor='#B4B0B0' border='1' align='center' >
	<tr>
		<td><form action='details.php'><img src='bankaccounts.jpg' width='210' height='125'/><br><br>
		<center><button class='btn-5' type='submit' value='BANKING'><span>BANKING</span></center></button>
		</form></td><td><form action='passwords.php'><img src='pass.jpg' width='210' height='125'/><br><br>
		<center><button class='btn-5' type='submit' value='PASSWORDS'><span>PASSWORDS</span></center></button></form>
		</td>
	</tr>
	<tr>
		<td>
			<form action='event2/home.php'>
			<img src='event.jpg' width='210' height='125'/><br><br><center>
			<button class='btn-5' type='submit' value='EVENT'><span>EVENT</span></center></button>
			</form>
		</td>
		<td>
			<form action='expenditures.php'>
			<img src='expenditures.jpg' width='210' height='125'/><br><br><center>
			<button class='btn-5' type='submit' value='EXPENDITURES'><span>EXPENDITURES</span></center></button></form>
		</td>
	</tr>
	<tr>
		<td>
			<form action='backup.php'><img src='backup.jpg' width='210' height='125'/><br><br><center>
			<button class='btn-5' type='submit' value='backup'><span>Backup & Restore File</span></center></button></form>
		</td>
		<td>
			<form action='e-wallet/ewallet.php'><img src='ewallet1.jpg' width='210' height='125'/><br><br><center><button class='btn-5' type='submit' value='backup'><span>E-Wallet</span></center></button></form>
		</td>
	</tr>
	</table>
	</body>	
	</div>
	</div>
	</html>
	";


}
else
{
	header("location:C:\wamp64\www\project\abcd\index.php?msg=please login first");
}


?>