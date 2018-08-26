<?php	

	session_start();
	include "./../connection.php";
	
	if(isset($_SESSION['unm']))
	{
		$unm=$_SESSION['unm'];
		$acno=$_SESSION['acno'];
		$bank_nm = $_SESSION['bank_nm'];
	
		echo "Greetings  ".$unm."<br>";
	
		echo "Current balance : ";
		
		try
		{					
			if((isset($_POST['acno2'])) && (isset($_POST['bank_nm2'])) )
			{				
				$acno2 = $_POST['acno2'];
				$bank_nm2 = $_POST['bank_nm2'];
				
				if(($acno2 == $acno) && ($bank_nm == $bank_nm2))
				{
					header("location:operate.php?msg2=Are you stupid! it's your account");
					die();
				}
				
				$query=$dbhandler->query("select money from acc_detail where acno='$acno2' AND bank_nm='$bank_nm2' ");
				$affectedRow=$query->rowcount();
				
				if($affectedRow == 0)
				{
					header("location:operate.php?msg2=No account exists.");
				}
				else
				{
					$data = $query->fetch();
					$val = $_SESSION['val2'] + $data[0];
					$query=$dbhandler->query("UPDATE acc_detail SET money='$val' where acno='$acno2' AND bank_nm='$bank_nm2' ");
					unset($_SESSION['val2']);
				}
			}	
			if(isset($_SESSION['val']))
			{
				$val = $_SESSION['val'];
				$query=$dbhandler->query("UPDATE acc_detail SET money='$val' where unm='$unm' AND acno='$acno' AND bank_nm='$bank_nm' ");
			}
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
			die();
		}

		header("location:operate.php?msg2=Done");
		die();
	}
	else
	{
		header("location:./../index.php?msg=Please login first");
	}
?>