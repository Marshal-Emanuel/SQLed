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
$table1 = $_POST['txtTable1Union'];
$table2 = $_POST['txtTable2Union'];

// Query for the union
$sql = "SELECT * FROM $table1 UNION SELECT * FROM $table2";

// Execute the query
$result = $conn->query($sql);

if ($result) {
    // Display the data rows
    echo "<table border='1'>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        foreach ($row as $columnValue) {
            echo "<td>$columnValue</td>";
        }
        echo "</tr>";
    }
    echo "</table>";

    // Free result set
    $result->free_result();
} else {
    echo "Error executing query: " . $conn->error;
}

// Close connection
$conn->close();
?>
