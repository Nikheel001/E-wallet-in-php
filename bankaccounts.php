<?php

session_start();
//$uname=$_SESSION['uname'];
include "connection.php";

if(isset($_SESSION['uname']))
{

	if(isset($_GET['msg']))
	{
		echo "".$GET_['msg'];
	}

	echo "
	<html>
	<body>
	<form action='details.php' method='POST'>
	Bank:<input type='text' name='bank_name'><br>
	Address:<input type='text' name='address'><br>
	Account No.:<input type='int' name='accno'><br>
	Account Name:<input type='text' name='name'><br>
	Account Type:<input type='text' name='acctype'><br>
	Balance:<input type='int' name='balance'><br>
	<input type='Submit' value='Submit' name='Submit'><br>
	</form>
	<form action='details.php'><input type='Submit' value='Back'></form>
	</body>
	</html>

	";

}
else
{
	header("location:C:\wamp64\www\project\abcd\index.php?msg=please login first");
}	
/*$tableExists = $dbhandler->query("SHOW TABLES LIKE 'banks'");
if(!$tableExists->rowCount() > 0)
{			
		$sql="create table banks (
		BANK VARCHAR(20) , 
       	ADDRESS VARCHAR(30) NOT NULL,
     	Acc. No INT NOT NULL,
		Acc. Name VARCHAR(10),
       	Acc. Type VARCHAR(20),
       	Balance INT,
       	)";

		$query=$dbhandler->query($sql);
		echo "Table is created successfully..<br><br>";
		
}
		
*/


?>