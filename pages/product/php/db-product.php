<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Database connection details
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'UrbanGooDs';

// Create a connection
$conn = new mysqli($host, $user, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if 'id' is set in the GET request
$id = $_GET['id'] ?? null;
if (!$id) {
    header('Location: ../../homepage/html/homepage.php');
    exit;
}

// Prepare and execute the SQL statement
$stmt = $conn->prepare('SELECT * FROM urbangoods_products_crud WHERE ID = ? LIMIT 1');
$stmt->bind_param('i', $id);
$stmt->execute();
$result = $stmt->get_result();

// Fetch data
if ($row = $result->fetch_assoc()) {
    // Convert row to JSON format
    echo json_encode($row);
} else {
    // Send an empty JSON object if no product is found
    echo json_encode([]);
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>
