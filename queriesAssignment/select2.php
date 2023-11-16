<?php
$servername = "localhost";
$username = "root";
$password = "sudoAdmin123.";
$dbname = "supermarket_management";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$tableNameSelect = $_POST['txtTableNameSelect'];
$columnsSelect = $_POST['txtColumnsSelect'];
$conditionColumn = $_POST['txtConditionColumn'];
$condition = $_POST['txtCondition'];
$conditionValue = $_POST['txtConditionValue'];

$sql = "SELECT $columnsSelect FROM $tableNameSelect WHERE $conditionColumn $condition '$conditionValue'";

$result = $conn->query($sql);

if ($result) {
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            print_r($row);
        }
    } else {
        echo "No results found";
    }
} else {
    echo "Error executing query: " . $conn->error;
}

$conn->close();
?>
