<?php session_start(); 
  require ('php/connect.php');
  require ('functions/functions.php');

  $id = $_GET['id'];

  If ($id != $_SESSION['countid'])
  {
    $querycount = mysqli_query($connection, "SELECT count_view FROM products WHERE product_id='$id' AND visible='1'");
    $resultcount = mysqli_fetch_array($querycount); 

    $newcount = $resultcount["count_view"] + 1;

    $update = mysqli_query ($connection, "UPDATE products SET count_view='$newcount' WHERE product_id='$id'");  
  } else {}
  $_SESSION['countid'] = $id;

  
  $result = mysqli_query($connection , "SELECT * FROM products WHERE visible='1' AND product_id = '$id'");
  if (mysqli_num_rows($result) > 0){
    $row = mysqli_fetch_array($result);
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?php echo $row['title']; ?></title>
  <link rel="stylesheet" href="libs/bootstrap/css/bootstrap-reboot.css">
  <link rel="stylesheet" href="libs/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css&family=Lora:400,700|Muli:300,400,600,700,800&amp;subset=cyrillic-ext" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/logout.css">
  <link rel="stylesheet" src="fancybox/jquery.fancybox.css"></link>
  <link rel="stylesheet" href="trackbar/trackbar.css">
  <link rel="stylesheet" href="css/products.css">

</head>
<body>
<div class="wrapper">
<?php require 'templates/header.php' ?>

<div class="container">
  
  <?php if ($_SESSION['admin'] == 1) { ?>
      <div class="add_item">
        <a href="admin.php" class="button">Админ панель</a>
      </div>
      <?php } ?>
<div class="row">
  <div class="col-md-9">
    <?php   


      $result = mysqli_query($connection , "SELECT * FROM products WHERE visible='1' AND product_id = '$id'");
      if (mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_array($result);
        $type = $row['product_type'];
        switch ($type){
          case 'mobile':
            $type_content = 'Мобильные телефоны';
            break;
          case 'notebook':
            $type_content = 'Ноубуки';
            break;
          case 'notepad':
            $type_content = '
            Планшеты';
            break;
        }
        do {
          if (strlen($row['image']) > 0 && file_exists("img/products/".$row['image'])){
            $img_path = 'img/products/'.$row['image'];
            $max_width = 200;
            $max_height = 300;
            list($width, $height) = getimagesize($img_path);
            $ratioh = $max_height/$height;
            $ratiow = $max_width/$width;
            $ratio = min($ratioh, $ratiow);

            $width = intval($ratio*$width);
            $height = intval($ratio*$height);
          } else {
            $img_path = "img/products/no-image.png";
            $width = 100;
            $height = 200;
          }


          echo ' 
            <div class="breadcrums_and_rating">
              <p class="breadcrums"><a href="view_cat.php?type='.$type.'">'.$type_content.'</a> \ <span>'.$row['brand'].'</span></p>
            </div>
            <div class="content-info">
              <div class="row">
                <div class="col-md-4">
                <img src="'.$img_path.'" width = "'.$width.'" height = "'.$height.'">
              </div>
              <div class="col-md-8">
                <div class="mini_description">
                  <p class="content_title">'.$row['title'].'</p>

                  <ul class="reviews-comment-content">
                    <li><span class="view-svg"><i class="fa fa-eye"></i></span><p>'.$row["count_view"].'</p></li>
                    <li><span class="view-svg"><i class="fa fa-comment"></i></span><p>0</p></li>
                  </ul>
                
                <a class="add_cart" tid="'.$row['product_id'].'">Купить</a>

                <p class="content_price">'.group_numerals($row['price']).' руб</p>

                <p class="content_text">'.$row['mini_description'].'</p>
                </div>
              </div>
              </div>
                
            </div>
          ';
        } while ($row = mysqli_fetch_array($result));

        $result = mysqli_query($connection, "SELECT * FROM product_images WHERE product_id='$id'");
        If (mysqli_num_rows($result) > 0){
          $row = mysqli_fetch_array($result);
          echo '<div class="block-img-slide">
                <ul>';
          do {
              
            $img_path = 'img/uploads/'.$row["image"];
            $max_width = 70; 
            $max_height = 70; 
             list($width, $height) = getimagesize($img_path); 
            $ratioh = $max_height/$height; 
            $ratiow = $max_width/$width; 
            $ratio = min($ratioh, $ratiow); 

            $width = intval($ratio*$width); 
            $height = intval($ratio*$height);    
                
                
            echo '
            <li>
            <a data-fancybox="images" class="image-modal" href="#image'.$row["id"].'"><img src="'.$img_path.'" width="'.$width.'" height="'.$height.'" /></a>
            </li>
            <a style="display:none;" class="image-modal" rel="group" id="image'.$row["id"].'" ><img  src="img/uploads/'.$row["image"].'" /></a>
            ';
          }
           while ($row = mysqli_fetch_array($result));
         echo '
           </ul>
           </div>    
          ';
        }

        echo ' 
          <ul class="tabs">
            <li class="active"><a href="#">Описание</a></li>
            <li><a href="#">Характеристики</a></li>
            <li><a href="#">Отзывы</a></li>
          </ul>
          <div class="tabs_content">
            <div>Первая вкладка</div>
            <div>Вторая вкладка</div>
            <div>Третья закладка</div>
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
  
<script type="text/javascript">
  $(document).ready(function(){
    $(".image-modal").fancybox();
    $(".send-review").fancybox();
    $("ul.tabs").jTabs({content: ".tabs_content", animate: true, effect:"fade"});
  }); 
</script>
<?php require 'templates/scripts.php' ?>
   
</body>
</html>