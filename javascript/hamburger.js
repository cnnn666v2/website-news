var menubar = document.getElementById("mobileNav");
current = 0;

function showMobile() {
    menubar.classList.toggle("hidden");
    if(current === 0) {
        current = 1;
        document.body.style.overflow = 'hidden';
    } else {
        current = 0;
        document.body.style.overflow = 'auto';
    }
};