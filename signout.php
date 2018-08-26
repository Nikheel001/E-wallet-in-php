<html>
<head></head>
<body>
	<?php
	session_start();
	if(isset($_SESSION['uname']))
	{
		unset($_SESSION['uname']);
		header("location:./../index.php?msg=You have sucessfully Loggedout");
	}
	else
	{
		header("location:C:\wamp64\www\project\index.php?msg=Please Login First");
	}	
	?>
</body>
</html>