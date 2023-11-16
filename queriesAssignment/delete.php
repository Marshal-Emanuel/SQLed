<?php
$servername = "localhost";
$username = "root";
$password = "sudoAdmin123.";
$dbname = "supermarket_management";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get user input from the form
$tableNameDelete = $_POST['txtTableNameDelete'];
$conditionColumn = $_POST['txtConditionColumn'];
$conditionValue = $_POST['txtConditionValue'];

// Prevent SQL injection
$tableNameDelete = mysqli_real_escape_string($conn, $tableNameDelete);
$conditionColumn = mysqli_real_escape_string($conn, $conditionColumn);
$conditionValue = mysqli_real_escape_string($conn, $conditionValue);

// Construct the DELETE query
$sql = "DELETE FROM $tableNameDelete WHERE $conditionColumn = '$conditionValue'";

// Execute the query
if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}

// Close the connection
$conn->close();
?>
