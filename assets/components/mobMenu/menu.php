<div class="menu">
        <label class="toggle">
            <input type="checkbox" id="toggle">
            <div class="toggle-line top-line"></div>
            <div class="toggle-line middle-line"></div>
            <div class="toggle-line bottom-line"></div>
        </label>
    <a href="#" class='bx bx-search'></a>
    <a href="../../HomePage/html/homepage.php" class='bx bxs-home'></a>
    <a href="../../user/php/login.php" class='bx bxs-user'></a>
</div>

<div class="padding">
    <div class="open-menu">
        <i class="fa-solid fa-xmark"></i>
        <div class="section-menu">
        <a href="../../HomePage/html/homepage.php">Homepage</a>
            <a href="../../SmartphoneAccessories/php/SmartphoneAcc.php">Smartphone Accessories</a>
            <a href="../../TechGadgets/php/TechGad.php">Tech Gadgets</a>
            <a href="../../gaming/php/gamingGear.php">Gaming Gear</a>
            <a href="../../AboutUs/php/aboutus.php">About us</a>
        </div>
    </div>
</div>

<style>
@import url(https://fonts.googleapis.com/css?family=Poppins:100,100italic,200,200italic,300,300italic,regular,italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic);
@import url(https://fonts.googleapis.com/css?family=Montserrat:100,200,300,regular,500,600,700,800,900,100italic,200italic,300italic,italic,500italic,600italic,700italic,800italic,900italic);
.padding {
    padding: 14px 8px;
    position: fixed;
    z-index: 10;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 100%;
    height: 100%;
}


.menu {
    position: fixed;
    bottom: 0;
    left: 0;
    width: 100%;
    display: none;
    align-items: center;
    justify-content: space-around;
    background-color: #f2f2f2;
    padding: 20px 28px ;
}

.menu a {
    font-size: 24px;
    cursor: pointer;
    font-weight: 900;
    color: #444444;
    text-decoration: none;
    font-family: "Montserrat", sans-serif;
    opacity: 1;
    visibility: visible;
    display: block;
}

.toggle {
    width: 30px;
    height: 30px;
    padding: 4px;
    background-color: transparent;
    position: relative;
    cursor: pointer;
    overflow: hidden;
}

.toggle-line {
    width: 100%;
    height: auto;
    left: 0;
    position: absolute;
    border: 3px solid #444444;
    border-radius: 10px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.5s ease-in-out;
    z-index: 9;
    background-color: #444444;
}

.top-line {
    top: 20%;
    transition: all 0.5s ease-in-out;
}
  
.middle-line {
    top: 42.5%;
    transition: all 0.5s ease-in-out;
}
  
.bottom-line {
    top: 65%;
    transition: all 0.5s ease-in-out;
}

.toggle input {
    display: none; /* Hide the checkbox */
}



/* Open menu */

.open-menu {
    padding: 28px 28px 58px 28px;
    width: 100%;
    height: auto;
    background-color: #f7f7f7;
    border-radius: 0.5rem;
}

.padding {
    display: none;
}

.open-menu i {
    cursor: pointer;
    font-size: 16px;
    font-weight: 900;
    position: absolute;
    right: 36px;
}

.section-menu {
    display: flex;
    flex-direction: column;
    gap: 20px;
    border-top: 1px solid #eaeaea;
    border-bottom: 1px solid #eaeaea;
    padding: 32px 0;
    margin-top: 38px;
}

.section-menu a {
    text-decoration: none;
    color: #333333;
    font-size: 14px;
    font-weight: 500;
}

.section-menu a:hover {
    text-decoration: underline;
    text-decoration-color: #000 !important;
}


/* checked */

    .toggle input:checked ~ .top-line {
        transform: rotate(45deg) translate(5px, 5px);
    }
    
    .toggle input:checked ~ .middle-line {
        transform: translateX(-50px);
        border-radius: 10px;
        opacity: 0;
    }
    
    .toggle input:checked ~ .bottom-line {
        transform: rotate(-45deg) translate(5px, -5px);
    }

    @media screen and (max-width: 768px) {
        .menu {
            display: flex;
            z-index: 10;
        }
    }
</style>

<?php
echo '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">';
?>
<?php
echo '<link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">';
?>

<script>
document.addEventListener("DOMContentLoaded", ()=> {
    const toggle_Menu_open = document.getElementById("toggle");
    const toggle_Menu_close = document.querySelector(".fa-xmark");
    const Menu = document.querySelector(".padding");
    let isMenuOpen = true;
    
    toggle_Menu_open.addEventListener("click", () => {
        Menu.style.display = "block";
        Menu.style.transition = "all .4s ease";
    });
    
    toggle_Menu_close.addEventListener("click", () => {
        Menu.style.display = "none";
        Menu.style.transition = "all .4s ease";
        toggle_Menu_open.checked = false;
    });
});
</script>