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
    ?>
    <main>
        <section class="mb-5 md:mb-card-section-bottom-padding">
            <h1 style="color: #444444;" class="text-center text-primary text-large title">Smartphone Accessories</h1>
            <p class="text-center" >Accessories to enhance your smartphone experience</p>
        </section>
        <div class="container_products">
            </div>
            <p class="text-center footerTXT">Find a wide selection of smartphone accessories to level up your device.
                From stylish cases to practical chargers, explore our range to personalize and optimize your smartphone usage.</p>
                <?php include("../../../assets/components/footer/footer.php"); ?>
            </main>
            <?php include("../../../assets/components/mobMenu/menu.php"); ?>
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