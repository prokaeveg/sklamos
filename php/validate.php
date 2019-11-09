<?php 
  require_once ('connect.php');
  require_once ('../functions/functions.php');

  if (!empty($_POST['save_submit'])){
    $title = $_POST['title'];
    $price = $_POST['price'];
    $price = check_symbol ($price, "Price", "1", "/^[0-9]/");
    $brand = $_POST['brand'];
    $brand = check_symbol ($brand, "Brand", "1", "/^[a-zA-Z]/");
    $image = $_POST['image'];
    $image = check_symbol ($image, "Image", "1", "/^[a-zA-Z0-9 ._-]\S+(?:jpg|jpeg|png)$/");
    $features = $_POST['features'];
    $features = check_symbol ($features, "Mini features", "1", "/[а-яёА-ЯЁa-zA-Z0-9]/");
    $datetime = $_POST['datetime'];
    $datetime = check_symbol ($datetime, "Datetime", "1", "/^[0-9]{4}+.[0-9]{2}+.[0-9]{2}+.[0-9]{2}+.[0-9]{2}+.[0-9]{2}$/");
    $type = $_POST['type'];
    $type = check_symbol ($type, "Product type", "1", "/^[a-z]/");
    if (!empty($GLOBALS['alert'])) {
      $GLOBALS['alert'] = 'Данные из формы не отправлены. Обнаружены следующие ошибки: \n'.$GLOBALS['alert'];
      require "alert.php";
    }


    
  }

 ?>