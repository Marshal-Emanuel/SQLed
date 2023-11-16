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
    $tableNameUnique = $_POST['txtTableNameUnique'];
    $columnUnique = $_POST['txtColumnUnique'];

    // Generate a unique constraint name
    $constraintName = "unique_" . $tableNameUnique . "_" . $columnUnique;

    // Construct the ALTER TABLE query with UNIQUE CONSTRAINT
    $sql = "ALTER TABLE $tableNameUnique ADD CONSTRAINT $constraintName UNIQUE ($columnUnique)";

    // Execute the query
    $result = $conn->query($sql);

    // Display the result
    if ($result) {
        echo "Unique constraint added successfully.";
    } else {
        echo "Error executing query: " . $conn->error;
        echo "Query: $sql"; // Add this line for debugging
    }

    // Close the connection
    $conn->close();
}
?>
