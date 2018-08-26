<html>
<head></head>
<body>
	<table border="1" align="center">
	<form method='post'>
	<tr><td colspan="2" align="center" style="color:#00b200"> 
	<?php 
	if(isset($_GET['msg']))
		echo $_GET['msg'];
	elseif(isset($_GET['msg1']))
		echo $_GET['msg1'];	
	else
		echo "Our India, Clean India!!!"
		?> 
	</td>	</tr>
	<tr><td>Username:</td><td colspan='2'><input type='text' name='uname'/></td>	</tr>
	<tr><td>Password:</td><td colspan='2'><input type='password' name='pwd'/>	</tr>
	<tr><td colspan='2' align='center'><input type='submit'/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='reset'/></td>	</tr>
	</form>
	</table>
	
	<?php
	session_start();
	if(isset($_POST['uname']) && isset($_POST['pwd']))
	{
		$u=$_POST['uname'];
		$p=$_POST['pwd'];
		if(($u=="aam" && $p=="aam"))
		{
			$_SESSION['uname']=$u;
			header("location:home.php");	
			
		}
		else
		{
		header("location:index.php?msg=INVALID LOGIN DETAIL");	
		}
		
		
	}
	?>
</html>
</body>