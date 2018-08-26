<?php

include "connection.php";

session_start();

if(isset($_SESSION['uname']))
{
	echo "
	<a href='signout.php'>Sign out</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='dw.php'>Home</a>
	To add expenditures click on new:<br>
	<form action='new_expd' method='POST'><input type='Submit' value='New'>
	";

	if(isset($_POST['Submit']))
	{
		
		
		$expd_date=$_POST['expd_date'];
		$expd_category=$_POST['expd_category'];
		$expd_amount=$_POST['expd_amount'];
		$expd_description=$_POST['expd_description'];
		
		try
		{
			
			$sql="INSERT INTO expd (expd_date,expd_category,expd_amount,expd_description) VALUES ('$expd_date','$expd_category','$expd_amount','$expd_description')";
			$query=$dbhandler->query($sql);
			
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
			die();
		}
	}
	echo "<table bgcolor='#00FFFF' border='1' >";
	echo "<tr><td>Your expenditures details are:</td></tr>";

	$con=mysqli_connect("localhost","root","","digital_wallet");
	$result=mysqli_query($con,'SELECT * FROM expd');
	while($row = mysqli_fetch_array($result))
	{

		echo "<tr><td>Data for your expenditure to " .$row['expd_category']; 
		echo "<br>The date was " .$row['expd_date'];  
		echo "<br>The total amount spent was " .$row['expd_amount'];
		echo "<br>The description of expenditure is  " .$row['expd_description'];
		echo "</td></tr>";
	}	
	echo "</table>";

}
else
{
	header("location:C:\wamp64\www\project\abcd\index.php?msg=please login first");
}
?>	