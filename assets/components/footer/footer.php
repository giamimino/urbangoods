<div class="container">
    <div class="help">
        <a href="../../AboutUs/php/aboutus.php">About us</a>
        <a href="">Payment and Shipping</a>
        <a href="../../contact/php/contact.php">Contact</a>
    </div>
    <div class="line-helpXcopy"></div>
    <div class="copyright">
        <p>Copyright ©2024 UrbanGoods | Powered by Gia Miminoshvili</p>
        <img src="https://wundery-uploads-production.imgix.net/16fdf37e-3f02-4515-8b30-c73ed3096520/a212674c.svg" alt="">
    </div>
</div>

<style>
@import url(https://fonts.googleapis.com/css?family=Montserrat:100,200,300,regular,500,600,700,800,900,100italic,200italic,300italic,italic,500italic,600italic,700italic,800italic,900italic);
    .container {
    width: 100%;
    height: auto;
    display: flex;
    flex-direction: column;
    gap: 20px;
    margin-top: 100px;
}

.help a {
    text-decoration: none;
    font-family: "Montserrat", sans-serif;
    color: #333333;
    cursor: pointer;
    font-size: 16px;
    font-weight: 500;
    color: #000;
    letter-spacing: 1px;
    font-style: normal;
    font-variant: normal;
    text-transform: none;
    text-indent: 0px;
}

.help {
    display: flex;
    gap: 20px;
}

.help a:hover {
    text-decoration: underline solid rgb(51, 51, 51);
}

.line-helpXcopy {
    width: 100%;
    height: 1px;
    background-color: #000;
    opacity: 0.1;
}

.copyright {
    display: flex;
    justify-content: space-between;
    align-items: center;
    text-align: left;
    margin: 0;
}

.copyright p {
    font-family: Montserrat, sans-serif;
    font-weight: 500;
    font-size: 16px;
    text-align: left;
    margin: 0;
    padding: 0;
    color: #333333;
}

.copyright img {
    width: 70px;
    height: auto;
}
</style>