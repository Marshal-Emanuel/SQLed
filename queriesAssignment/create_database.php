<?php
// Replace [YOUR_DB_USERNAME] and [YOUR_DB_PASSWORD] with your actual database credentials
$servername = "localhost";
$username = "root";
$password = "sudoAdmin123.";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get user input from the form
$databaseName = $_POST['txtDatabaseName'];

// Construct the CREATE DATABASE query
$sql = "CREATE DATABASE $databaseName";

// Execute the query
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the connection
$conn->close();
?>
