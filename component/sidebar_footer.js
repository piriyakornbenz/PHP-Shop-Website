var navActive = document.getElementById('nav-item');
var footerActive = document.getElementById('footer_php');
var collapsePages = document.getElementById('collapsePages');

if (navActive && footerActive) {
    navActive.classList.add('active');
    footerActive.classList.add('active');
    collapsePages.classList.add('show');
}