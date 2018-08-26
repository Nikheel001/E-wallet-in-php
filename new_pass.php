<?php

session_start();
include "connection.php";

if(isset($_GET['msg']))
{
	echo $_GET['msg'];
}

if(isset($_SESSION['uname']))
{

	echo "

	<body>
	<a href='signout.php'>Sign out</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='dw.php'>Home</a>
	<form action='passwords.php' method='post' >
	Title:<input type='text' name='title'>
	<br><br>
	Created Date:&nbsp&nbsp&nbsp<input type='date' name='pdate'>
	<br><br>
	Enter your Category:&nbsp&nbsp&nbsp<input type='text' name='category'>
	<br><br>
	Username:&nbsp&nbsp&nbsp<input type='text' name='unm'>
	<br><br>
	Password:<input type='password' name='text1'  maxlength='15' pattern='((?=.*\d)(?=.*[A-Z])(?=.*\W).{8,})' required='true'>
	<br><br>
	Confirm Password:<input type='password'  name='text2'  maxlength='15' pattern='((?=.*\d)(?=.*[A-Z])(?=.*\W).{8,})' required='true'>
	<br><br>
	Password Changing Interval:&nbsp&nbsp&nbsp<input type='date' name='pcdate'>
	<br><br>Notify me(in days):&nbsp&nbsp&nbsp<select name='notify'><option value='1'>1</option><option value='2'>2</option><option value='3'>3</option><option value='4'>4</option></select>

	<br><input type='Submit'  value='Submit' name='Submit' >

	</form>	
	<form action='passwords.php'><input type='Submit' value='Back'></form>
		
	</body>
	";
}else
{
	header("location:C:\wamp64\www\project\abcd\index.php?msg=please login first");
}
?>