<?php
session_start();
include "connection.php";
if(isset($_SESSION['uname']))
{
	echo "
	<a href='signout.php'>Sign out</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='dw.php'>Home</a>
	To add new password to your list click on New button";
	echo "<br><form action='new_pass.php' method='POST'><input type='Submit' value='New' name='Submit'></form>";
	if(isset($_POST['Submit']))
	{
		$title=$_POST['title'];
		$pdate=$_POST['pdate'];
		$category=$_POST['category'];
		$unm=$_POST['unm'];
		$text1=$_POST['text1'];
		$text2=$_POST['text2'];
		$pcdate=$_POST['pcdate'];
		$notify=$_POST['notify'];
		
		
		
		if($text1!=$text2)
		{
			
			header("location:new_pass.php?msg=Password and Confirm Password does not match!!!!!");
		}
		
		
		try
		{
			
			$sql="INSERT INTO pass (pass_title,pass_pdate,pass_category,pass_unm,pass_pass,pass_pcdate,pass_notify) VALUES ('$title','$pdate','$category','$unm','$text1','$pcdate','$notify')";
			$query=$dbhandler->query($sql);
			
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
			die();
		}
		
	}

	$con=mysqli_connect("localhost","root","","digital_wallet");
	$result=mysqli_query($con,'SELECT * FROM pass ');
	while($row = mysqli_fetch_array($result))
	{
		echo "Your title is " .$row['pass_title']; 
		echo "<br>The date password created was " .$row['pass_pdate'];  
		echo "<br>The category is " .$row['pass_category'];
		echo "<br>Username is " .$row['pass_unm'];
		echo "<br>Password is " .$row['pass_pass'];
		echo "<br>The date to modify password is " .$row['pass_pcdate'];
		echo "<br>To be informed before " .$row['pass_notify'];
		echo "<br><br><br>";
	}	


	$con=mysqli_connect("localhost","root","","digital_wallet");
	$result=mysqli_query($con,'SELECT * FROM pass');
	while($row = mysqli_fetch_array($result))
	{
		$unm=$row['pass_unm'];
		$pcdate=$row['pass_pcdate'];
		$notify=$row['pass_notify'];
		if($notify==1)
		{
			$today = date("Y-m-d H:i:s");
			$pcdate=date( 'Y-m-d', strtotime( $pcdate . ' -1 day' ) );	
			
			 $date = strtotime($today);
			$dat = date('Y-m-d', $date);
			
			
			if($dat==$pcdate )
			{
				echo"Update your password for username  " .$unm;
				$_SESSION['status']="Update your password for username  " .$unm;
			}
		}
		if($notify==2)
		{
			$today = date("Y-m-d H:i:s");
			$pcdate=date( 'Y-m-d', strtotime( $pcdate . ' -2 day' ) );	
			
			 $date = strtotime($today);
			$dat = date('Y-m-d', $date);
			
			
			if($dat==$pcdate )
			{
				echo"Update your password for username  " .$unm;
				$_SESSION['status']="Update your password for username  " .$unm;
			}
		}
		if($notify==3)
		{
			$today = date("Y-m-d H:i:s");
			$pcdate=date( 'Y-m-d', strtotime( $pcdate . ' -3 day' ) );	
			
			 $date = strtotime($today);
			$dat = date('Y-m-d', $date);
			
			
			if($dat==$pcdate )
			{
				echo"Update your password for username  " .$unm;
				$_SESSION['status']="Update your password for username  " .$unm;
			}
		}
	echo "<br><br>";
		
	}
	echo "<br><br>";
	echo "<form action='dw.php'><input type='Submit' value='Back'></form>";

}
else
{
	header("location:C:\wamp64\www\project\abcd\index.php?msg=please login first");
}



?>