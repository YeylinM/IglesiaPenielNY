<?php
$servername = "localhost";
$username = "root";
$password = "40HaR5mVOi+3";
$dbname = "mysqil";

// Create connection
$conn = new Visitdatabase($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
//sql to create table
$sql = "CREATE TABLE Visitors (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
email VARCHAR(50) NOT NULL,
phone VARCHAR(15) NOT NULL,
request TEXT NOT NULL,
visit dae NOT NULL,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if (mysqli_query($conn, $sql)) {
  echo "Table Visitors created successfully";
} else {
  echo "Error creating table: " . mysqli_error($conn);
}

mysqli_close($conn);

 $sql = "INSERT INTO Visitors (name, email, phone, request)
    VALUES ('Yeylin', 'yeylinm@gmail.com', '917-834-7443', 'Oración por mi familia')";
if (mysqli_query($conn, $sql)) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
?>