<?php

	//show event
	
	session_start();
	
	if(isset($_SESSION['uname']))
	{
		$uname=$_SESSION['uname'];
		echo "<table border=\"1\"><tr><td colspan='2'><a href='home.php'>Home</a><a href='signout.php'>&nbsp;&nbsp;&nbsp;&nbsp;Signout</a></td></tr><tr><td colspan='2'><h3>Welcome <i><u> $uname </i></u></h3></td></tr>";
		echo "<form action='store.php' method='post'>
				<tr><td><p>Event Title</p></td><td><input type='text' name='etitle'/></td></tr>
				<tr><td><p>Event Date</p></td><td><input type='date' name='edate' /></td></tr>
				<tr><td><p>Discription</p></td><td><input type='text' name='discription' size='30' /></td></tr>
				<tr>
					<td><p>Remind Me Before</p></td>
					<td><select name='interval'>
						<option value='1'>1 days</option>
						<option value='2'>2 days</option>
						<option value='3'>3 days</option>
						<option value='4'>4 days</option>
						</select>
					</td>
				</tr>
				<tr><td colspan='2'><p><center><input type='submit' value='Set Event'/></center></p></td></tr>
			  </form>
		</table>
		";
	}
	else
	{
		header("location:C:\wamp64\www\project\index.php?msg=Please Login to View Your Home Screen!");
		echo "Invalid Reference to that page";
	}

?>