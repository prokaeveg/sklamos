<?php 
	if (!empty($_GET["start_price"]) && !empty($_GET["end_price"])){
		$start_price = $_GET["start_price"];
		$end_price = $_GET["end_price"];
	} else if (!empty($_GET["start_price"]) && empty($_GET["end_price"])){
		$start_price = $_GET["start_price"];
		$end_price = "";
	} else if (empty($_GET["start_price"]) && !empty($_GET["end_price"])){
		$start_price = "";
		$end_price = $_GET["end_price"];
	} else if (empty($_GET["start_price"]) && empty($_GET["end_price"])){
		$start_price = "1000";
		$end_price = "50000";
	}
 ?>

  <div class="block-parameters">
    <p class="header-title">Поиск по параметрам</p>
    <p class="title-filter">Стоимость</p>
    <form action="search_filter.php" method="GET">
      <div class="input-price clearfix">
        <ul>
          <li>
            <p>от</p>
          </li>
          <?php echo '<li><input type="text" id="start-price" name="start_price" value="'.$start_price.'"></li>' ?>
            <li>
              <p>до</p>
            </li>
            <?php echo ' <li><input type="text" id="end-price" name="end_price" value="'.$end_price.'"></li>' ?>
              <li>
                <p>руб</p>
              </li>
        </ul>
      </div>
      <div id="trackbar">Тут должен быть трекбар</div>

      <p class="title-filter">Производители</p>
      <ul class="checkbox-brand">

        <?php 
			    $result = mysqli_query($connection , "SELECT * FROM categories WHERE product_type='mobile'");
      			if (mysqli_num_rows($result) > 0){
        		$row = mysqli_fetch_array($result);

        		do{
        			$cheked_brand = "";
        			if ($_GET["brand"]){
        				if (in_array($row["id"], $_GET["brand"])){
        					$cheked_brand = "checked";
        				}
        			}

        			echo ' <li><input '.$cheked_brand.' type="checkbox" name="brand[]" value="'.$row["id"].'" id="checkbrand'.$row["id"].'"><label for="checkbrand'.$row["id"].'">'.$row["brand"].'</label></li> ';
        		} while ($row = mysqli_fetch_array($result));
        	}
			?>
      </ul>

      <center>
        <button type="submit" name="submit" class="button-search-price"><span>Найти</span></button>
      </center>
    </form>
  </div>