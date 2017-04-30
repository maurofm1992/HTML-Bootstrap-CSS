<?php
require_once './db_connect.php';
?>

<?php
$firstname= $_POST['fname'] ;
$gender= $_POST['gender'];

echo $gender;
echo $firstname;
$uno= 1;


    $query = mysqli_query($db, "SELECT * FROM `BABYNAMES` WHERE `firstname`='$firstname' AND `gender` = '$gender' ");
	$row = mysqli_fetch_array($query);
    echo $row['firstname'];
    echo $row['total_values'];
if ( $row['firstname'] == "")
{
 $query = mysqli_query($db, " INSERT INTO `BABYNAMES`( `firstname`, `gender`, `total_values`) VALUES ( '$firstname', '$gender' , '$uno')");

	$db->query($query) ;
} 
else
{
	$total_values= $row['total_values'] + 1;

	$query = mysqli_query ( $db, "UPDATE `BABYNAMES` SET `total_values`= '$total_values' WHERE `firstname`= '$firstname' AND `gender`= '$gender' "); 
	$db->query($query) ;

}
	
	header("location: http://lamp.cse.fau.edu/~mdagraca2015/p4/index.php");


exit();






?>