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

// Get data from the request
$data = json_decode(file_get_contents('php://input'), true);
$productId = $data['productId'] ?? null;
$quantity = $data['quantity'] ?? null;

// Validate the data
if ($productId && $quantity) {
    // Optionally, check if the product exists
    $stmt = $conn->prepare('SELECT * FROM urbangoods_products_crud WHERE ID = ? LIMIT 1');
    $stmt->bind_param('i', $productId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        // Update isCart and quantity fields in the database
        $isCart = true; // Set isCart to true when adding to cart
        
        // Prepare the update statement
        $updateStmt = $conn->prepare('UPDATE urbangoods_products_crud SET isCart = ?, quantity = ? WHERE ID = ?');
        $updateStmt->bind_param('iii', $isCart, $quantity, $productId);
        $updateStmt->execute();
        
        // Check if the update was successful
        if ($updateStmt->affected_rows > 0) {
            echo json_encode(['success' => true, 'message' => 'Product added to cart and updated in database!']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Product updated but no changes made.']);
        }

        $updateStmt->close();
    } else {
        echo json_encode(['success' => false, 'message' => 'Product not found.']);
    }

    $stmt->close();
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid product ID or quantity.']);
}

// Close the connection
$conn->close();
?>
