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
            <h1 class="text-center text-primary text-large title" style="line-height: 1.2em">About us
            </h1>
        </section>

        <div class="container_products">
        </div>

        <p class="text-center footerTXT">Welcome to <strong>UrbanGooDs</strong>, your ultimate destination for the latest and most innovative tech accessories! My name is <strong>Gia Miminoshvili</strong>, and at just 15 years old, I’m passionate about bringing quality products to tech enthusiasts like you.</p>
        <p class="text-center footerTXT">Hailing from Georgia, I understand the importance of having reliable and stylish gadgets in today’s fast-paced world. UrbanGooDs is more than just a store; it's a curated collection of essential accessories designed to enhance your lifestyle, whether you’re gaming, working, or simply enjoying your favorite tech.</p>
        <p class="text-center footerTXT">Here at UrbanGooDs, I strive to provide not only top-notch products but also a shopping experience that reflects my commitment to quality and customer satisfaction. Every item is carefully selected to ensure it meets the highest standards, so you can shop with confidence.</p>
        <p class="text-center footerTXT">Thank you for visiting UrbanGooDs! I’m excited to share this journey with you and help you find the perfect accessories to elevate your tech experience.</p>
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