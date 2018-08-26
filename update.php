<?php	

	session_start();
	include "./../connection.php";
	
	if(isset($_SESSION['uname']))
	{
		$unm=$_SESSION['uname'];
		$acno=$_SESSION['acno'];
		$bank_nm = $_SESSION['bank_nm'];
		
		if((isset($_POST['val'])) && (isset($_POST['op'])))
		{
			$val = $_POST['val'];
			$chs = $_POST['op'];
			
		try
		{		
			$query=$dbhandler->query("select money from acc_detail where unm='$unm' AND acno='$acno' AND bank_nm='$bank_nm' ");
			$data = $query->fetch();
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
			die();
		}
			if($chs == "add")
			{
				if($val < '0')
				{
					header("location:operate.php?msg2=Please Enter valid money");
					die();
				}
				else
				{
					$val = $data[0]+$val;
				}
				$_SESSION['val'] = $val;
				header("location:change_data.php");
			}
			else
			{
				if($val < '0')
				{
					header("location:operate.php?msg2=Please Enter valid money");
					die();
				}
				else
				{
					$val = $data[0]-$val;
					if($val < '300')
					{
						header("location:operate.php?msg2=Low balance.");
						die();
					}
				}
				$_SESSION['val'] = $val;
				$_SESSION['val2'] = $_POST['val'];
				header("location:send_to.php");
				die();
			}
		}
	}
	else
	{
		header("location:C:\wamp64\www\project\index.php?msg=Please login first");
	}
?>