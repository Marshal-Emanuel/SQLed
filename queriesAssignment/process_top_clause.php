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

// Get values from the form
$tableNameTop = $_POST['txtTableNameTop'];
$limitTop = $_POST['txtLimitTop'];

// Construct the SELECT query with TOP clause
$sql = "SELECT * FROM $tableNameTop LIMIT $limitTop";

// Execute the query
$result = $conn->query($sql);

// Display the results dynamically
if ($result->num_rows > 0) {
    echo "<table border='1'><tr>";

    // Fetch column names dynamically
    while ($fieldinfo = $result->fetch_field()) {
        echo "<th>{$fieldinfo->name}</th>";
    }

    echo "</tr>";

    // Fetch and display data
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        foreach ($row as $value) {
            echo "<td>{$value}</td>";
        }
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "No matching records found.";
}

// Close the connection
$conn->close();
?>
