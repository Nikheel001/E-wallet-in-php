<?php

echo "
<a href='signout.php'>Sign out</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='dw.php'>Home</a>
<form action='expenditures.php' method='POST' enctype='multipart/form-data'>
Choose date:<input type='date' name='expd_date'><br>
Enter Category:<input type='text' name='expd_category'><br>
Amount:<input type='text' name='expd_amount'><br>
Description:<input type='text' name='expd_description'><br>
Attach a image:<input type='file' name='fileToUpload' id='fileToUpload'>
<br><input type='Submit' value='Submit' name='Submit'>
</form>

";


?>