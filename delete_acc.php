<?php

	session_start();
	include "./../connection.php";
	
	if((isset($_SESSION['uname'])) && (isset($_POST['acno'])) && (isset($_POST['bank_nm'])))
	{
		$unm=$_SESSION['uname'];
		$acno = $_POST['acno'];
		$bank_nm = $_POST['bank_nm'];
	
	if(isset($_GET['msg']))
	{
		echo $_GET['msg']."<br>";
	}
	
	try
	{		
		$query=$dbhandler->query("DELETE FROM acc_detail where unm='$unm' AND acno ='$acno' AND bank_nm='$bank_nm'");
		$affectedRow=$query->rowcount();
		if($affectedRow == 0)
		{
			header("location:ewallet.php?msg=Can not Delete this Account it is in use by another user or does not exist.");
			die();
		}
		else
		{
			header("location:ewallet.php?msg=Done");
			die();
		}
	}
	catch(PDOException $e)
	{
		echo $e->getMessage();
		die();
	}
	
	}
	else
		header("location:C:\wamp64\www\project\index.php?msg=You are not authorized to this content or empty data");
?>