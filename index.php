<?php
$servername = "localhost";
$username = "root";
$password = "redhat";
$dbname = "schoolinfo";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM studentinfo";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["srno"]. " - Name: " . $row["fullname"]. " " . $row["rollno"]." ".$row["class"]." ".$row["div"]. "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>
