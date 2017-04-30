<?php
require_once './db_connect.php';
?>

    

<?php
$f = fopen("yob2014.txt", "r");
while(!feof($f)) { 
  $data = explode(",", fgets($f));

$sql = "INSERT INTO `BABYNAMES` (firstname, gender, total_values)
 VALUES ('".$data[0]."', '".$data[1]."', '".$data[2]."')";

if ($db->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $db->error;
}



  
}
fclose($f);
?>


