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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get values from the form
    $tableNameDefault = $_POST['txtTableNameDefault'];
    $columnDefault = $_POST['txtColumnDefault'];
    $defaultValue = $_POST['txtDefaultDefault'];

    // Construct the ALTER TABLE query with DEFAULT CONSTRAINT
    $sql = "ALTER TABLE $tableNameDefault ALTER COLUMN $columnDefault SET DEFAULT '$defaultValue'";

    // Execute the query
    $result = $conn->query($sql);

    // Display the result
    if ($result) {
        echo "Default constraint set successfully.";
    } else {
        echo "Error executing query: " . $conn->error;
        echo "Query: $sql"; // Add this line for debugging
    }

    // Close the connection
    $conn->close();
}
?>
