<?php session_start(); 
  require ('php/connect.php');
  require ('functions/functions.php');

  $cat = clear_string($_GET["cat"], $connection);
  $type = clear_string($_GET["type"], $connection);
  $start_price = clear_string($_GET["start_price"], $connection);
  $end_price = clear_string($_GET["end_price"], $connection);

    if(isset($_GET['sort'])) {
        $sorting = $_GET['sort'];
  }

  switch ($sorting) {

    case 'price-asc':
      $sorting = 'price ASC';
      $sort = 'price-asc';
      $sort_name = 'От дешевых к дорогим';
      break;
    case 'price-desc':
      $sorting = 'price DESC';
      $sort = 'price-desc';
      $sort_name = 'От дорогих к дешевым';
      break;
    case 'popular':
      $sorting = 'count_view DESC';
      $sort = 'popular';
      $sort_name = 'Популярные';
      break;
    case 'new':
      $sorting = 'datetime DESC';
      $sort = 'new';
      $sort_name = 'Новинки';
      break;
    case 'brand':
      $sorting = 'brand';
      $sort = 'brand';
      $sort_name = 'По алфавиту';
      break;
    default:
      $sorting = 'product_id';
      $sort = '';
      $sort_name = 'Без сортировки';
      break;

  }

  

?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <title>Поиск по параметрам</title>
    <link rel="stylesheet" href="libs/bootstrap/css/bootstrap-reboot.css">
    <link rel="stylesheet" href="libs/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css&family=Lora:400,700|Muli:300,400,600,700,800&amp;subset=cyrillic-ext" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/products.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/logout.css">
    <link rel="stylesheet" href="trackbar/trackbar.css">

  </head>

  <body>
    <div id="progressbar"></div>
    <div class="wrapper">
      <?php require 'templates/header.php' ?>

        <div class="content">
          <div class="container">
            <?php if ($_SESSION['admin'] == 1) { ?>
              <div class="add_item">
                <a href="admin/admin.php" class="button">Админ панель</a>
              </div>
              <?php } ?>

                <div class="row">
                  <div class="col-md-9">
                    <ul class="products-grid clearfix">
                      <?php 

      if ($_GET["brand"]){
        $check_brand = implode(',', $_GET["brand"]);
      }
      $start_price = (int)$_GET["start_price"];
      $end_price = (int)$_GET["end_price"];

      $array = explode(",",$check_brand);
      $count = 0;
      while($rowa = each($array)) {
          $count++;
      }
      $brand_filter="";
      $temp = $count;
      $count = 0;
      while($count < $temp) {
          $brand_filter.='&brand='.$array[$count].'';
          $count ++;
      }
      echo $brand_filter;
      if (!empty($check_brand) || !empty($end_price)){
        if (!empty($check_brand)) $query_brand = " AND brand_id IN($check_brand)";
        if (!empty($end_price)) $query_price = "AND price BETWEEN  $start_price AND $end_price";
      }

      $result = mysqli_query($connection , "SELECT * FROM products WHERE visible='1' $query_brand $query_price $querycat ORDER BY product_id DESC");
      if (mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_array($result);
       echo '
       <div class="sorting">
      
      <p class="nav-breadcrumbs"><a href="index.php">Главная страница</a> \ <span>Все товары</span></p>
      
      <ul class="option-list">
        <li>Вид: </li>
        <li><a href="#" class="style-grid"><i class="fa fa-th"></i></a></li>
        <li><a href="#" class="style-list"><i class="fa fa-list-ul"></i></a></li>

        <li>Сортировать:</li>
        <li><a class="select-sort" href="#">'.$sort_name.'</a>
          <ul class="sorting-list">
            <li><a href="search_filter.php?start_price='.$start_price.'&end_price='.$end_price.'&sort=price-asc">От дешевых к дорогим</a></li>
            <li><a href="search_filter.php?start_price='.$start_price.'&end_price='.$end_price.'&sort=price-desc">От дорогих к дешевым</a></li>
            <li><a href="search_filter.php?start_price='.$start_price.'&end_price='.$end_price.'&sort=popular">Популярное</a></li>
            <li><a href="search_filter.php?start_price='.$start_price.'&end_price='.$end_price.'&sort=new">Новинки</a></li>
            <li><a href="search_filter.php?start_price='.$start_price.'&end_price='.$end_price.'&sort=brand">По алфавиту</a></li>
          </ul>
        </li>

      </ul>

    </div> ';
        do{
          if ($row["image"] != "" && file_exists("./img/products/".$row["image"]))
          {
          $img_path = './img/products/'.$row["image"];  
          $max_width = 200;
          $max_height = 200;
          list($width, $height) = getimagesize($img_path);
          $ratioh = $max_height/$height;
          $ratiow = $max_width/$width;
          $ratio = min($ratioh, $ratiow);
          $width = intval($ratio*$width);
          $height = intval($ratio*$height);
          }else
          {
          $img_path = "img/no_image.jpg";
          $width = 110;
          $height = 200;
          }
          echo '
            <li>
              <div class="image-grid">
                <img src="'.$img_path.'" width="'.$width.'" height="'.$height.'">
              </div>
              <p class="title-grid"><a href="view_content.php?id='.$row['product_id'].'">'.$row["title"].'</a></p>
              <ul class="reviews-comment-grid">
                <li><span class="view-svg"><i class="fa fa-eye"></i></span><p>'.$row["count_view"].'</p></li>
                <li><span class="view-svg"><i class="fa fa-comment"></i></span><p>0</p></li>
              </ul>
              <div class="cart-and-price">
              <a class="add-to-cart-grid"><i class="fa fa-cart-plus"></i></a>
              <p class="price-grid"><strong>'.$row["price"].'</strong> руб.</p>
              </div>
              <div class="mini-feature">
                '.$row["mini_features"].'
              </div>
            </li>
          ';
        } while ($row = mysqli_fetch_array($result));
      }else {
      echo ' <p class="nav-breadcrumbs"><a href="view_cat.php?cat=&type='.$type.'">Все товары</a></p>
      <h3>Категория не доступна или не создана</h3>';
    }

   ?>

                    </ul>

                    <ul class="products-list clearfix">
                      <?php 
      $result = mysqli_query($connection , "SELECT * FROM products WHERE visible='1' $query_brand $query_price $querycat ORDER BY product_id DESC");
      if (mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_array($result);
        echo '<div class="sorting">
      
      <p class="nav-breadcrumbs"><a href="index.php">Главная страница</a> \ <span>Все товары</span></p>
      
      <ul class="option-list">
        <li>Вид: </li>
        <li><a href="#" class="style-grid"><i class="fa fa-th"></i></a></li>
        <li><a href="#" class="style-list"><i class="fa fa-list-ul"></i></a></li>

        <li>Сортировать:</li>
        <li><a class="select-sort" href="#">'.$sort_name.'</a>
          <ul class="sorting-list">
            <li><a href="search_filter.php?start_price='.$start_price.'&end_price='.$end_price.'&sort=price-asc">От дешевых к дорогим</a></li>
            <li><a href="search_filter.php?start_price='.$start_price.'&end_price='.$end_price.'&sort=price-desc">От дорогих к дешевым</a></li>
            <li><a href="search_filter.php?start_price='.$start_price.'&end_price='.$end_price.'&sort=popular">Популярное</a></li>
            <li><a href="search_filter.php?start_price='.$start_price.'&end_price='.$end_price.'&sort=new">Новинки</a></li>
            <li><a href="search_filter.php?start_price='.$start_price.'&end_price='.$end_price.'&sort=brand">По алфавиту</a></li>
          </ul>
        </li>

      </ul>

    </div>';
        do{
          if ($row["image"] != "" && file_exists("./img/products/".$row["image"]))
          {
          $img_path = './img/products/'.$row["image"];
          $max_width = 150;
          $max_height = 150;
          list($width, $height) = getimagesize($img_path);
          $ratioh = $max_height/$height;
          $ratiow = $max_width/$width;
          $ratio = min($ratioh, $ratiow);
          $width = intval($ratio*$width);
          $height = intval($ratio*$height);
          }else
          {
          $img_path = "img/no_image.jpg";
          $width = 80;
          $height = 70;
          }
          echo '
            <li>
              <div class="image-list">
                <img src="'.$img_path.'" width="'.$width.'" height="'.$height.'">
              </div>


              <ul class="reviews-comment-list">
                <li><span class="view-svg"><i class="fa fa-eye"></i></span><p>'.$row["count_view"].'</p></li>
                <li><span class="view-svg"><i class="fa fa-comment"></i></span><p>0</p></li>
              </ul>

              <p class="title-list"><a href="view_content.php?id='.$row['product_id'].'">'.$row["title"].'</a></p>

              <a class="add-to-cart-list"><i class="fa fa-cart-plus"></i></a>
              <p class="price-list"><strong>'.$row["price"].'</strong> руб.</p>
              <div class="text-list">
                '.$row["mini_description"].'
              </div>
            </li>
          ';
        } while ($row = mysqli_fetch_array($result));
      } else {
      echo ' <p class="nav-breadcrumbs"><a href="view_cat.php?cat=&type='.$type.'">Все товары</a></p>
      <h3>Категория не доступна или не создана</h3>';
    }

   ?>

                    </ul>
                  </div>
                  <div class="col-md-3">
                    <div class="block-right">
                      <?php require 'templates/categories.php';
      require 'templates/parameters.php' ;
      require 'templates/news.php'?>
                    </div>
                  </div>
                </div>
          </div>

          <?php require 'templates/footer.php' ?>
        </div>
    </div>

    <?php require 'templates/scripts.php' ?>
      <script type="text/javascript">
        trackbar.getObject('one').init({
            onMove: function() {
              document.getElementById("start-price").value = this.leftValue;
              document.getElementById("end-price").value = this.rightValue;
            },
            width: 160,
            leftLimit: 1000,
            leftValue: 1000,
            rightLimit: 50000,
            rightValue: 30000,
            roundUp: 1000
          },
          "trackbar"
        );
      </script>
  </body>

  </html>