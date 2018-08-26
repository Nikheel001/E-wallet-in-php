<?php
	if(isset($_POST['id']))
	{
		// if id is set then get the file with the id from database

		include "connection.php";
echo "hiii";
		$id    = $_POST['id'];
		$query = "SELECT name, type, size, content " .
				 "FROM upload_data WHERE id = '$id'";
echo "hiii";
		$result = $dbhandler->query($query);
		list($name, $type, $size, $content) =$result->fetch();

		header("Content-length: '$size'");
		header("Content-type: '$type'");
		header("Content-Disposition: attachment; filename='$name'");
		echo $content; 

	exit;
	}

?>