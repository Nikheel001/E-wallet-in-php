<?php

	include "connection.php";
	session_start();
	

	if($_FILES['uploadFile']['size'] > 0)
	{
		$fileName = $_FILES['uploadFile']['name'];
		$tmpName  = $_FILES['uploadFile']['tmp_name'];
		$fileSize = $_FILES['uploadFile']['size'];
		$fileType = $_FILES['uploadFile']['type'];
		
		$fp      = fopen($tmpName, 'r');
		$content = fread($fp, filesize($tmpName));
		$content = addslashes($content);
		fclose($fp);

		if(!get_magic_quotes_gpc())
		{
			$fileName = addslashes($fileName);
		}
		
		$tableExists = $dbhandler->query("SHOW TABLES LIKE 'upload_data'");
		if(!$tableExists->rowCount() > 0)
		{
			echo "hii";
			$q="CREATE TABLE upload_data (
			id INT NOT NULL AUTO_INCREMENT,
			name VARCHAR(200) NOT NULL,
			type VARCHAR(30) NOT NULL,
			size INT NOT NULL,
			content MEDIUMBLOB NOT NULL,
			PRIMARY KEY(id)
			)";
			
			$query=$dbhandler->query($q);
		}

		try
		{
			$query = "INSERT INTO upload_data (name, size, type, content ) VALUES ('$fileName', '$fileSize', '$fileType', '$content')";

			$query=$dbhandler->query($query);
			
			echo "<br>File $fileName uploaded<br>";
			header("location:backup.php");
		}
		catch(PDOException $e)
		{
			echo "File does not uploaded !!";
			
		}
		
	}

?>