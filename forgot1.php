<?php
	session_start();
	if(isset($_GET['msg']))
	{
		echo "<center>".$_GET['msg']."</center>";
	}
	if(!isset($_POST['submit1']))
	{
		echo "
		<form action='forgot1.php' method='post'>
			<center>Enter your mail address : <input type='text' name='mailid'>
			<br><input type='submit' name='submit1' value='submit'></center>
		</form>
		";
	}
	else
	{
		$mailid=$_POST['mailid'];
		$_SESSION['mailid']=$mailid;
		
		include "connection.php";
		
		$query=$dbhandler->query("select username,password from user_data where mailid='$mailid'");
		$affectedRow=$query->rowcount();
		echo $affectedRow ;
		if($affectedRow == 0)
			header("location:index.php?msg=User does not exist with this mailid");
		else	
		{	
			$otp = rand(100000,999999);
			$_SESSION['otp']=$otp;
			
			$to = $_POST['mailid'];
			$subject = "Reset your Password.....";
			$message = "Your One Time Password is :" .$otp;
			$header = "From:E-Wallet : Reset Password :\r\n";

			$retval = mail ($to,$subject,$message);
			
			if( $retval == true )
			{
				echo "Message sent successfully...";
				
				echo "
				<form action='reset.php' method='post'>
				<center>Enter OTP : <input type='text' name='otp'>
				<input type='submit' name='submit2' value='submit'>
				</center>
				</form>
				";
			
			}
			else
			{
				echo "Message could not be sent...";
			}
		}	
	}
?>