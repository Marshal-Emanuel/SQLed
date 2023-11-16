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
$field = $_POST['txtField'];
$table = $_POST['txtTable'];

// Construct the SELECT query
$sql = "SELECT $field FROM $table";

// Execute the query
$result = $conn->query($sql);

// Display the results
if ($result) {
    if ($result->num_rows > 0) {
        echo "<h4>Results:</h4>";
        echo "<table><tr><th>$field</th></tr>";
        // Output data of each row
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row[$field] . "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "<p>No results found.</p>";
    }
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the connection
$conn->close();
?>
