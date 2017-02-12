<?php
//$servername = "testprotest.cs2m9cuxqbvz.us-east-1.rds.amazonaws.com";
$username = "ATAK";
$password = "kevkev69";
//$dbname = "test1";

try {
    $conn = new PDO("mysql: host=testprotest.cs2m9cuxqbvz.us-east-1.rds.amazonaws.com;port=5432;dbname=test1", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT * FROM data");
    $stmt->execute();

    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
	while ($row = $stmt->fetch()){
		echo "<tr><td> id: " . $row["ID"]. "</td></tr>";
	}
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
?> 