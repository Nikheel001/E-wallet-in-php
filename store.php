<?php

	session_start();
	$dbhandler = new PDO('mysql:host=127.0.0.1;dbname=digital_wallet','root','');
		echo "Connection is established...<br/>";
		$dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	if(isset($_SESSION['uname']))
	{
		$uname=$_SESSION['uname'];
		
		$etitle=$_POST['etitle'];
		$date= strtotime($_POST['edate']);
		$edate=date('y-m-d',$date);
		$interval=$_POST['interval'];
		$discription=$_POST['discription'];
		 
		
		try
		{
			$tableExists = $dbhandler->query("SHOW TABLES LIKE 'etable'");
			if(!$tableExists->rowCount() > 0)
			{
				$sql="
					CREATE TABLE etable ( username VARCHAR(30) NOT NULL,
					etitle VARCHAR(30) NOT NULL,
					edate DATE NOT NULL,
					discription VARCHAR(100),
					interval1 INT(6) NOT NULL
					)
				";
				$query=$dbhandler->query($sql);
			}
			
			$query=$dbhandler->query("INSERT INTO etable (username,etitle,edate,discription,interval1) VALUES ('$uname','$etitle','$edate','$discription','$interval')");
			echo "data inserted successfully";
			
			//$con=mysqli_connect("localhost","root","","digital_wallet");
			//$result=mysqli_query($con,'SELECT * FROM pass');
			$query=$dbhandler->query("select * from etable");
			
			while($row = $query->fetch())
			{
				$unm=$row['username'];
				$pcdate=$row['edate'];
				$notify=$row['interval1'];
				$etitle=$row['etitle'];
				//echo $unm;
				//echo $pcdate;
				//echo $notify;
				//echo $etitle;
				if($notify==1)
				{
					$today = date("Y-m-d");
					//echo $today;
					$pcdate = date( 'Y-m-d', strtotime( $pcdate . ' -1 day' ) );	
					//echo $today;
					 $date = strtotime($today);
					$dat = date('Y-m-d', $date);
					//echo $dat;
					//echo $pcdate;
					
					
					if($dat==$pcdate )
					{
						//echo"Your Event : ".$etitle ."Is Upcoming in " .$notify;
						$_SESSION['status1']="Your Event : ".$etitle ."Is Upcoming in " .$notify." days";
					}
				}
				if($notify==2)
				{
					$today = date("Y-m-d");
					$pcdate = date( 'Y-m-d', strtotime( $pcdate . ' -2 day' ) );	
					
					 $date = strtotime($today);
					$dat = date('Y-m-d', $date);
					
					
					if($dat==$pcdate )
					{
						//echo"Update your password for username  " .$unm;
						$_SESSION['status1']="Your Event : ".$etitle ."Is Upcoming in " .$notify ." days";
					}
				}
				if($notify==3)
				{
					$today = date("Y-m-d");
					$pcdate=date( 'Y-m-d', strtotime( $pcdate . ' -3 day' ) );	
					
					 $date = strtotime($today);
					$dat = date('Y-m-d', $date);
					
					
					if($dat==$pcdate )
					{
						//echo"Update your password for username  " .$unm;
						$_SESSION['status1']="Your Event : ".$etitle ."Is Upcoming in " .$notify." days";
					}
				}
			echo "<br><br>";
				
			}
			header("location:home.php");
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
			die();
		}

		/*$name = $_POST['name'];
		$date = strtotime($_POST['date']);
		$date = date('m-d', $date);
		setcookie($name,$date,time()+31622400);
		$today = date('Y-m-d');
		header("location:home.php?msg1=Reminder is set!");
		*/
	}
	else
	{
		header("location:index.php?msg=Please Login to View Your Home Screen!");
		echo "Invalid Reference to that page";
	}




?>