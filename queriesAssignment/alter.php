<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Database connection details
$servername = "localhost";
$username = "root";
$password = "sudoAdmin123.";
$database = "supermarket_management";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Form data
$tableName = $_POST['txtTableNameAlter'];
$columnName = $_POST['txtColumnName'];
$dataType = $_POST['txtDataType'];

// Query for the alter action
$sql = "ALTER TABLE $tableName ADD $columnName $dataType";

// Execute the query
if ($conn->query($sql) === TRUE) {
    echo "Table altered successfully";
} else {
    echo "Error altering table: " . $conn->error;
}

// Close connection
$conn->close();
?>
