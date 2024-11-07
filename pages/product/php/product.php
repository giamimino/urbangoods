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
    $isCart = $row['isCart'];
    if ($isCart === NULL) {
        $isCart = false;
    }

    $quantity = $row['quantity'];
    
}

// Close the statement and connection
$stmt->close();
$conn->close();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UrbanGooDs</title>
    <?php include("../../../assets/components/scrollBar/scrollbar.php") ?>
</head>
<body>
<?php include("../../../assets/components/freeshiping/freeshiping.php");
    include("../../../assets/components/header/header.php"); 
    include("../../../assets/components/mobMenu/menu.php");
    ?>
    <main>
    <a href="javascript:void(0);" onclick="history.back();">Go Back</a>
                <div class="container_product">
                    <div class="wrapper">
                        <img src="https://wundery-uploads-production.imgix.net/ce5b61ba-173b-48ea-a1df-47fa63ccb806/d6be9d-e9649995.png?w=800" id="image_product" class="image">
                        <div class="section-product">
                            <h1 class="title_product"></h1>
                            <p class="description_product"></p>
                            <p class="price_product"></p>
                            <div class="select">
                            <label for="fruits">Quantity</label>
                            <select id="fruits" name="fruits" onchange="displaySelection()">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                            </select>
                            </div>
                            <button class="buy" id="addcart">
                                <i class='bx bxs-cart-alt'></i>Add to cart
                            </button>
                            <p class="main_description">
                            </p>
                        </div>
</div>
        </div>
        <?php include("../../../assets/components/footer/footer.php"); ?>
    </main>
</body>
<!-- style -->
 <style>
<?php include('../style/style.css'); ?>
</style>
<?php
echo '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">';
?>
<?php
echo '<link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">';
?>

<script>

<?php include("../script/script.js"); ?>
    </script>
</html>

<script>
    document.querySelector('.main_description').innerHTML = 
    document.querySelector('.main_description').innerHTML.replace(/✅/g, '<br>✅');
    </script>


<script>
    // Declare itemCount here
    let itemCount = 0;

    fetch('../../globalPHP/db-header.php')
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok: ' + response.statusText);
            }
            return response.json();
        })
        .then(jsons => {
            jsons.forEach(json => {
                console.log(json); 
                if (json.isCart === "1") {
                    itemCount++;
                }
            });

            document.querySelector('.quantiti-item-cart').innerText = itemCount; // Update the UI
        })
        .catch(error => console.error('Error:', error));
</script>