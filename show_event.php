<?php

//show event

	session_start();
	
	if(isset($_SESSION['uname']))
	{
		$dbhandler = new PDO('mysql:host=127.0.0.1;dbname=digital_wallet','root','');
		//echo "Connection is established...<br/>";
		$dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION); 
		
		
		$query=$dbhandler->query("select * from etable");
		while($r=$query->fetch()){
						
			echo "
				<table border='2'>
					<tr>
						<td>Event Title :</td>
						<td>" .$r['etitle'] ."</td>
					</tr>
					<tr>
						<td>Username :</td>
						<td>" .$r['username'] ."</td>
					</tr>
					<tr>
						<td>Discription :</td>
						<td>" .$r['discription'] ."</td>
					</tr>
					<tr>
						<td>Date of Event[yyyy-dd-mm]</td>
						<td>".$r['edate'] ."</td>
					</tr>
					<tr>
						<td>Reaminder Interval : </td>
						<td>" .$r['interval1'] ."</td>
					</tr>
				</table>
			<br><br>
			";
		}	
			
			
	}
	else
	{
		header("location:C:\wamp64\www\project\index.php?msg=Please Login again !!");
	}

?>