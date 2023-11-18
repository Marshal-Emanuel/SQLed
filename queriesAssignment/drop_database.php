<?php
$servername = "localhost";
$username = "root";
$password = "sudoAdmin123.";
$databaseName = $_POST['txtDatabaseNameDrop'];

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the database exists before attempting to drop it
$result = $conn->query("SHOW DATABASES LIKE '$databaseName'");
if ($result->num_rows > 0) {
    // Construct the DROP DATABASE query
    $sql = "DROP DATABASE $databaseName";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        echo "Database '$databaseName' dropped successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Database '$databaseName' does not exist.";
}

// Close the connection
$conn->close();
?>
