<?php 
session_start();
if(!empty($_SESSION['auth']))
      {

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Политика конфиденциальности</title>
  <link rel="stylesheet" href="libs/bootstrap/css/bootstrap-reboot.css">
  <link rel="stylesheet" href="libs/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css&family=Lora:400,700|Muli:300,400,600,700,800&amp;subset=cyrillic-ext" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/privacy_policy.css">
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
        <h1>Политика конфиденциальности</h1>
      </div>
    </div>
    <div class="article">
      <p>Настоящая политика конфиденциальности касается использования данного веб-сайта.</p>
        <h3>1 Какая информация подлежит сбору</h3>
        <p>1.1 Сбору подлежат сведения, обеспечивающие возможность поддержки обратной связи с пользователем.</p>
        <p>1.2 Также на сайте используются google analytics и яндекс.метрика, которые могут собирать информацию для ремаркетинга. Данные, полученные этими способами, могут быть предоставлены третьим лицам.</p>
        <h3>2 Управление личными данными</h3>
        <p>2.1 Личные данные доступны для просмотра, изменения и удаления в личном кабинете пользователя.</p>
        <h3>3 Предоставление данных третьим лицам</h3>
        <p>3.1 Личные данные пользователей могут быть переданы лицам, не связанным с настоящим сайтом, если это необходимо:</p>
        <ul>
          <li>для соблюдения закона, нормативно-правового акта, исполнения решения суда;</li>
          <li>для выявления или воспрепятствования мошенничеству;</li>
          <li>для устранения технических неисправностей в работе сайта;</li>
          <li>для предоставления информации на основании запроса уполномоченных государственных органов;</li>
          <li>при условии, указанном в пп 1.2</li>
        </ul>
        <h3>4 Защита данных пользователей</h3>
        <p>Администрация сайта принимает все меры для защиты данных пользователей от несанкционированного доступа, в частности:</p>
        <ul>
          <li>регулярное обновление служб и систем управления сайтом и его содержимым;</li>
          <li>регулярные проверки на предмет наличия вредоносных кодов;</li>
          <li>использование для размещения сайта выделенного сервера.</li>
        </ul>
        <h3>5 Изменения</h3>
        <p>Обновления политики конфиденциальности публикуются на данной странице.</p>
        <p>Используя данный веб-сайт, вы соглашаетесь с данной политикой конфиденциальности.</p>
    </div>
  </div>
</div>



<?php require 'templates/footer.php' ?>
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