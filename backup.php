<?php

	session_start();

if(isset($_SESSION['uname']))
{
		$uname=$_SESSION['uname'];

		if(!(isset($_POST['upload'])&& isset($_POST['download'])))
		{
			echo "	
				<head>
					<title>Backup & Restore</title>
				</head>
				<body>
					<h1>Backup & Restore</h1>
					<br>
					<form action='' method='post' >
						Upload Your File :<input type='submit' name='upload' value='Backup File'>
					</form>
					<form action='' method='post' >
						Download Your File :<input type='submit' name='download' value='Restore File'>
					</form>
				</body>
			";
		}

		if(isset($_POST['upload']))
		{
			echo "
				<h1>Backup File </h1><br>
				<form action='upload.php' method='post' enctype='multipart/form-data'>
					<br><input type='file' name='uploadFile' id='uploadFile'>
					<br><input type='submit' name='downloadFile' value='Backup File'>
				</form>
			";
		}
		else
		{
			echo "
				<head>
				<meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1'>
				</head>
			";
			
			include "connection.php";
			
			$query=$dbhandler->query("select * from upload_data");
			echo "<br><table border='2'>
			<tr>
				<td>Id</td><td>Name</td><td>Type</td><td>Size</td>
			</tr>
			";
			while($r=$query->fetch())
			{
				echo "
					
					<tr>
						<td>".$r['id']."</td>
						<td>".$r['name']."</td>
						<td>".$r['type']."</td>
						<td>".$r['size']."</td>
					</tr>
					
				";
			}
			echo "	
				</table>
				<form action='download.php' method='post'>
				<br><br>Which file do you want to download <br>
				Please enter its id number :<input type='text' name='id'>
				<br><br><input type='submit' name='download' value='Restore File'>
				</form>
			";
		}
}
else
{
	header("location:C:\wamp64\www\project\abcd\index.php?msg=please login first");
}
		?>