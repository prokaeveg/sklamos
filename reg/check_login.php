<?php 
	if ($_SERVER["REQUEST_METHOD"] == "POST"){
		require_once ('../php/connect.php');
		require_once ('../functions/functions.php');

		$login = clear_string ($_POST['username']);

		$result  mysqli_query($connection, "SELECT username FROM users WHERE username = '$login'");
		if(mysqli_num_rows($result) > 0){
			echo 'false';
		}
		else {
			echo 'true'; 
		}
	}
 ?>