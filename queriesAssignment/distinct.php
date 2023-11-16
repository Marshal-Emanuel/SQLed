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
    $tableNameDistinct = $_POST['txtTableNameDistinct'];
    $columnDistinct = $_POST['txtColumnDistinct'];

    // Construct the SELECT query with DISTINCT clause
    $sql = "SELECT DISTINCT $columnDistinct FROM $tableNameDistinct";

    // Execute the query
    $result = $conn->query($sql);

    // Display the results
    if ($result) {
        if ($result->num_rows > 0) {
            // Start the table
            echo "<table border='1'><tr>";

            // Display the table headers
            echo "<th>$columnDistinct</th></tr>";

            // Display the data rows
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row[$columnDistinct] . "</td>";
                echo "</tr>";
            }

            // Close the table
            echo "</table>";
        } else {
            echo "No results found.";
        }
    } else {
        echo "Error executing query: " . $conn->error;
        echo "Query: $sql"; // Add this line for debugging
    }

    // Close the connection
    $conn->close();
}
?>
