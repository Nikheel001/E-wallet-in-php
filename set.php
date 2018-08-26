<html>
<head>
	<title> Birthday reminders! </title>
</head>

<body>
	<?php
	session_start();
	if(isset($_SESSION['uname']))
	{
		$nm=$_SESSION['uname'];
		echo "<table border=\"1\"><tr><td colspan='2'><a href='home.php'>Home</a><a href='signout.php'>&nbsp;&nbsp;&nbsp;&nbsp;Signout</a></td></tr><tr><td colspan='2'><h3>Welcome <i><u> $nm </i></u></h3></td></tr>";
		echo "<form action='store.php' method='post'>
				<tr><td><p>Name</p></td><td><input type='text' name='name'/></td></tr>
				<tr><td><p>Birhdate</p></td><td><input type='date' name='date' /></td></tr>
				<tr><td colspan='2'><p><center><input type='submit' value='set reminder'/></center></p></td></tr>
			  </form>";
		echo "</table>";
	}
	else
	{
		header("location:index.php?msg=Please Login to View Your Home Screen!");
		echo "Invalid Reference to that page";
	}
	?>
</body>
</html>