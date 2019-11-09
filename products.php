<?php session_start(); 
  require ('php/connect.php');


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
  <title>Товары</title>
  <link rel="stylesheet" href="libs/bootstrap/css/bootstrap-reboot.css">
  <link rel="stylesheet" href="libs/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css&family=Lora:400,700|Muli:300,400,600,700,800&amp;subset=cyrillic-ext" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/logout.css">
  <link rel="stylesheet" href="trackbar/trackbar.css">
  <link rel="stylesheet" href="css/products.css">

</head>
<body>
<div class="wrapper">
<?php require 'templates/header.php' ?>

<div class="container">
  
  <?php if ($_SESSION['admin'] == 1) { ?>
      <div class="add_item">
        <a href="admin/admin.php" class="button">Админ панель</a>
      </div>
      <?php } ?>
  <div class="content">
    <div class="sorting">
      
      

      <p class="nav-breadcrumbs"><a href="index.php">Главная страница</a> \ <span>Все товары</span></p>
      
      <ul class="option-list">
        <li>Вид: </li>
        <li><a href="#" class="style-grid active"><i class="fa fa-th"></i></a></li>
        <li><a href="#" class="style-list"><i class="fa fa-list-ul"></i></a></li>

        <li>Сортировать:</li>
        <li><a class="select-sort" href="#"><?php echo $sort_name; ?></a>
          <ul class="sorting-list">
            <li><a href="products.php?sort=price-asc">От дешевых к дорогим</a></li>
            <li><a href="products.php?sort=price-desc">От дорогих к дешевым</a></li>
            <li><a href="products.php?sort=popular">Популярное</a></li>
            <li><a href="products.php?sort=new">Новинки</a></li>
            <li><a href="products.php?sort=brand">По алфавиту</a></li>
          </ul>
        </li>

      </ul>

    </div>


  </div>
<div class="row">
  <div class="col-md-9">
    <ul class="products-grid clearfix">
  <?php 

      $num = 10;
      $page = (int)($_GET['page']);

      $count = mysqli_query($connection, "SELECT COUNT(*) FROM products WHERE visible ='1'");
      $temp = mysqli_fetch_array($count);
      if ($temp[0] > 0){
        $tempcount = $temp[0];

        $total = (($tempcount - 1) / $num ) + 1;
        $total = intval($total);

        $page = intval($page);

        if (empty($page) or $page < 0) $page = 1;

        if ($page > $total) $page = $total;

        $start = $page  * $num - $num;

        $query_start_num = " LIMIT $start, $num";
      }

      $result = mysqli_query($connection , "SELECT * FROM products WHERE visible='1' ORDER BY $sorting $query_start_num");
      if (mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_array($result);
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
      }

   ?>

  </ul>

  <ul class="products-list clearfix">
  <?php 
      $result = mysqli_query($connection , "SELECT * FROM products WHERE visible='1' ORDER BY $sorting $query_start_num");
      if (mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_array($result);
        do{
          if ($row["image"] != "" && file_exists("./img/products/".$row["image"]))
          {
          $img_path = './img/products/'.$row["image"];
          $max_width = 120;
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
      }
      echo '</ul>';


if ($page != 1){ $pstr_prev = '<li><a class="pstr-prev" href="products.php?sort='.$sort.'&type='.$type.'&page='.($page - 1).'">&lt;</a></li>';}
if ($page != $total) $pstr_next = '<li><a class="pstr-next" href="products.php?sort='.$sort.'&type='.$type.'&page='.($page + 1).'">&gt;</a></li>';

                                    
// Формируем ссылки со страницами
if($page - 5 > 0) $page5left = '<li><a href="products.php?sort='.$sort.'&type='.$type.'&page='.($page - 5).'">'.($page - 5).'</a></li>';
if($page - 4 > 0) $page4left = '<li><a href="products.php?sort='.$sort.'&type='.$type.'&page='.($page - 4).'">'.($page - 4).'</a></li>';
if($page - 3 > 0) $page3left = '<li><a href="products.php?sort='.$sort.'&type='.$type.'&page='.($page - 3).'">'.($page - 3).'</a></li>';
if($page - 2 > 0) $page2left = '<li><a href="products.php?sort='.$sort.'&type='.$type.'&page='.($page - 2).'">'.($page - 2).'</a></li>';
if($page - 1 > 0) $page1left = '<li><a href="products.php?sort='.$sort.'&type='.$type.'&page='.($page - 1).'">'.($page - 1).'</a></li>';

if($page + 5 <= $total) $page5right = '<li><a href="products.php?sort='.$sort.'&type='.$type.'&page='.($page + 5).'">'.($page + 5).'</a></li>';
if($page + 4 <= $total) $page4right = '<li><a href="products.php?sort='.$sort.'&type='.$type.'&page='.($page + 4).'">'.($page + 4).'</a></li>';
if($page + 3 <= $total) $page3right = '<li><a href="products.php?sort='.$sort.'&type='.$type.'&page='.($page + 3).'">'.($page + 3).'</a></li>';
if($page + 2 <= $total) $page2right = '<li><a href="products.php?sort='.$sort.'&type='.$type.'&page='.($page + 2).'">'.($page + 2).'</a></li>';
if($page + 1 <= $total) $page1right = '<li><a href="products.php?sort='.$sort.'&type='.$type.'&page='.($page + 1).'">'.($page + 1).'</a></li>';

if ($page+5 < $total)
{
    $strtotal = '<li><p class="pagination-point">...</p></li><li><a href="products.php?sort='.$sort.'&type='.$type.'&page='.$total.'">'.$total.'</a></li>';
}else
{
    $strtotal = ""; 
}

if ($total > 1)
{
    echo '
    <div class="pagination">
      <ul>
      ';
        echo $pstr_prev.$page5left.$page4left.$page3left.$page2left.$page1left."<li><a class='pagination-active' href='products.php?sort='.$sort.'&type='.$type.'page=".$page."'>".$page."</a></li>".$page1right.$page2right.$page3right.$page4right.$page5right.$strtotal.$pstr_next;
      echo '
      </ul>
    </div>
    ';
}

   ?>

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
<?php echo $total; ?>
</div>
  
<?php require 'templates/scripts.php' ?>
   
</body>
</html>