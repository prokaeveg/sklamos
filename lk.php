<?php session_start(); 
if(!empty($_SESSION['auth']))
      {
      	require ('php/connect.php');
  		require ('functions/functions.php');

      	if ($_POST["save_submit"])
     {

        
    $_POST["lk_surname"] = clear_string($_POST["lk_surname"], $connection);
    $_POST["lk_name"] = clear_string($_POST["lk_name"], $connection);
    $_POST["lk_phone"] = clear_string($_POST["lk_phone"], $connection);
    $_POST["lk_email"] = clear_string($_POST["lk_email"], $connection);

    $error = array();
	
	$password = $_POST['lk_pass'];
    $password = md5(md5($password."papa"));

	if($_SESSION['pass'] != $password)
	{
		$error[]='Неверный текущий пароль!';
	}else
    {
        
	      if($_POST["lk_new_pass"] != "")
		{
			        if(strlen($_POST["lk_new_pass"]) < 7 || strlen($_POST["lk_new_pass"]) > 15)
	            	{
			           $error[]='Укажите новый пароль от 7 до 15 символов!';
		            }else
	                {
	                	$newpass = $_POST['lk_pass'];
	                	$newpass   = md5(md5($newpass."papa"));
	                    $newpass   = md5(md5(clear_string($newpass."papa", $connection)));
	                    $newpassquery = "password='".$newpass."',";
	                }
		}
	    
	    
	    
	        if(strlen($_POST["lk_surname"]) < 3 || strlen($_POST["lk_surname"]) > 15)
		{
			$error[]='Укажите фамилию от 3 до 15 символов!';
		}
	    
	    
	        if(strlen($_POST["lk_name"]) < 3 || strlen($_POST["lk_name"]) > 15)
		{
			$error[]='Укажите имя от 3 до 15 символов!';
		} 
	    
	    
	        if(!preg_match("/^(?:[a-z0-9]+(?:[-_.]?[a-z0-9]+)?@[a-z0-9_.-]+(?:\.?[a-z0-9]+)?\.[a-z]{2,5})$/i",trim($_POST["lk_email"])))
		{
			$error[]='Укажите корректный email!';
		}
	    
	      if(strlen($_POST["lk_phone"]) == "")
		{
			$error[]='Укажите номер телефона!';
		}         
    }
    
  if(count($error))
	{
		$_SESSION['msg'] = "<p align='left' class='form-error'>".implode('<br />',$error)."</p>";
	}else
    {
        $_SESSION['msg'] = "<p align='left' class='form-success'>Данные успешно сохранены!</p>";
    
    $query = $newpassquery."surname='".$_POST["lk_surname"]."',name='".$_POST["lk_name"]."',email='".$_POST["lk_email"]."',phone='".$_POST["lk_phone"]."'";  
     $update = mysqli_query($connection, "UPDATE users SET $query WHERE username = '{$_SESSION['login']}'");

    if ($newpass){ $_SESSION['pass'] = $newpass; } 
    
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
		}
      
        
    }
        
     } 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Личный кабинет</title>
  <link rel="stylesheet" href="libs/bootstrap/css/bootstrap-reboot.css">
  <link rel="stylesheet" href="libs/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css&family=Lora:400,700|Muli:300,400,600,700,800&amp;subset=cyrillic-ext" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/logout.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/lk.css">
</head>

<body>
<div class="wrapper">
	<?php require 'templates/header.php' ?>

	<div class="container">	
		<?php 
	      	$result = mysqli_query($connection, "SELECT * FROM users");
		    if (mysqli_num_rows($result) > 0){
			    $row = mysqli_fetch_array($result);
			    if ($_SESSION["img"] != "" && file_exists("img/users/".$_SESSION["img"]))
			    {
				    $img_path = 'img/users/'.$_SESSION["img"];  
				    $max_width = 100;
				    $max_height = 100;
				    list($width, $height) = getimagesize($img_path);
				    $ratioh = $max_height/$height;
				    $ratiow = $max_width/$width;
				    $ratio = min($ratioh, $ratiow);
				    $width = intval($ratio*$width);
				    $height = intval($ratio*$height);
			    }else
			    {
				    $img_path = "img/no_image.jpg";
				    $width = 100;
				    $height = 100;
			    }
			}
	    ?>
		<div class="mainInfo">
			<div class="photo">
				<img src="<?php echo $img_path ?>" width="<?php echo $width ?>" height="<?php echo $height ?>" alt="profile photo">
			</div>
			<div class="username">	
				<p><strong>Пользователь: </strong><?php echo $_SESSION['login'] ?></p>
			</div>
		</div>
		<h2>Изменение профиля</h2>
		<?php 
			if ($_SESSION['msg']){
				echo $_SESSION['msg'];
				unset($_SESSION['msg']);
			}
		 ?>
		<form action="" method="POST">
			<ul class="info-profile">
				<li>
					<label for="lk_pass">Текущий пароль</label>
					<span class="star">*</span>
					<input type="password" name="lk_pass" id="lk_pass" value="" />
				</li>
				<li>
					<label for="lk_new_pass">Новый пароль</label>
					<input type="password" name="lk_new_pass" id="lk_new_pass" value="" />
				</li>
				<li>
					<label for="lk_email">E-mail</label>
					<span class="star">*</span>
					<input type="text" name="lk_email" id="lk_email" value="<?php echo $_SESSION['email'] ?>" />
				</li>
				<li>
					<label for="lk_name">Имя</label>
					<span class="star">*</span>
					<input type="text" name="lk_name" id="lk_name" value="<?php echo $_SESSION['name'] ?>" />
				</li>
				<li>
					<label for="lk_surname">Фамилия</label>
					<span class="star">*</span>
					<input type="text" name="lk_surname" id="lk_surname" value="<?php echo $_SESSION['surname'] ?>" />
				</li>
				<li>
					<label for="lk_phone">Телефон</label>
					<span class="star">*</span>
					<input type="text" name="lk_phone" id="lk_phone" value="<?php echo $_SESSION['phone'] ?>" />
				</li>
			</ul>
			<input type="submit" class="lk_form_submit" name="save_submit" value="Сохранить">
		</form>
	</div>






	<?php 	require 'templates/footer.php' ?>
</div>
<?php require 'templates/scripts.php' ?>
</body>
</html>
<?php 
  } else {
 ?>
    <p> please <a href="login.php">login</a></p>
<?php 
  }
 ?>
