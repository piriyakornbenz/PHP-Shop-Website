var navActive = document.getElementById('nav-item');
var reviewsActive = document.getElementById('reviews_php');
var collapsePages = document.getElementById('collapsePages');

if (navActive && reviewsActive) {
    navActive.classList.add('active');
    reviewsActive.classList.add('active');
    collapsePages.classList.add('show');
}