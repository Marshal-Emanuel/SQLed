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
    $tableNameSorting = $_POST['txtTableNameSorting'];
    $columnSorting = $_POST['txtColumnSorting'];
    $orderSorting = $_POST['txtOrderSorting'];

    // Construct the SELECT query with ORDER BY clause
    $sql = "SELECT * FROM $tableNameSorting ORDER BY $columnSorting $orderSorting";

    // Execute the query
    $result = $conn->query($sql);

    // Display the results
    if ($result) {
        if ($result->num_rows > 0) {
            // Start the table
            echo "<table border='1'><tr>";

            // Fetch the column names and display as table headers
            $result->fetch_assoc();
            $columnNames = array_keys($result->fetch_assoc());
            echo "<th>" . implode("</th><th>", $columnNames) . "</th></tr>";

            // Rewind the result set back to the beginning
            $result->data_seek(0);

            // Display the data rows
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                foreach ($row as $columnValue) {
                    echo "<td>" . $columnValue . "</td>";
                }
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
