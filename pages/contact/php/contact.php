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
            <h1 class="text-center text-primary text-large title" style="line-height: 1.2em">Contact
            </h1>
        </section>
        <form id="contact-form" class="px-5">
            <label for="surname_input" class="label_contact">Surname</label>
            <input type="name" id="surname_input" class="surname_input contact_input" name="surname" placeholder="Surname..." required>

            <label for="email_input" class="label_contact">Email</label>
            <input type="email" id="email_input" class="email_input contact_input" name="email" placeholder="Email..." required>

            <label for="phone_input" class="label_contact">Phone</label>
            <input type="phone" id="phone_input" class="phone_input contact_input" name="phone" placeholder="Phone..." required>

            <label for="message_input" class="label_contact">Message</label>
            <textarea type="message" id="message_input" class="message_input" name="message" placeholder="Message..." required></textarea>
            <label for="agree" class="text-xs">
                <input type="checkbox" name="agree" class="checkbox_input" required>
            I here by agree that my data entered into the contact form will be stored 
                electronically and processed and used for the purpose of establishing contact.
                 I know that I can revoke my consent at any time.</label>
            <button type="submit" class="submit" id="submit" name="submit">send</button>
        </form>
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
<?php
echo '<script src="https://cdn.jsdelivr.net/npm/@emailjs/browser@4/dist/email.min.js" defer></script>';
?>

<script>
        document.addEventListener('DOMContentLoaded', function() {
            emailjs.init("OlbNcahZYrhV1qcmY"); // Initialize EmailJS with your public key
        });
    </script>

</html>

<script>
        // script.js
document.getElementById('contact-form').addEventListener('submit', function(e) {
    e.preventDefault(); // Prevent default form submission

    const params = {
        name: document.getElementById("surname_input").value,
        phone: document.getElementById("phone_input").value,
        email: document.getElementById("email_input").value,
        message: document.getElementById("message_input").value
    };
    
    const serviceID = "service_batz1p8";  // Ensure this is your actual Service ID
    const templateID = "template_qlek89x";  // Ensure this is your actual Template ID
    
    emailjs.send(serviceID, templateID, params)
    .then((res) => {
        document.getElementById("surname_input").value = "";
        document.getElementById("phone_input").value = "";
        document.getElementById("email_input").value = "";
        document.getElementById("message_input").value = "";
        showAlert("Your message was sent successfully.");
    })
    .catch((err) => {
        console.error("Error details:", err);
        showAlert("An error occurred: " + (err.text || err.message || "Unknown error"));
    });
});

function showAlert(message) {
    console.log(message);
    
}

    </script>

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