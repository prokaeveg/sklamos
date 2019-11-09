<?php 
  require ('php/connect.php');
  require ('functions/functions.php');

  if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $search = clear_string($_POST['text'], $connection);
    $result_search = mysqli_query($connection, "SELECT * FROM products WHERE title LIKE '%search' AND visible = '1'");

    if (mysqli_num_rows($result_search > 0)){
      $result_search = mysqli_query($connection, "SELECT * FROM products WHERE title LIKE '%search' AND visible = '1' LIMIT 10");
      $row = mysqli_fetch_array($result_search);
      do {
        echo ' 
          <li><a href="search.php?q='.$row["title"].'">'.$row["title"].'</a></li>
         ';
      } while ($row = mysqli_fetch_array($result_search));
    }
  }
?>