<?php
$lat = floatval($_REQUEST['lat']);
$long = floatval($_REQUEST['long']);


$con = mysqli_connect('testprotest.cs2m9cuxqbvz.us-east-1.rds.amazonaws.com','ATAK','kevkev69','test1');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,'test1');
$sql="SELECT * FROM data";//figure out the sql query
$result = mysqli_query($con,$sql);

//10,10,10,1
while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
    echo "<tr>";
    echo "<td> . $row['ID'] . </td>";
    echo "<td> . $row['Lat'] . </td>";
    echo "<td> . $row['Long'] . </td>";
    echo "<td> . $row['Flag'] . </td>";
    echo "</tr>";
}

mysqli_close($con);


?>