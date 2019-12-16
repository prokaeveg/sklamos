<?php session_start(); ?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <title>SKLAD</title>
    <link rel="stylesheet" href="libs/bootstrap/css/bootstrap-reboot.css">
    <link rel="stylesheet" href="libs/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css&family=Lora:400,700|Muli:300,400,600,700,800&amp;subset=cyrillic-ext">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/logout.css">
  </head>

  <body>
    <div id="progressbar"></div>
    <div class="wrapper ">
      <?php require 'templates/header.php' ?>
        <div class="content">

          <div class="header container">
            Поставщики
          </div>
          <div class="container">
            <div class="product">
              <div class="row">
                <div class="products">
                  <a href="view_cat.php?type=mobile">
                    <div class="mainTitle">
                      <div class="main_image"><img src="img/main_pictures/phones.jpg" alt="food"></div>
                      <h3>
                Телефоны
              </h3>
                    </div>
                  </a>
                </div>
              </div>
            </div>
            <div class="product">
              <div class="row">
                <div class="products">
                  <a href="view_cat.php?type=notepad">
                    <div class="mainTitle">
                      <div class="main_image"><img src="img/main_pictures/laptops.jpg" alt="food"></div>
                      <h3>
                Планшеты
              </h3>
                    </div>
                  </a>
                </div>
              </div>
            </div>
            <div class="product">
              <div class="row">
                <div class="products">
                  <a href="view_cat.php?type=notebook">
                    <div class="mainTitle">
                      <div class="main_image"><img src="img/main_pictures/netbooks.jpg" alt="food"></div>
                      <h3>
                Ноутбуки
              </h3>
                    </div>
                  </a>
                </div>
              </div>
            </div>
          </div>

          <!-- <div class="container">
    <div class="product-small">
      <div class="row">
        <div class="col-md-6">
          <div class="product-secondary">
            <a href="#">
              <img src="img/main_pictures/building_materials.jpg" alt="">
              <div class="secondaryTitle">
                <div class="Left">
                  <h4>
                  Строительные и тругие материалы
                </h4>
                </div>
              </div>
            </a>
          </div>
        </div>
        <div class="col-md-6">
          <div class="product-secondary">
            <a href="#">
              <img src="img/main_pictures/childrens_dolls.jpg" alt="building">
              <div class="secondaryTitle">
                <div class="Right">
                  <h4>
                  Детские товары
                  </h4>
                </div>
              </div>
            </a>
          </div>
        </div>
      </div>
    </div>
    <div class="product-small">
      <div class="row">
        <div class="col-md-6">
          <div class="product-secondary">
            <a href="#">
              <img src="img/main_pictures/equipment.jpg" alt="">
              <div class="secondaryTitle">
                <div class="Left">
                  <h4>
                  Оборудование
                </h4>
                </div>
              </div>
            </a>
          </div>
        </div>
        <div class="col-md-6">
          <div class="product-secondary">
            <a href="#">
              <img src="img/main_pictures/auto_moto.jpg" alt="building">
              <div class="secondaryTitle">
                <div class="Right">
                  <h4>
                  Авто-мото
                  </h4>
                </div>
              </div>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div> -->

          <?php require 'templates/footer.php' ?>
        </div>

        <?php require 'templates/scripts.php' ?>
  </body>

</html>