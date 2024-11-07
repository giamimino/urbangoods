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
    die(json_encode(['success' => false, 'message' => 'Connection failed: ' . $conn->connect_error]));
}

// Get data from the request
$data = json_decode(file_get_contents('php://input'), true);
$productId = $data['id'] ?? null; // Make sure this matches what you send from JS
$quantity = $data['quantity'] ?? null;

// Validate the data
if ($productId && is_numeric($quantity) && $quantity > 0) {
    // Prepare the update statement
    $updateStmt = $conn->prepare('UPDATE urbangoods_products_crud SET quantity = ? WHERE ID = ?');
    $updateStmt->bind_param('ii', $quantity, $productId);
    $updateStmt->execute();
    
    // Check if the update was successful
    if ($updateStmt->affected_rows > 0) {
        echo json_encode(['success' => true, 'message' => 'Quantity updated successfully.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'No changes made.']);
    }

    $updateStmt->close();
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid product ID or quantity.']);
}

// Close the connection
$conn->close();
?>
