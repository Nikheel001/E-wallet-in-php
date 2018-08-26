<?php	

	session_start();
	include "./../connection.php";
	
	if(isset($_SESSION['uname']))
	{
		echo "<a href='ewallet.php'>Change account</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href='./../signout.php'>Signout</a>";
		
		if(isset($_GET['msg2']))
		{
			echo "<br>".$_GET['msg2']."<br>";
		}
		
		$unm=$_SESSION['uname'];
		$acno=$_SESSION['acno'];
		$bank_nm = $_SESSION['bank_nm'];
	
		echo "<br>Greetings  ".$unm."<br>";
	
		echo "Current balance : ";
		
		try
		{		
			$query=$dbhandler->query("select money from acc_detail where unm='$unm' AND acno='$acno' AND bank_nm='$bank_nm' ");
			$affectedRow=$query->rowcount();
			$data = $query->fetch();
			echo $data[0];
			//print_r($data);
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
			die();
		}

		echo"
		<center>
		<form action = 'update.php' method='POST'>
		Ammount :
		<input type='number' name='val'/> Rs.
		<br>
		<input type='radio' name='op' value='add'/>
		ADD MONEY
		<br>
		<input type='radio' name='op' value='send'/>
		SEND MONEY
		<br>
		<input type='submit' value='Proceed'/>
		</form>
		</center>
		";
	}
	else
	{
		header("location:C:\wamp64\www\project\index.php?msg=Please login first");
	}
?>