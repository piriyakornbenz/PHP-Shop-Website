<?php
session_start();

// Unset or empty the cart session variable
$_SESSION['cart'] = [];

// Redirect back to the cart page
header('Location: cart.php');
exit();
?>
