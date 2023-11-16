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
    $table1Join = $_POST['txtTable1Join'];
    $table2Join = $_POST['txtTable2Join'];
    $conditionJoin = $_POST['txtConditionJoin'];

    // Construct the JOIN query
    $sql = "SELECT * FROM $table1Join INNER JOIN $table2Join ON $conditionJoin";

    // Execute the query
    $result = $conn->query($sql);

    // Display the result
    if ($result) {
        if ($result->num_rows > 0) {
            echo "<table border='1'><tr>";

            // Display column names as table headers
            $fields = $result->fetch_fields();
            foreach ($fields as $field) {
                echo "<th>{$field->name}</th>";
            }

            echo "</tr>";

            // Display the data rows
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                foreach ($row as $value) {
                    echo "<td>{$value}</td>";
                }
                echo "</tr>";
            }

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
