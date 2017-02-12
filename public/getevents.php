<?php
$lat = floatval($_REQUEST['lat']);
$long = floatval($_REQUEST['long']);

$con = mysqli_connect('testprotest.cs2m9cuxqbvz.us-east-1.rds.amazonaws.com','ATAK','kevkev69','test1');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,'test1');
$sql="SELECT * FROM data";//figure out the sql query
$result = $con->query($sql);

//10,10,10,1
/*while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
    echo "<tr>";
    echo "<td><?php $row['ID'] ?></td>";
    echo "<td><?php $row['Lat'] ?></td>";
    echo "<td><?php $row['Long'] ?></td>";
    echo "<td><?php $row['Flag'] ?></td>";
    echo "</tr>";
}*/

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td> id: " . $row["ID"]. "</td></tr>";
    }
} else {
    echo "0 results";
}

mysqli_close($con);


?>