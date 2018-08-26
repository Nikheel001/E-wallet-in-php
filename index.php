<html>
<head>
	<link rel="stylesheet" type="text/css" href="myStyle.css">
</head>
<body>
<form action="verify.php" method="post" >
<center>
<table border="0">
<?php
	if(isset($_GET['msg']))
	{
		echo "<tr><td>";
		echo $_GET['msg'] ;
		echo "</td></tr>";
	}
?>

<tr>
	<td>Username:</td>
	<td>
		<input type="text" name="username"/>
	</td>
</tr>
<tr>
	<td>Password:</td>
	<td>
		<input type="password" name="pwd">
	</td>
</tr>
<tr>
	<td><a href="forgot.php">Forgot Password</a></td>
</tr>
<tr>
	<td>
		<input type="submit" name="Login" value="LogIn"/>
	</td>
	
	<td>
		<input type="reset" name="Reset" value="Reset"/>
	</td>
</tr>
<tr>
	<td>
		<a href="register_you.html">New User</a>
	</td>
</tr>
</table>
</center>
</form>

</body>

</html>