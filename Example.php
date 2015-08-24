<html>
<head>
<style>
table, th, td {
     border: 1px solid black;
}
</style>
</head>
<body>



<?php

$servername = "danu6.it.nuigalway.ie";
$username = "mydb1987e";
$password = "mydb1987e";
$dbname = "mydb1987";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
 } 

$sql = "SELECT Quantity, SalePrice, Name FROM communistSupplies WHERE Quantity > 0 ORDER BY SalePrice DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr><th>Quantity</th><th>Price</th><th>Name</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["Quantity"]."</td><td>".$row["SalePrice"]."</td><td>".$row["Name"]."</td></tr>";
		//<td>"<img src=\"images/". $row['image'] . "</td>
			echo "<tr><td width=200>";
                         // Note that we are building our src string using the filename from the database
			
                        
                        

    }
    echo "</table>";
} else {
    echo "0 results";
}
 $conn->close();
?> 

</body>
</html>

