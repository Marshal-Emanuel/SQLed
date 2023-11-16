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
$tableName = $_POST['txtTableNameAnd'];
$condition1 = $_POST['txtCondition1And'];
$condition2 = $_POST['txtCondition2And'];

// Query with the AND clause
$sql = "SELECT * FROM $tableName WHERE $condition1 AND $condition2";

// Execute the query
$result = $conn->query($sql);

// Display the results
if ($result) {
    if ($result->num_rows > 0) {
        echo "<table border='1'><tr>";
        
        // Fetch column names
        $row = $result->fetch_assoc();
        foreach ($row as $columnName => $columnValue) {
            echo "<th>$columnName</th>";
        }
        echo "</tr>";

        // Rewind the result set back to the beginning
        $result->data_seek(0);

        // Display data rows
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            foreach ($row as $columnValue) {
                echo "<td>$columnValue</td>";
            }
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "No results found.";
    }
} else {
    echo "Error executing query: " . $conn->error;
}

// Close connection
$conn->close();
?>
