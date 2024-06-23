var navActive = document.getElementById('nav-item');
var homeActive = document.getElementById('home_php');
var collapsePages = document.getElementById('collapsePages');

if (navActive && homeActive) {
    navActive.classList.add('active');
    homeActive.classList.add('active');
    collapsePages.classList.add('show');
}