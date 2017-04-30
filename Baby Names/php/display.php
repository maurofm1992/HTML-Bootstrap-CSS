
<?php
require_once './db_connect.php';


$result = mysqli_query($db,"SELECT * FROM BABYNAMES");

echo "<table border='1'>
<tr>
<th>firstname</th>
<th>gender</th>
<th>total_votes</th>
</tr>";

while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['firstname'] . "</td>";
echo "<td>" . $row['gender'] . "</td>";
echo "<td>" . $row['total_values'] . "</td>";

echo "</tr>";
}
echo "</table>";

mysqli_close($db);
?>