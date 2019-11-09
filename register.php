<?php session_start(); 
if (!$_SESSION['auth']){?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Регистрация</title>
  <link rel="stylesheet" href="libs/bootstrap/css/bootstrap-reboot.css">
  <link rel="stylesheet" href="libs/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css&family=Lora:400,700|Muli:300,400,600,700,800&amp;subset=cyrillic-ext" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/register.css">
  <link rel="stylesheet" href="css/logout.css">
</head>

<body>
<div class="wrapper">
 <?php 
	require ('php/connect.php');

	if (isset($_POST['username']) && isset($_POST['password'])){
		$username = trim($_POST['username']);
		$email = $_POST['email'];
		$password = $_POST['password'];

		$password = md5(md5($password."papa"));

		$query = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
		$result = mysqli_query($connection, $query) or die(mysqli_error($connection));

		if ($result) {
			$smsg = "Pегистрация прошла успешно";
		} else {
			$fsmsg = "Ошибка";
		}
	}
 ?>


	<?php require 'templates/header.php' ?>

	<div class="container">
		<form class="form-signin" method="POST">
			<h2>Регистрация</h2>
			<p class="reg_message"></p>
			<?php if(isset($smsg)) { ?> <div class="alert alert-success" role="alert"><?php echo $smsg; ?> </div><?php } ?>
			<?php if(isset($fsmsg)) { ?> <div class="alert alert-danger" role="alert"><?php echo $fsmsg; ?> </div><?php } ?>
			<div class="block-form-registration">
				<input type="text" name="username" class="form-control reg_login" placeholder="Username" required><br>
				<input type="email" name="email" class="form-control reg_pass" placeholder="E-mail" required><br>
				<input type="password" name="password" class="form-control reg_email" placeholder="Password" required><br>
				<!-- <div class="block-captcha">
					<img src="php/reg/reg_captcha.php" alt="Captcha">
					<input type="text" name="reg_captcha" class="reg_captcha" placeholder="" ><br>
					<p class="reloadcaptcha">Обновить</p>
				</div> -->
				<button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>

				<div class="question mt-3">
					<p>Already registered?</p>
					<a href="login.php">Login</a>
				</div>
			</div>
		</form>
	</div>

	<?php require 'templates/footer.php' ?>
</div>
<?php require 'templates/scripts.php' ?>
<!-- <script type="text/javascript">
$(document).ready(function() {	
      $('.form-signin').validate(
				{	
					//правила для проверки
					rules:{
						username:{
							required:true,
							minlength:3,
                            maxlength:15,
                            remote: {
                            	type: "POST",    
		                    	url: "reg/check_login.php"
		                    }
						},
						password:{
							required:true,
							minlength:7,
                            maxlength:15
						},
						email:{
						    required:true,
							email:true
						},
						reg_captcha:{
							required:true,
                            remote: {
	                            type: "post",    
			                    url: "reg/check_captcha.php"
		                  	}
                            
						}
					},

					messages:{
						username:{
							required:"Укажите логин!",
                            minlength:"От 3 до 15 символов!",
                            maxlength:"До 15 символов!",
                            remote: "Логин занят!"
						},
						password:{
							required:"Укажите пароль!",
                            minlength:"От 7 до 15 символов!",
                            maxlength:"До 15 символов!"
						},
						email:{
						    required:"Укажите ваш E-mail",
							email:"Не корректный E-mail"
						},
						reg_captcha:{
							required:"Введите код с картинки!",
                            remote: "Не верный код проверки!"
						}
					},
					
	submitHandler: function(form){
	$(form).ajaxSubmit({
	success: function(data) { 
								 
        if (data == 'true')
    {
       $(".form-signin").fadeOut(300,function() {
        
        $(".reg_message").addClass("reg_message_good").fadeIn(400).html("Вы Успешно зарегистрированы!");
        $("#form_submit").hide();
        
       });
         
    }
    else
    {
       $(".reg_message").addClass("reg_message_error").fadeIn(400).html(data); 
    }
		} 
			}); 
			}
			});
    	});
     
</script> -->
<?php 
} // end of if($_SESSION['auth']) 
else {
	header('Location: lk.php');
}
?>
</body>
</html>