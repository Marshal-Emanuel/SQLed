<?php
// Replace [YOUR_DB_USERNAME], [YOUR_DB_PASSWORD], and [YOUR_DB_NAME] with your actual database credentials
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
$tableName = $_POST['txtTableNameDrop'];

// Construct the DROP TABLE query
$sql = "DROP TABLE $tableName";

// Execute the query
if ($conn->query($sql) === TRUE) {
    echo "Table dropped successfully";
} else {
    echo "Error dropping table: " . $conn->error;
}

// Close the connection
$conn->close();
?>
