<?php
session_start();

// Ensure the product ID is provided as a GET parameter
if (isset($_GET['id'])) {
    $productIdToRemove = $_GET['id'];

    // Check if the product ID exists in the cart session variable
    if (isset($_SESSION['cart'])) {
        $cart = $_SESSION['cart'];

        // Find the index of the product ID in the cart array
        $index = array_search($productIdToRemove, $cart);

        // If found, remove the product ID from the cart array
        if ($index !== false) {
            unset($cart[$index]);
            $_SESSION['cart'] = array_values($cart); // Re-index the array after unset
        }
    }
}

// Redirect back to the cart page
header('Location: cart.php');
exit();
?>
