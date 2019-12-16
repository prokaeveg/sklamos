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
    <div id="progressbar"></div>
    <div class="wrapper">
      <?php require 'templates/header.php' ?>
        <div class="content">

          <div class="inner-width team-section">
            <h1>Наша команда</h1>

          <div class="pers">
            <div class="pe">
              <img src="img/workers/worker1.jpg" alt="">
              <div class="p-name">Full name</div>
              <div class="p-des">Desiigner</div>
              <div class="p-sm">
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-instagram"></i></a>
                <a href="#"><i class="fa fa-vk"></i></a>
              </div>
            </div>

            <div class="pe">
              <img src="img/workers/worker2.jpg" alt="">
              <div class="p-name">Full name</div>
              <div class="p-des">Director</div>
              <div class="p-sm">
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-instagram"></i></a>
                <a href="#"><i class="fa fa-vk"></i></a>
              </div>
            </div>

            <div class="pe">
              <img src="img/workers/worker3.jpg" alt="">
              <div class="p-name">Full name</div>
              <div class="p-des">Admin</div>
              <div class="p-sm">
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-instagram"></i></a>
                <a href="#"><i class="fa fa-vk"></i></a>
              </div>
            </div>
          </div>
          </div>

         

          <?php require 'templates/footer.php' ?>

        </div>
    </div>
    <?php require 'templates/scripts.php' ?>
  </body>

  </html>