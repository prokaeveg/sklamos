<?php session_start();
if ($_SESSION['admin'] == 1) {
  require ('../php/connect.php');
?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <title>Добавить товар</title>
    <link rel="stylesheet" href="../libs/bootstrap/css/bootstrap-reboot.css">
    <link rel="stylesheet" href="../libs/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css&family=Lora:400,700|Muli:300,400,600,700,800&amp;subset=cyrillic-ext">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/logout.css">
    <link rel="stylesheet" href="../css/add_to_db.css">
  </head>

  <body>
    <div class="wrapper">
     <nav class="nav-wrapper">
        <div class="container">
          <div class="menu_hamb">
            <a href="#" class="menu_hamb_btn">
              <span></span>
            </a>
            <nav class="menu-list">
              <div class="logo_hamb">
                  sklamos
                </div>

              <div class="search_hamb">
                <form action="../search.php?q=" method="GET">
                  <div class="input-wrapper" data-text="">
                    <input type="text" placeholder="Search…" name="q" value="<?php echo $search; ?>">          
                  </div>
                </form>
              </div>

              <div class="nav_links_hamb">
                <span><div class="lk_hamb">
                  <div class="lk">
                  <?php if(!empty($_SESSION['auth']))
                   { ?>
                    <nav class="navbar navbar-expand-sm navbar-light">
                      <ul class="navbar-nav">
                        <li class="nav-item dropdown">

                          <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" style="padding-left: 0; padding-right: 0">Профиль</a>
                          <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="../lk.php">Личный кабинет</a></li>
                            <li><a class="dropdown-item" href="../php/logout.php">Выход</a></li>
                            <?php if ($_SESSION['admin'] == 1){ ?>
                            <li><a class="dropdown-item" href="admin.php">Админка</a></li>
                            <?php } ?>
                          </ul>
                        </li>
                      </ul>
                    </nav>
                  </div>
                  <?php 
                    }//end of if(!empty($_SESSION['auth'])
                     else {
                       ?>
                       <div class="log-in"><a href="../login.php">Login</a></div>
                    <i class="fa fa-id-card-o" aria-hidden="true"></i>
                  <?php } ?>
                </div></span>
                <span><a href="../index.php" class="navigation-link">Главная</a></span>
                <span><a href="../products.php" class="navigation-link">Товары</a></span>
                <span><a href="../workers.php" class="navigation-link">Кладовщики</a></span>
                <span><a href="../faq.php" class="navigation-link">FAQ</a></span>
              </div>
            </nav>
          </div>
          <div class="menu_lg">
            <div class="row">
              <div class="col-md-2 col-sm-1">
                <div class="logo">
                  <span>s</span>
                  <span class="hidden">k</span>
                  <span class="hidden">l</span>
                  <span class="hidden">a</span>
                  <span>m</span>
                  <span class="hidden">o</span>
                  <span class="hidden">s</span>
                </div>
              </div>
              <div class="col-md-5 col-sm-5">
                <div class="navigation">
                 <ul>
                    <li><a href="../index.php" class="navigation-link">Главная</a></li>
                    <li><a href="../products.php" class="navigation-link">Товары</a></li>
                    <li><a href="../workers.php" class="navigation-link">Кладовщики</a></li>
                    <li><a href="../faq.php" class="navigation-link">FAQ</a></li>
                  </ul>
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
                  <?php if(!empty($_SESSION['auth']))
                   { ?>
                    <div class="block-user">
                      <div class="corner">
                        <ul>
                          <li><img src="../img/user_info.png" alt=""><a href="../lk.php">Личный кабинет</a></li>
                          <li><img src="../img/logout.png" alt=""><a href="../logout.php">Выход</a></li>
                          <?php if ($_SESSION['admin'] == 1){ ?>
                            <li><i class="fa fa-shield"></i><a href="../admin/admin.php">Админка</a></li>
                            <?php } ?>
                        </ul>
                      </div>
                    </div>
                    <div class="logout" ">
                      <a href="# " class="user-info ">Профиль</a>
                </div>
                <?php 
                  }//end of if(!empty($_SESSION['auth'])
                   else {
                     ?>
                     <div class="log-in "><a href="login.php ">Login</a></div>
                  <i class="fa fa-id-card-o " aria-hidden="true "></i>
                <?php } ?>
              </div>
            </div>
              <div class="col-md-1 col-sm-1 ">
                <div class="cart ">
                  <div class="cart-redirect "><a href="cart.php "><i class="fa fa-shopping-cart " aria-hidden="true "></i>
                  <div class="cart-number ">3</div></a></div>
                </div>
              </div>
              </div>
            </div>
      </nav>

<!-- END OF HEADER -->


<div class="content">
  <div class="container wrapper">
    <div class="add_item ">
      <a href="admin.php " class="button ">Назад к админке</a>
    </div>
    <h2 class="main_title ">Добавление товара</h2>
    <?php if(!empty($smsg)) { ?> <div class="alert alert-success " role="alert "><?php echo $smsg; ?> </div><?php } ?>
    <?php if(!empty($fsmsg)) { ?> <div class="alert alert-danger " role="alert "><?php echo $fsmsg; ?> </div><?php } ?>
    <form class="add_form" action="" method="POST">
      <p>
        <label for="title ">Name</label>
          <input class="data title" type="text" name="title" value="" placeholder="product name" required>
      </p>
      <p>
        <label for="price ">Price</label>
          <input class="data price" type="text " name="price" value="" placeholder="price" required>
      </p>
      <p>
        <label for="brand ">Brand</label>
          <input class="data brand" type="text " name="brand" value="" placeholder="brand" required>
      </p>
      <p>
        <label for="image ">Image</label>
          <input class="data image" type="text" name="image" value="" placeholder="image" required>
      </p>
      <p>
        <label for="features ">Mini features</label>
          <input class="data features" type="text" name="features" value="" placeholder="mini features" required>
      </p>
      <p>
        <label for="type ">Product type</label>
          <input class="data type" type="text" name="type" value="" placeholder="product type" required>
      </p>
      <input type="submit" class="add_form_submit" name="save_submit" value="Сохранить"> 
    </form>
  </div>

<?php require '../templates/footer.php' ?>
</div>

<?php 
  require_once ('../php/connect.php');
  require_once ('../functions/functions.php');

  if (!empty($_POST['save_submit'])){
    $title = $_POST['title'];
    $price = $_POST['price'];
    $price = check_symbol ($price, "Price ", "1 ", "/^[0-9]/ ");
    $brand = $_POST['brand'];
    $brand = check_symbol ($brand, "Brand ", "1 ", "/^[a-zA-Z]/ ");
    $image = $_POST['image'];
    $image = check_symbol ($image, "Image ", "1 ", "/^[a-zA-Z0-9 ._-]\S+(?:jpg|jpeg|png)$/ ");
    $features = $_POST['features'];
    $features = check_symbol ($features, "Mini features ", "1 ", "/[а-яёА-ЯЁa-zA-Z0-9]/ ");
    $type = $_POST['type'];
    $type = check_symbol ($type, "Product type ", "1 ", "/^[a-z]/ ");
    if (!empty($GLOBALS['alert'])) {
      $GLOBALS['alert'] = 'Данные из формы не отправлены. Обнаружены следующие ошибки: \n'.$GLOBALS['alert'];
      require "../php/alert.php ";
      require "../php/redirect.php ";
    } else {
      $query = "SELECT * FROM categories WHERE product_type='$type' AND brand='$brand' ";
      $result = mysqli_query($connection, $query) or die(mysqli_query($connection));
      if (mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_array($result);
        $GLOBALS['id'] = $row['id'];
      $brand_id = $GLOBALS['id'];
      }

      $query = "INSERT INTO products (title, price, brand, image, mini_features, visible, product_type, brand_id) VALUES( '$title', '$price', '$brand', '$image', '$features', '1', '$type', '$brand_id') ";
      $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
      if ($result) {
        echo 'success';
        $smsg = "Товар добавлен! ";
      } else {
        $fsmsg = "Ошибка ";
      }
    }


    
  }

 ?>
<?php } else { ?>
  <div class="error_admin_roots ">
    <p><strong>Сорян чувак, ты не обладаешь достаточными правами, </strong><a href="../products.php ">вернуться обратно в каталог</a></p>

  </div>

<?php } ?>
<script type="text/javascript " src="../libs/jquery/jquery-3.4.1.min.js "></script>
  <script type="text/javascript " src="../libs/jquery/jquery.cookie.js "></script>
  <script type="text/javascript " src="../libs/jquery/jcarousellite_1.0.1.js "></script>
  <script type="text/javascript " src="../trackbar/trackbar.js "></script>
  <script type="text/javascript " src="../libs/bootstrap/js/bootstrap.min.js "></script>
  <script src="../libs/bootstrap/js/popper.js"></script>
  <script type="text/javascript " src="../js/main.js "></script>
  <script type="text/javascript " src="../js/shop-script.js "></script>
  <script type="text/javascript " src="../libs/jquery/jquery.textchange.min.js "></script>
  <script type="text/javascript " src="../libs/jquery/jquery.form.js "></script>
  <script type="text/javascript " src="../libs/jquery/jquery.validate.js "></script>
  <script type="text/javascript " src="../fancybox/jquery.fancybox.js "></script>
  <script type="text/javascript " src="../js/jTabs.js "></script>
  <script src="../libs/bootstrap/js/bootstrap.min.js"></script>
</body>