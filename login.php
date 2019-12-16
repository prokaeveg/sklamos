<?php
	session_start();
 	require ('php/connect.php');
 	if (!$_SESSION['auth']){
 
 	if (isset($_POST['username']) && isset($_POST['password'])){
 		$username = $_POST['username'];
 		$password = $_POST['password'];
 
 		$password = md5(md5($password."papa"));
 
 		$query = "SELECT * FROM users WHERE username='$username' AND password='$password' ";
 		$result = mysqli_query($connection, $query) or die(mysqli_query($connection));

		if (mysqli_num_rows($result) > 0){
	 		$row = mysqli_fetch_array($result);
			$_SESSION['auth'] = true;
			$_SESSION['login'] = $row['username'];
			$_SESSION['pass'] = $row['password'];
			$_SESSION['surname'] = $row['surname'];
			$_SESSION['name'] = $row['name'];
			$_SESSION['phone'] = $row['phone'];
			$_SESSION['email'] = $row['email'];
			$_SESSION['img'] = $row['image'];
			$_SESSION['admin'] = $row['rights'];

			header('Location: lk.php');
		} else {
			echo 'wrong data';
		}
 	}
  ?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <title>Авторизация</title>
    <link rel="stylesheet" href="libs/bootstrap/css/bootstrap-reboot.css">
    <link rel="stylesheet" href="libs/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css&family=Lora:400,700|Muli:300,400,600,700,800&amp;subset=cyrillic-ext" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/logout.css">
  </head>

  <body>
  <div id="progressbar"></div>
    <div class="content">
        <div class="wrapper">

          <div class="container">
            <form class="form-signin" method="POST">
              <h2>Login</h2>
              <div class="txtb">
                <input type="text" name="username" class="form-control" required>
                <span data-placeholder="username"></span>
              </div>
              <div class="txtb">
                <input type="password" name="password" class="form-control"required>
                <span data-placeholder="password"></span>
              </div>
              <button class="logbtn" type="submit">Login</button>
              <div class="question">
                <p>Don't have an account?</p>
                <a href="register.php">Sign up</a>
              </div>
              <div class="back_bth">
                <a href="index.php">Вернуться на главную</a>
              </div>
            </form>

          </div>

        </div>
        </div>
    <?php require 'templates/scripts.php' ?>
    <script type="text/javascript">
              $(".txtb input").on("focus",function(){
                $(this).addClass("focus");
              });

              $(".txtb input").on("blur",function(){
                if($(this).val() == "")
                $(this).removeClass("focus");
              });
            </script>
      <?php 
} // end of if($_SESSION['auth']) 
else {
	header('Location: lk.php');
}
?>

  </body>

  </html>