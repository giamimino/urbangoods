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
