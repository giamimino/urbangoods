<?php
if (isset($_GET['refresh']) && $_GET['refresh'] == 'true') {
    // Code you want to execute on refresh
    echo "Page refreshed!";
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
            <h1 class="text-center text-primary text-large title" style="line-height: 1.2em">Gaming Gear
            </h1>
            <p class="text-center" style="margin-top: 10px;">Equipment for gaming enthusiasts</p>
        </section>

        <div class="container_products">
        </div>

        <p class="text-center footerTXT">Gear up for an immersive gaming experience with our range of gaming gear. From high-performance mice to ergonomic chairs, find everything you need to enhance your gaming setup.</p>
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

</html>

<script>

<?php include("../script/script.js"); ?>
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