var navActive = document.getElementById('nav-item');
var iconsActive = document.getElementById('icons_php');
var collapsePages = document.getElementById('collapsePages');

if (navActive && iconsActive) {
    navActive.classList.add('active');
    iconsActive.classList.add('active');
    collapsePages.classList.add('show');
}