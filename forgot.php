<?php
	
	include "connection.php";
?>	


		<html>
		<head><title>Forgot Password</title>
		<link rel="stylesheet" type="text/css" href="myStyle.css">
		<body>
		<form action='forgot.php' method='post'>
		<center>
			<table>
			<tr>
				<td>
					
				</td>
			</tr>
			<tr>
				<td>
					Username:
				</td>
				<td>
					<input type='text' name='username'>
				</td>
			</tr>
			
<?php	
	if(isset($_GET['status']))
	{
		echo $_GET['status'];
	}
	if(!isset($_POST['submit']))
	{
				echo "
				<tr>
				<td>Select security option :</td>
				<td>
					<select name='security'>
						<option value='1'>Who is your favorite HERO ?</option>
						<option value='2'>Which is your favorite book ?</option>
						<option value='3'>What is your nick name ?</option>
						<option value='4'>What is your favorite past time ?</option>
						<option value='5'>What is the name your first school ?</option	>
					</select>
					</td>
				</tr>
				<tr>
					<td>Answer :</td>
					<td>
						<input type='text' name='answer'>
					</td>
				</tr>";
				
	}
	else
	{
		if(isset($_POST['pwd']))
		{
			$pwd=$_POST['pwd'];
			$rpwd=$_POST['rpwd'];
			$username=$_POST['username'];
			
			if( $pwd == $rpwd)
			{
				$query=$dbhandler->query("UPDATE user_data SET password='$pwd' WHERE username='$username'");
				header("location:index.php?msg=Password reset successfuly...");
				die();
			}
			else
			{
				echo "Reenter password ..";
				
			}
		}
		$temp=$_POST['security'];
		$answer=$_POST['answer'];
		$username=$_POST['username'];
		
		if($temp == 1)
			$security="hero";
		if($temp == 2)
			$security="book";
		if($temp == 3)
			$security="name";
		if($temp == 4)
			$security="pasttime";
		if($temp == 5)
			$security="firstschool";
		
		try
		{
			$query=$dbhandler->query("SELECT * FROM user_data WHERE username='$username'");
			echo "data fetched";
			$r=$query->fetch();
			
			if($security == $r['security'] && $answer == $r['answer'])
			{
				echo "
				
					<tr><td>Enter your New Password :</td><td><input type='password' name='pwd'></td></tr>
					<tr><td>Re-Enter your New Password :</td><td><input type='password' name='rpwd'></td></tr>
				";
			}
			else
			{
				header("location:forgot.php?status=You have selected wrong security question or answer");
			}
		}
		catch (PDOException $e)
		{
			echo $e->getMessage();
			die();
		}
	}
?>
	
	<tr>
		<td><input type='submit' name='submit' value='Submit'></td>
		<td><input type='reset' value='Reset'></td>
	</tr>
	</table>
	
	<a href='forgot1.php'>I don't know my security question</a>
	
	</center>
	</form>
	</body>
	</html>
