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
$tableNameUpdate = $_POST['txtTableNameUpdate'];
$columnName = $_POST['txtColumnName'];
$newValue = $_POST['txtNewValue'];
$conditionColumn = $_POST['txtConditionColumn'];
$conditionValue = $_POST['txtConditionValue'];

// Sanitize user inputs to prevent SQL injection
$tableNameUpdate = mysqli_real_escape_string($conn, $tableNameUpdate);
$columnName = mysqli_real_escape_string($conn, $columnName);
$newValue = mysqli_real_escape_string($conn, $newValue);
$conditionColumn = mysqli_real_escape_string($conn, $conditionColumn);
$conditionValue = mysqli_real_escape_string($conn, $conditionValue);

// Construct the UPDATE query
$sql = "UPDATE $tableNameUpdate SET $columnName = '$newValue' WHERE $conditionColumn = '$conditionValue'";

// Execute the query
if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

// Close the connection
$conn->close();
?>
