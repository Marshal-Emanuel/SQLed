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
    $tableNameGroupBy = $_POST['txtTableNameGroupBy'];
    $groupByColumn = $_POST['txtGroupByColumn'];
    $countColumn = $_POST['txtCountColumn'];

    // Construct the SELECT query with GROUP BY clause
    $sql = "SELECT COUNT($countColumn), $groupByColumn FROM $tableNameGroupBy GROUP BY $groupByColumn";

    // Execute the query
    $result = $conn->query($sql);

    // Display the results
    if ($result) {
        if ($result->num_rows > 0) {
            // Start the table
            echo "<table border='1'><tr>";

            // Display the table headers
            echo "<th>Count</th><th>$groupByColumn</th></tr>";

            // Display the data rows
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['COUNT(' . $countColumn . ')'] . "</td>";
                echo "<td>" . $row[$groupByColumn] . "</td>";
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
