var navActive = document.getElementById('nav-item');
var productsActive = document.getElementById('products_php');
var collapsePages = document.getElementById('collapsePages');

if (navActive && productsActive) {
    navActive.classList.add('active');
    productsActive.classList.add('active');
    collapsePages.classList.add('show');
}