<!DOCTYPE html>
<html>

<head>
    <title>Gender Vote</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css" />
    <link rel="stylesheet" href="./css/style.css"/>

    <body>
        <div class="container">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3>Vote for your favorite baby boy girl name</h3></div>
                <div class="panel-body">
                    <form class="form-inline" action="./php/insert.php" method="post" role="form">
                        <div class="form-group">
                            <label for="usr">Name:</label>
                            <input type="text" class="form-control" id="usr" name="fname"> </div>
                        <div class="form-group">
                            <label for="Gender">Gender:</label>
                            <select id="name" class="form-control" id="Gender" name="gender" onchange="Change(this)">
                                <option value="M">Boy</option>
                                <option value="F">Girl</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-default">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3>Most Popular Names</h3></div>
                <div class="panel-body">
                    <?php
require_once './php/db_connect.php';
$result = mysqli_query($db,"SELECT * FROM `BABYNAMES` ORDER BY `total_values` DESC LIMIT 10 ");

echo "
<table class='table table-striped'>
  <thead>
    <tr>
     
<th>First Name</th>
<th>Gender</th>
<th>Total Values</th>
</tr>
</thead>
<tbody>
";




while($row = mysqli_fetch_array($result))
{
echo "<tr>";

echo "<td>" . $row['firstname'] . "</td>";
echo "<td>" . $row['gender'] . "</td>";
echo "<td>" . $row['total_values'] . "</td>";
echo "</tr>";
}
echo "</tbody>";
echo "</table>";


?>
                </div>
            </div>
        </div>
        
        <!-- jQuery -->
        <script src="js/jquery.js"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>
        
        <script src="js/app.js"></script>
    </body>

</html>