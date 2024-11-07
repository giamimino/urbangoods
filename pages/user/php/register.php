<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "UrbanGooDs";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $cart_quantity = 0;

    $sql = "INSERT INTO urbangoods_users_crud (username, password, cart_quantity) VALUES ('$username', '$password', '$cart_quantity')";

    if ($conn->query($sql) === TRUE) {
        // Redirect after successful registration
        header("Location: login.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
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
        <section class="mb-5 md:mb-card-section-bottom-padding">
            <h1 class="text-center text-primary text-large title" style="line-height: 1.2em">Register
            </h1>
        </section>



<form method="POST" class="px-5" action="register.php">
    <label class="label-log">Username:</label> <input class="input-desg" type="text" name="username" required><br>
    <label class="label-log">Password:</label> <input class="input-desg" type="password" name="password" required><br>
    <input type="submit" class="submit" value="Register">
    <p>Already have an account? <a href="./login.php">here</a></p>
</form>


<?php include("../../../assets/components/footer/footer.php"); ?>
    </main>
</body>
<!-- style -->
 <style>
<?php include('../style/register.css'); ?>
</style>
<?php
echo '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">';
?>
<?php
echo '<link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">';
?>

</html>

<script>

<?php include("../script/register.js"); ?>
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