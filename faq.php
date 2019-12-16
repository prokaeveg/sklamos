<?php session_start(); ?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <title>Ответы на часто задаваемые вопросы</title>
    <link rel="stylesheet" href="libs/bootstrap/css/bootstrap-reboot.css">
    <link rel="stylesheet" href="libs/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css&family=Lora:400,700|Muli:300,400,600,700,800&amp;subset=cyrillic-ext">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/faq.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/logout.css">
  </head>

  <body>
    <div id="progressbar"></div>
    <div class="wrapper">
      <?php require 'templates/header.php' ?>

        <div class="content">
          <div class="containerAbout content-faq">
            <div class="header">
              <div class="page-header">
                <h1>Ответы на часто задаваемые вопросы</h1>
              </div>
            </div>
            <div class="article">
              <p>Ответы скоро появятся, just wait :)</p>
            </div>
          </div>

          <?php require 'templates/footer.php' ?>
        </div>

    </div>
    <?php require 'templates/scripts.php' ?>
  </body>

  </html>