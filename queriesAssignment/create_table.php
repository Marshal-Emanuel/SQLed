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

// Get user input from the form 
$tableName = $_POST['txtTableNameCreate'];
$column1Name = $_POST['txtColumn1Name'];
$column1Type = $_POST['ddlColumn1Type'];
$column2Name = $_POST['txtColumn2Name']; 
$column2Type = $_POST['ddlColumn2Type'];

// Construct the CREATE TABLE query 
$sql = "CREATE TABLE $tableName ($column1Name $column1Type, $column2Name $column2Type)";

// Execute the query
if ($conn->query($sql) === TRUE) { 
    echo "Table created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

// Close the connection
$conn->close();
?>
