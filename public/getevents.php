<?php
$lat = floatval($_REQUEST['lat']);
$long = floatval($_REQUEST['long']);

try {
    $conn = new PDO("mysql:host=testprotest.cs2m9cuxqbvz.us-east-1.rds.amazonaws.com;dbname=test1", "ATAK", "kevkev69");
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	echo "connected"
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
}

$sql="SELECT * FROM data";//figure out the sql query
$result = $conn->query($sql);

//10,10,10,1
/*while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
    echo "<tr>";
    echo "<td><?php $row['ID'] ?></td>";
    echo "<td><?php $row['Lat'] ?></td>";
    echo "<td><?php $row['Long'] ?></td>";
    echo "<td><?php $row['Flag'] ?></td>";
    echo "</tr>";
}*/

while ($row = $stmt->fetch())
{
        echo "<tr><td> id: " . $row["ID"]. "</td></tr>";
}

$conn=null;

?>