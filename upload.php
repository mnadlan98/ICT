<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ict";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO galeri (foto, judul) VALUES (LOAD_FILE('http://localhost/ICT/images/galery/1.jpg'),'SMKN 5 Bandung' )";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();


?>
<html>
<img src="../images/galery/1.jpg" alt="">
</html>