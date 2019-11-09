<?php session_start(); 
  require ('../php/connect.php');
  if ($_SESSION['admin'] == 1) {
  require ('../functions/functions.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Всея адмика</title>
  <link rel="stylesheet" href="../libs/bootstrap/css/bootstrap-reboot.css">
  <link rel="stylesheet" href="../libs/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css&family=Lora:400,700|Muli:300,400,600,700,800&amp;subset=cyrillic-ext" rel="stylesheet">
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../css/logout.css">
  <link rel="stylesheet" href="../css/admin.css">

</head>
<body>
<div class="wrapper">
<nav class="nav-wrapper">
    <div class="container">
      <div class="row">
        <div class="col-md-2 col-sm-1">
          <div class="logo">
            sklamos
          </div>
        </div>
        <div class="col-md-5 col-sm-5">
          <div class="navigation">
            <a href="../index.php" class="navigation-link">Главная</a>
            <a href="../products.php" class="navigation-link">Товары</a>
            <a href="../workers.php" class="navigation-link">Кладовщики</a>
            <a href="../faq.php" class="navigation-link">FAQ</a>
          </div>
        </div>
        
        <!-- SEARCH BOX -->

        <div class="col-md-3 col-sm-4 search">
          <form action="../search.php?q=" method="GET">
            
            <span class="icon"><i class="fa fa-search"></i></span>
            <input type="text" class="input-search" name="q" placeholder="Названия товаров" value="<?php echo $search; ?>">
            <input type="submit" class="button-search" value="Поиск">
          </form>
        </div>

        <div class="col-md-1 col-sm-1">
          <div class="lk">
            <!-- <div class="log-in"><a href="#openModal">Login</a></div> -->
            <?php if(!empty($_SESSION['auth']))
             { ?>
              <div class="block-user">
                <div class="corner">
                  <ul>
                    <li><img src="../img/user_info.png" alt=""><a href="../lk.php">Личный кабинет</a></li>
                    <li><img src="../img/logout.png" alt=""><a href="../logout.php">Выход</a></li>
                    <li><img src="../img/logout.png" alt=""><a href="admin.php">Админка</a></li>
                  </ul>
                </div>
              </div>
              <div class="logout"">
                <a href="#" class="user-info">Профиль</a>
          </div>
          <?php 
            } else {
               ?>
               <div class="log-in"><a href="login.php">Login</a></div>
            <i class="fa fa-id-card-o" aria-hidden="true"></i>
          <?php } ?>
        </div>
        </div>
          <!-- <div class="modalDialog" id="openModal">
            <div>
              <a href="#close" title="Закрыть">X</a>
              <h2>Modal</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. In iure magni nulla nisi, quas asperiores quisquam modi iusto rerum sapiente. Pariatur at quibusdam doloremque repudiandae voluptatum nostrum omnis adipisci voluptatibus.</p>
            </div>
          </div> -->
        <div class="col-md-1 col-sm-1">
          <div class="cart">
            <div class="cart-redirect"><a href="cart.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i>
            <div class="cart-number">3</div></a></div>
          </div>
        </div>
      </div>
</nav>


<!-- END OF HEADER -->

<div class="container">

  <center><h1>Функционал скоро появится</h1></center>
  <div class="add_item">
    <a href="admin.php" class="button">Назад к админке</a>
  </div>

<div class="row">
  
</div>
</div>


<?php require '../templates/footer.php' ?>
</div>
  
<script type="text/javascript" src="../libs/jquery/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="../libs/jquery/jquery.cookie.js"></script>
  <script type="text/javascript" src="../libs/jquery/jcarousellite_1.0.1.js"></script>
  <script type="text/javascript" src="../trackbar/trackbar.js"></script>
  <script type="text/javascript" src="../libs/bootstrap/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="../js/main.js"></script>
  <script type="text/javascript" src="../js/shop-script.js"></script>
  <script type="text/javascript" src="../libs/jquery/jquery.textchange.min.js"></script>
  <script type="text/javascript" src="../libs/jquery/jquery.form.js"></script>
  <script type="text/javascript" src="../libs/jquery/jquery.validate.js"></script>
  <script type="text/javascript" src="../fancybox/jquery.fancybox.js"></script>
  <script type="text/javascript" src="../js/jTabs.js"></script>
   
<?php } else { ?>
  <div class="error_admin_roots">
    <p><strong>Сорян чувак, ты не обладаешь достаточными правами, </strong><a href="../products.php">вернуться обратно в каталог</a></p>

  </div>

<?php } ?>
</body>
</html>