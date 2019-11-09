<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>О сайте</title>
  <link rel="stylesheet" href="libs/bootstrap/css/bootstrap-reboot.css">
  <link rel="stylesheet" href="libs/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css&family=Lora:400,700|Muli:300,400,600,700,800&amp;subset=cyrillic-ext" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/about.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/logout.css">
</head>
<body>
<div class="wrapper">
<?php require 'templates/header.php' ?>

<div class="containerAbout">
  <div class="content">
    <div class="header">
      <div class="page-header">
        <h1>О сайте</h1>
      </div>
    </div>
    <div class="article">
      <p>"Sklamos.ru" – рекламная площадка для организаций в сети Интернет.</p>
      <h2>Цели сайта</h2>
      <p>Основная цель сайта "sklamos.ru" - предоставить закупщикам информацию о поставщиках, предлагаемых ими товарах и услугах, о запросах со стороны поставщиков по поиску дилеров и дистрибьюторах, а также о новостях компаний и проводимых ими акциях.</p>
      <h3>Миссия сайта</h3>
      <p>Миссия сайта "Поставщики.ру" – помочь поставщикам реализовывать, а покупателям получать информацию о предлагаемых производителями, дистрибьюторами и оптовыми продавцами товарах и услугах.</p>
      <p>Сайт представляет любой компании-поставщику возможность разместить информацию об организации, а также рассказать о предлагаемых товарах и услугах, о поиске дилеров и проводимых акциях.</p>
      <p>Для закупщиков же есть возможность выбрать подходящего поставщика, изучить и отобрать предложения и получить полную контактную информацию компании.</p>
    </div>
  </div>
</div>



  <?php require 'templates/footer.php' ?>

</div>
<?php require 'templates/scripts.php' ?>
</body>
</html>