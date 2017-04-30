<?php
  require_once 'db_connect.php';

  if($_POST)
  {
    $search = $_POST['search'];

    $query = "SELECT DISTINCT name FROM babynames WHERE name LIKE '". $search. "%' ORDER BY name LIMIT 5";
    $result = mysqli_query($db, $query);

    echo "<div class=\"suggest\">\n";

    while($row = mysqli_fetch_array($result))
    {
      $name = $row['name'];

      echo "<div class=\"show name\">\n" .
              $name .
            "</div>\n";
    }

    echo "</div>\n";
  }
?>
