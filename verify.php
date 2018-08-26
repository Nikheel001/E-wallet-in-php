<?php
	
	session_start();
	include "connection.php";
	$uname=$_POST['username'];
	$pwd=$_POST['pwd'];
	
	if(!isset($_COOKIE['table']))
	{
		
		$sql="create table data (
		id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
       	username VARCHAR(30) NOT NULL,
     	password VARCHAR(20) NOT NULL,
       	gender ENUM('male','female'),
       	birthdate DATE,
       	training VARCHAR(20),
       	placement VARCHAR(20),
		achievement VARCHAR(50)
		)";

		$query=$dbhandler->query($sql);
		echo "Table is created successfully..<br><br>";
		setcookie('table','hello',time()+31622400);
		$count=0;
		$_SESSION['count']=$count;
	}

	try
	{
		$query=$dbhandler->query("select username,password from user_data where username='$uname' AND password='$pwd'");
		$affectedRow=$query->rowcount();
		echo $affectedRow ;
		if($affectedRow == 0)
			header("location:index.php?msg=Username or Password is Incorrect");
		else
		{
			$_SESSION['uname']=$uname;
			header("location:abcd/dw.php?msg1=Welcome to E-Wallet&&uname='$uname'");
		}
	}
	catch(PDOException $e)
	{
		header("location:index.php?msg=Username or Password is Incorrect");
		$e->getMessage();
	}
	
	
	

?>