<?php
	session_start();
	include "./../connection.php";
	
	if((isset($_SESSION['uname'])) && (isset($_POST['bank_nm'])) && (isset($_POST['acno'])))
	{
		
	$unm = $_SESSION['uname'];
	$acno = $_POST['acno'];
	
$tableExists = $dbhandler->query("SHOW TABLES LIKE 'acc_detail' ");
if(!$tableExists->rowCount() > 0)
{			
		$sql="create table acc_detail (
		unm VARCHAR(50),
		acno INT(15),
		bank_nm VARCHAR(50),
		money INT(15)
		)";

		$query=$dbhandler->query($sql);
		echo "Table is created successfully..<br><br>";
		setcookie('table2','hello2',time()+31622400);
		
		echo $acno;
}
	
	$temp = $_POST['bank_nm'];
	
	if($temp == "sbi")
		$bank_nm ="SBI";
	if($temp == "axis")
		$bank_nm ="AXIS";
	if($temp == "icici")
		$bank_nm ="ICICI";
	if($temp == "hdfc")
		$bank_nm ="HDFC";
	
	try
	{		
		$query=$dbhandler->query("select  acno,bank_nm from acc_detail where acno = '$acno' AND bank_nm='$bank_nm'");
		$affectedRow=$query->rowcount();
		echo $affectedRow ;
		if($affectedRow == 0)
		{
			// new account...
			$sql="INSERT INTO acc_detail (unm,acno,bank_nm,money) VALUES ('$unm','$acno','$bank_nm','500')";
			$query=$dbhandler->query($sql);
		}
		else
		{
			$query=$dbhandler->query("select unm,acno,bank_nm from acc_detail where unm='$unm' AND acno = '$acno' AND bank_nm='$bank_nm'");
			$affectedRow=$query->rowcount();
			if($affectedRow == 0)
			{
				header("location:ewallet.php?msg=Can not create Account it is in use by another user");
				die();
			}
		}
		
		$_SESSION['acno'] = $acno;
		$_SESSION['bank_nm'] = $bank_nm;
		
		header("location:operate.php");
	}
	catch(PDOException $e)
	{
		echo $e->getMessage();
		die();
	}
}
else
{
	header("location:C:\wamp64\www\project\index.php?msg=Please login first");
}
?>