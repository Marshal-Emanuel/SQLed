<?php
// Replace [YOUR_DB_USERNAME], [YOUR_DB_PASSWORD], and [YOUR_DB_NAME] with your actual database credentials
$servername = "localhost";
$username = "root";
$password = "sudoAdmin123.";
$dbname = "your_database_name"; // Replace with your actual database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get user input from the form
$tableNameSelect = $_POST['txtTableNameSelect'];
$columnsSelect = $_POST['txtColumnsSelect'];
$conditionsSelect = $_POST['txtConditionsSelect'];

// Construct the SELECT query with dynamic columns and conditions
$sql = "SELECT $columnsSelect FROM $tableNameSelect";
if (!empty($conditionsSelect)) {
    $sql .= " WHERE $conditionsSelect";
}

// Execute the query
$result = $conn->query($sql);

// Display the results
if ($result) {
    echo "<h3>Results:</h3>";
    echo "<table border='1'><tr>";

    // Display column names
    $columns = explode(",", $columnsSelect);
    foreach ($columns as $column) {
        echo "<th>$column</th>";
    }

    echo "</tr>";

    // Display data
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        foreach ($columns as $column) {
            echo "<td>" . $row[$column] . "</td>";
        }
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "Error executing query: " . $conn->error;
}

// Close the connection
$conn->close();
?>
