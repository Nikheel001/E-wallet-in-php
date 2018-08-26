<html>
<head>
	<title> FileUpload </title>
</head>
<body>

<form method="post" action="upload.php" enctype="multipart/form-data">
<table border="1" align="center" width=50%>
<tr>
<td colspan="3" align="center" style="color:#00AA00"> <?php 
if(isset($_GET['msg']))
	echo $_GET['msg'];
?> 
</td>
</tr>
<tr>
<td width=30%>* User Name:</td>
<td colspan="2"><input type="text" name="username" size=75></td>
</tr>


<tr>
<td>Select Your File: </td> <td colspan="2"><input type="file" name="uploadFile" id="myFile"></td>
</tr>

<tr>
<td colspan="2" align="center"><input type="submit" name="submit" value="submit"><input type="Reset" name="Reset" value="Reset"></td>
</tr>
</table>
</form>
</body>
</html>
