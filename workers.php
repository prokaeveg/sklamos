<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Работники склада</title>
  <link rel="stylesheet" href="libs/bootstrap/css/bootstrap-reboot.css">
  <link rel="stylesheet" href="libs/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css&family=Lora:400,700|Muli:300,400,600,700,800&amp;subset=cyrillic-ext" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/workers.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/logout.css">
</head>
<body>
<div class="wrapper">
<?php require 'templates/header.php' ?>

<header class="header container">
    Наши работники
</header>


<div class="workers_photo">
  <div class="container">
    <div class="row">
      <div class="col-sm-4">
        <div class="worker">
          <img class="img-fluid" src="img/workers/worker1.jpg" alt="">
          <div class="worker-text"><p>Работник</p>
          </div>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="worker"> 
          <img class="img-fluid" src="img/workers/worker2.jpg" alt="">
          <div class="worker-text"><p>Работник</p>
          </div>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="worker">
          <img class="img-fluid" src="img/workers/worker3.jpg" alt="">
          <div class="worker-text"><p>Работник</p>
          </div>
      </div>
    </div>
  </div>
</div>
</div>


 <?php require 'templates/footer.php' ?>

</div>
<?php require 'templates/scripts.php' ?>
</body>
</html>