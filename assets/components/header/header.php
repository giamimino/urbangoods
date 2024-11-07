    <header>
        <div class="section">
            <h1>UrbanGooDs</h1>
            <a href="../../HomePage/html/homepage.php" class="link nav-link <?php if (basename($_SERVER['PHP_SELF']) == 'homepage.php') echo 'active'; ?>">Homepage</a>
            <a href="../../SmartphoneAccessories/php/SmartphoneAcc.php" class="link nav-link <?php if (basename($_SERVER['PHP_SELF']) == 'SmartphoneAcc.php') echo 'active'; ?>">Smartphone Accessories</a>
            <a href="../../TechGadgets/php/TechGad.php"  class="link nav-link <?php if (basename($_SERVER['PHP_SELF']) == 'TechGad.php') echo 'active'; ?>">Tech Gadgets</a>
            <a href="../../gaming/php/gamingGear.php"  class="link nav-link <?php if (basename($_SERVER['PHP_SELF']) == 'gamingGear.php') echo 'active'; ?>">Gaming Gear</a>
            <a href="../../AboutUs/php/aboutus.php"  class="link nav-link <?php if (basename($_SERVER['PHP_SELF']) == 'aboutus.php') echo 'active'; ?>">About us</a>
        </div>
        <div class="tools">
            <i class='bx bx-search'></i>
            <span class="line"></span>
            <a href="../../user/php/login.php"><i class='bx bxs-user'></i></a>
            <span class="line"></span>
            <a href="../../cartpage/php/cart.php">
            <i class='bx bx-shopping-bag'><div class="quantiti-item-cart">0</div></i>
            </a>
        </div>
    </header>
<!-- style -->
 <style>
header {
    display: flex;
    align-items: center;
    gap: 0 12px;
    justify-content: space-between;
    padding: 24px 76px;
}

@media screen and (max-width: 1024px){
    header {
        padding: 6px 9px;
    }
}

@media screen and (max-width: 820px){
    header {
        padding: 14px 32px;
    }

    .link, .line, .bx-search, .bxs-user {
        display: none;
        opacity: 0;
        visibility: hidden;
    }

}

.nav-link.active {
    color: #333333;
}

.section {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 32px;
    text-align: center;
}

.section a {
    text-decoration: none;
    color: #000;
    font-size: 14px;
}


.section a:hover {
    text-decoration: underline;
    transition: all .2s ease;
}

 .section h1 {
    font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
    font-size: 2em;
    font-weight: 500;
    margin-bottom: 6px;
    cursor: pointer;
}

.tools {
    display: flex;
    gap: 8px;
    font-size: 24px;
    align-items: center;
}

.tools i, .tools a {
    cursor: pointer;
    position: relative;
    z-index: 1;
    color: #333333;
}

.tools .line {
    height: 20px;
    width: 1px;
    background-color: #000;
    border-radius: 50%;
    opacity: 0.2;
}

.quantiti-item-cart {
    position: absolute;
    width: 20px; height: 20px;
    background-color: #000;
    border-radius: 50%;
    color: #fff;
    font-size: 12px;
    font-weight: 700;
    z-index: 2;
    text-align: center;
    display: flex;
    justify-content: center;
    align-items: center;
    bottom: -10px;
    right: -10px;
    font-family:  ui-sans-serif, system-ui, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol, Noto Color Emoji;
}
</style>
<?php
echo '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">';
?>
<?php
echo '<link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">';
?>
