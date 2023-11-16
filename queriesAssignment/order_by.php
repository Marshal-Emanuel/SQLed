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
    $tableNameOrderBy = $_POST['txtTableNameOrderBy'];
    $columnsOrderBy = $_POST['txtColumnsOrderBy'];
    $orderOrderBy = $_POST['txtOrderOrderBy'];

    // Construct the SELECT query with ORDER BY clause
    $sql = "SELECT * FROM $tableNameOrderBy ORDER BY $columnsOrderBy $orderOrderBy";

    // Execute the query
    $result = $conn->query($sql);

    // Display the results
    if ($result) {
        if ($result->num_rows > 0) {
            // Fetch one row to get column names
            $row = $result->fetch_assoc();

            // Start the table
            echo "<table border='1'><tr>";

            // Display the table headers using column names
            foreach ($row as $columnName => $columnValue) {
                echo "<th>$columnName</th>";
            }
            echo "</tr>";

            // Rewind the result set back to the beginning
            $result->data_seek(0);

            // Display the data rows
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";

                // Display the column values
                foreach ($row as $columnValue) {
                    echo "<td>$columnValue</td>";
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
