<?php

	session_start();
	include "connection.php";
	
	if(isset($_GET['msg1']))
	{
		echo $_GET['msg1'];
		echo "<br>Welcome " .$_GET['uname'] ."<br><br>";
	}
	else
	{
		echo "
			our india green India 
		";
	}
	
	echo "
	<center>
	<font color='yellow'>
		<br>
		<select name='selection'>
			<option value='banking'>Banking</option>
			<option value='password'>Password</option>
		</select>
	</center>
		
	";
	
?>