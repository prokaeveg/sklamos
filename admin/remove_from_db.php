<?php session_start(); 
  require ('../php/connect.php');
  if ($_SESSION['admin'] == 1) {

  if (!empty($_GET['del_id'])) {
    $id = $_GET['del_id'];
      $result = mysqli_query($connection, "DELETE FROM products WHERE product_id = $id");
      if($result)
      header('Location: remove_from_db.php');
      else echo 'fail';
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Удалить товар</title>
  <link rel="stylesheet" href="../libs/bootstrap/css/bootstrap-reboot.css">
  <link rel="stylesheet" href="../libs/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css&family=Lora:400,700|Muli:300,400,600,700,800&amp;subset=cyrillic-ext" rel="stylesheet">
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../css/logout.css">
  <link rel="stylesheet" href="../trackbar/trackbar.css">
  <link rel="stylesheet" href="../css/delete_product.css">

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

<div class="container">
  <div class="add_item">
    <a href="admin.php" class="button">Назад к админке</a>
  </div>
  <div class="row">

  <ul class="products-delete clearfix">
  <?php 
      $result = mysqli_query($connection , "SELECT * FROM products");
      if (mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_array($result);
        do{
          if ($row["image"] != "" && file_exists("../img/products/".$row["image"]))
          {
          $img_path = '../img/products/'.$row["image"];
          $max_width = 100;
          $max_height = 120;
          list($width, $height) = getimagesize($img_path);
          $ratioh = $max_height/$height;
          $ratiow = $max_width/$width;
          $ratio = min($ratioh, $ratiow);
          $width = intval($ratio*$width);
          $height = intval($ratio*$height);
          }else
          {
          $img_path = "../img/no_image.jpg";
          $width = 80;
          $height = 70;
          }
          echo '
            <li>
              <div class="image-list">
                <img src="'.$img_path.'" width="'.$width.'" height="'.$height.'">
              </div>
              <div class="row">
                <p class="title-list"><a href="">'.$row["title"].'</a></p>

                <a href="?del_id='.$row['product_id'].'" class="delete">delete нахуй</a>
              </div>

            </li>
          ';
        } while ($row = mysqli_fetch_array($result));
      }
      echo '</ul>';
   ?>
</div>
</div>
<?php require '../templates/footer.php' ?>
</div>
<?php require '../templates/scripts.php' ?>
   
<?php } else { ?>
  <div class="error_admin_roots">
    <p><strong>Сорян чувак, ты не обладаешь достаточными правами, </strong><a href="../products.php">вернуться обратно в каталог</a></p>

  </div>

<?php } ?>
</body>
</html>