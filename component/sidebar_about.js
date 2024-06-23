var navActive = document.getElementById('nav-item');
var aboutActive = document.getElementById('about_php');
var collapsePages = document.getElementById('collapsePages');

if (navActive && aboutActive) {
    navActive.classList.add('active');
    aboutActive.classList.add('active');
    collapsePages.classList.add('show');
}