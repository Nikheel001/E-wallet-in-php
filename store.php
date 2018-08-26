<?php
	session_start();
	include "connection.php";
/*	$dbhost = '127.0.0.1:3306';
	$dbuser = 'root';
	$dbpass = 'root';
		
	$conn = mysqli_connect($dbhost, $dbuser, $dbpass,'digital_wallet');
	if(! $conn )
	{
		die('Could not connect: ' . mysql_error());
	}
	echo 'Connected successfully<br />';
	
if(!isset($_COOKIE['database']))
{
	$sql="CREATE DATABASE digital_wallet";
	$query=mysql_query($sql,$conn);
	if(! $query )
	{
		die('Could not create database: ' . mysql_error());
	}
	echo "Database created successfuly";
	setcookie('database','databasecreated',time()+31622400);
		
	mysql_select_db('digital_wallet',$conn);
}*/
$tableExists = $dbhandler->query("SHOW TABLES LIKE 'user_data'");
if(!$tableExists->rowCount() > 0)
{			
		$sql="create table user_data (
		id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
       	username VARCHAR(30) NOT NULL,
     	password VARCHAR(20) NOT NULL,
		gender VARCHAR(10),
       	birthdate DATE,
       	mailid VARCHAR(100),
       	mobileno VARCHAR(20),
		address VARCHAR(50),
		country VARCHAR(50),
		security VARCHAR(50),
		answer VARCHAR(50)
		)";

		$query=$dbhandler->query($sql);
		echo "Table is created successfully..<br><br>";
		setcookie('table','hello',time()+31622400);
		$count=0;
		$_SESSION['count']=$count;
}
	
//	$count=$_SESSION['count'];
	
	$uname=$_POST['uname'];														//username
	$pwd=$_POST['pwd'];															//password	 
	$date = date('Y-m-d', strtotime($_POST['date']));							//date
	$gender=$_POST['gender'];
	$mailid=$_POST['mail'];
	$mobileno=$_POST['mobile'];
	$address=$_POST['address'];
	$country=$_POST['country'];
	$answer=$_POST['answer'];
	$temp=$_POST['security'];
	
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
		
		$sql="INSERT INTO user_data (username,password,gender,birthdate,mailid,mobileno,address,country,security,answer) VALUES ('$uname','$pwd','$gender','$date','$mailid','$mobileno','$address','$country','$security','$answer')";
		$query=$dbhandler->query($sql);
		
	//	$_SESSION['count'] = $count + 1;
		
		echo "<br><br>Data is inserted successfully <br><br>";
		header("location:index.php?msg=Please login again ...");
		
/*		echo "Entered detail are as followed <br><br>";
		
		$query=$dbhandler->query("select * from student WHERE id=".$_SESSION['count']."");
		while($r=$query->fetch()){
						
			echo "
				<table border='2'>
					<tr>
						<td>ID :</td>
						<td>" .$r['id'] ."</td>
					</tr>
					<tr>
						<td>Username :</td>
						<td>" .$r['username'] ."</td>
					</tr>
					<tr>
						<td>Gender :</td>
						<td>" .$r['gender'] ."</td>
					</tr>
					<tr>
						<td>Date of Birth[yyyy-dd-mm]</td>
						<td>".$r['birthdate'] ."</td>
					</tr>
					<tr>
						<td>Training : </td>
						<td>" .$r['training'] ."</td>
					</tr>
					<tr>
						<td>Placement : </td>
						<td>" .$r['placement'] ."</td>
					</tr>
					<tr>
						<td>Achievement : </td>
						<td>" .$r['achievement'] ."</td>
					</tr>
					<tr>
						<td><a href='delete.php'>Delete</a></td>
					</tr>
				</table>
			<br><br>
			";
			
			
		}
		*/
	}
	catch(PDOException $e)
	{
		echo $e->getMessage();
		die();
	}

?>