<?php
$servername = "localhost";
$username = "root";
$password = "sudoAdmin123.";
$dbname = "supermarket_management";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$tableNameInsert = $_POST['txtTableNameInsert'];
$value1Insert = $_POST['txtValue1Insert'];
$value2Insert = $_POST['txtValue2Insert'];

$sql = "INSERT INTO $tableNameInsert (number, name) VALUES ('$value1Insert', '$value2Insert')";

if ($conn->query($sql) === TRUE) {
    echo "Values inserted successfully";
} else {
    echo "Error inserting values: " . $conn->error;
}

$conn->close();
?>
