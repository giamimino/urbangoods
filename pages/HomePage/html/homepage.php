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
            <h1 class="text-center text-primary text-large" style="line-height: 1.2em">Discover the Latest Tech Gadgets and Accessories at UrbanGoods!
            </h1>
            <p class="text-center">Welcome to UrbanGoods, your one-stop shop for all things tech. Explore our collection of cutting-edge gadgets and stylish accessories to enhance your digital lifestyle. From sleek phone cases to innovative smart home devices, we've got you covered. Stay ahead with UrbanGoods!</p>
        </section>
        <div class="Categories">
            <h2>Selected Categories</h2>
            <div class="cards">
                <div class="cardCat card">
                    <a href="../../SmartphoneAccessories/php/SmartphoneAcc.php">
                        <img src="https://i2.wp.com/www.zenithtechs.com/wp-content/uploads/2019/08/081819_1631_15BestMobil1.png?resize=1056%2C880&ssl=1" class="img"></i>
                        <div class="description">
                        <h2>Smartphone Accessories</h2>
                        <p>Accessories to enhance your smartphone experience</p>
                        </div>
                    </a>
                </div>
                <div class="cardCat card">
                <a href="../../TechGadgets/php/TechGad.php">
                <img src="https://th.bing.com/th/id/OIP.jbBXgqBynywE4uBUlUsUJQHaD_?rs=1&pid=ImgDetMain" class="img"></i>
                <div class="description">    
                <h2>Tech Gadgets</h2>
                    <p>Cutting-edge gadgets for tech enthusiasts</p>
                    </div>
                </a>
                </div>
                <div class="cardCat card">
                    <a href="../../gaming/php/gamingGear.php">
                <img src="https://th.bing.com/th/id/OIP.0mpeTanYyzMfKg2wpyBMUgHaFj?w=640&h=480&rs=1&pid=ImgDetMain" class="img"></i>
                <div class="description">    
                <h2>Gaming Gear</h2>
                    <p>Equipment for gaming enthusiasts</p>
                    </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="Trending_Products">
            <h2>Trending Products</h2>
            <div class="cards">
                <div class="cardTre card">
                    <img src="https://wundery-uploads-production.imgix.net/36ee2111-6710-4ff0-b3dd-6ed41c048146/d6be9d-8b488fc9.png?w=800" class="img"></i>
                    <h2>RGB Backlit Gaming Keyboard with Multimedia Keys</h2>
                    <p>$0.00</p>
                </div>
                <div class="cardTre card">
                <img src="https://wundery-uploads-production.imgix.net/36ee2111-6710-4ff0-b3dd-6ed41c048146/d6be9d-8b488fc9.png?w=800" class="img"></i>    
                <h2>Wireless Bluetooth Earbuds with Charging Case</h2>
                    <p>$0.00</p>
                </div>
                <div class="cardTre card">
                <img src="https://wundery-uploads-production.imgix.net/36ee2111-6710-4ff0-b3dd-6ed41c048146/d6be9d-8b488fc9.png?w=800" class="img"></i>    
                <h2>Universal Magnetic Phone Mount Holder</h2>
                    <p>$0.00</p>
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

</html>
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
