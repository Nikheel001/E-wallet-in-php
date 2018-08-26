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
		echo "
		
		<table border=\"1\"><tr><td colspan='2'>";
		
		echo "
		
	<tr>
		<td>
			<a href='signout.php'>Sign out</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='./../dw.php'>Home</a>
		</td>
	</tr>
			<tr>
				<td><a href='create_event.php'>Create Event</a></td>
			</tr>
			<tr>
				<td>
					<a href='show_event.php'>Show Event</a>
				</td>
			</tr>
			
		";
		
	/*	echo "<tr><td colspan=\"2\"><ol><li><a href=\"set.php\">Set reminder</a><br/><li><a href=\"notify.php\">Show reminders</a></li></li></ol></td></tr>";
		echo "<tr><td colspan='2' align='center' style='color:#00b200'>";
			if(isset($_GET['msg1']))
				echo $_GET['msg1'];
			else
				//echo "One India, Green India!!!";
		echo "</td></tr>";				
	*/	echo "</table>";
		
	}
	else
	{
		header("location:C:\wamp64\www\project\index.php?msg1=Please Login to View Your Home Screen!");
		echo "Invalid Reference to that page";
	}
	?>
</body>
</html>