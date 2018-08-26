<?php

session_start();



include "connection.php";

if(isset($_SESSION['uname']))
{
	echo "<body><link rel='stylesheet' type='text/css' href='css2.css'><div class='back2'></div>";
	echo "
	<a href='./../signout.php'>Sign out</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='dw.php'>Home</a>
	<br>To add a new transaction select new";
	echo "<br><form action='banking.php' ><button class='btn-1' type='Submit' value='New'><span>New</span></button></form>";
	echo "<table bgcolor='#00FFFF' border='1' >";

	echo "<tr><td><h1>Your bank account details are:</h1></td></tr>";

	if(isset($_POST['Submit']))
	{
		
		
		$bank_name=$_POST['bank_name'];
		$address=$_POST['address'];
		$accno=$_POST['accno'];
		$name=$_POST['name'];
		$acctype=$_POST['acctype'];
		$balance=$_POST['balance'];
		
		try
		{
			
			$sql="INSERT INTO banks (bank,bank_address,bank_account_no,bank_account_name,bank_account_type,bank_balance) VALUES ('$bank_name','$address','$accno','$name','$acctype','$balance')";
			$query=$dbhandler->query($sql);
			
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
			die();
		}
	}
	$con=mysqli_connect("localhost","root","","digital_wallet");
	$result=mysqli_query($con,'SELECT * FROM banks');
	while($row = mysqli_fetch_array($result))
	{

		echo "<tr><td>Your bank is " .$row['bank']; 
		echo "<br>Your address is " .$row['bank_address'];  
		echo "<br>Your account no is " .$row['bank_account_no'];
		echo "<br>Your account name is " .$row['bank_account_name'];
		echo "<br>Your account type is " .$row['bank_account_type'];
		echo "<br>Your balance is " .$row['bank_balance'];
		echo "</td></tr>";
	}	
	echo "</table>";




	if(isset($_POST['Submit1']))
	{
		$amt=$_POST['amount'];
		$bnk=$_POST['banks'];
		
		$con=mysqli_connect("localhost","root","","digital_wallet");
		
		$result=mysqli_query($con,"SELECT bank_balance FROM banks WHERE bank='$bnk'");
		$row1=mysqli_fetch_array($result);
				
		$temp=$row1['bank_balance'];

		
		
		if(isset($_POST['transact']))
		{
		
			$see=$_POST['transact'];
			if($see=='Debit')
			{

				$amt=$temp-$amt;
				$query=$dbhandler->query("UPDATE banks SET bank_balance='$amt' WHERE bank='$bnk'");
			}
			else
			{
				$amt=$temp+$amt;
				
				$query=$dbhandler->query("UPDATE banks SET bank_balance='$amt' WHERE bank='$bnk'");
			
			}
		}


		

		$banks=$_POST['banks'];
		$ddate=$_POST['ddate'];
		$transact=$_POST['transact'];
		$amount=$_POST['amount'];
		$remarks=$_POST['remarks'];
		
		try
		{
			
			$sql="INSERT INTO transaction (bank,bank_date,transact,bank_amount,bank_remarks) VALUES ('$banks','$ddate','$transact','$amount','$remarks')";
			$query=$dbhandler->query($sql);
			
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
			die();
		}
	}
	echo "<table bgcolor='#00FFFF' border='1'>";
	echo "<tr><td><h1>Your transaction details are:</h1></td></tr>";
	$con=mysqli_connect("localhost","root","","digital_wallet");

	$result=mysqli_query($con,'SELECT * FROM transaction');
	while($row = mysqli_fetch_array($result))
	{
		echo "<tr><td>Your bank is " .$row['bank']; 
		echo "<br>The date is " .$row['bank_date'];
		echo "<br>Your transaction (Debit/Credit) " .$row['transact'];
		echo "<br>The transaction amount was " .$row['bank_amount'];
		echo "<br>The remarks were " .$row['bank_remarks'];
		echo "</td></tr><br><br><br>";
	}	
	echo "</table>";
	echo "</body>";



}
else
{
	header("location:C:\wamp64\www\project\abcd\index.php?msg=please login first");
}




?>