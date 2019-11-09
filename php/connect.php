<?php 

$connection = mysqli_connect('localhost', 'root', '', 'sklamos');
$select_db = mysqli_select_db($connection, 'sklamos');
 ?>
<?php 
	$db = new PDO('mysql:host=localhost;dbname=sklamos', 'root', '');
 ?>