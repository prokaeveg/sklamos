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
          <form action="search.php?q=" method="GET">
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
                      <li><a class="dropdown-item" href="lk.php">Личный кабинет</a></li>
                      <li><a class="dropdown-item" href="php/logout.php">Выход</a></li>
                      <?php if ($_SESSION['admin'] == 1){ ?>
                      <li><a class="dropdown-item" href="admin/admin.php">Админка</a></li>
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
                 <div class="log-in"><a href="login.php">Login</a></div>
              <i class="fa fa-id-card-o" aria-hidden="true"></i>
            <?php } ?>
          </div></span>
          <span><a href="index.php" class="navigation-link">Главная</a></span>
          <span><a href="products.php" class="navigation-link">Товары</a></span>
          <span><a href="workers.php" class="navigation-link">Кладовщики</a></span>
          <span><a href="faq.php" class="navigation-link">FAQ</a></span>
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
              <li><a href="index.php" class="navigation-link">Главная</a></li>
              <li><a href="products.php" class="navigation-link">Товары</a></li>
              <li><a href="workers.php" class="navigation-link">Кладовщики</a></li>
              <li><a href="faq.php" class="navigation-link">FAQ</a></li>
            </ul>
          </div>
        </div>

        <!-- SEARCH BOX -->

        <div class="col-md-3 col-sm-4 search">
          <form action="search.php?q=" method="GET">

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
          <!-- <div class="modalDialog " id="openModal ">
            <div>
              <a href="#close " title="Закрыть ">X</a>
              <h2>Modal</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. In iure magni nulla nisi, quas asperiores quisquam modi iusto rerum sapiente. Pariatur at quibusdam doloremque repudiandae voluptatum nostrum omnis adipisci voluptatibus.</p>
            </div>
          </div> -->
      </div>
</nav>