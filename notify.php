<?php

session_start();
	if(isset($_SESSION['uname']))
	{
		$nm = $_SESSION['uname'];
		echo "<table border=\"1\"><tr><td colspan='2'><a href='home.php'>Home</a><a href='signout.php'>&nbsp;&nbsp;&nbsp;&nbsp;Signout</a></td></tr><tr><td colspan='2'><h3>Welcome <i><u> $nm </i></u></h3></td></tr>";
		$today = date('m-d');
		$month = date('m');
		$flag=1;
		$flag1=1;
		foreach ($_COOKIE as $id=>$str)
			{
			$bdate=$str;
			$s = substr($bdate,0,2);
			$s1 = substr($bdate,3,2);	
			if($s == $month)
				{
				if($flag==1)
					{$flag=0;echo "<tr><td colspan='2'><h4>This month's list of birthdays</h4></td></tr>";}
				else{}
				echo "<tr><td colspan='2'>" . $id . "'s birthday is on - " . $s1 . "</td></tr>";
				setcookie($id,$str,time()+31622400);
				}
			if($s == ($month+1))
				{
				if($flag1==1)
					{$flag1=0; echo "<tr><td colspan='2'><h4>Next month's list of birthdays</h4></td></tr>";}
				else {}
				echo "<tr><td colspan='2'>" . $id . "'s birthday is on - " . $s1 . "</td></tr>";
				}
			else
				{}
			}
		echo "</table>";
	}
	else
	{
		header("location:index.php?msg=Please Login to View Your Home Screen!");
		echo "Invalid Reference to that page";
	}	
?>