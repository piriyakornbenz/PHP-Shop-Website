<?php
    session_start();
    require('./backend/config.php');

    // Check if the customer is logged in
    if (!isset($_SESSION['login'])) {
        // Redirect to login page if not logged in
        header('Location: login.php');
        exit();
    }

    // Check if the request has an ID parameter
    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
        $customerId = $_SESSION['login']; // Assuming you have a customer ID in session
        $cart = $_SESSION['cart'];

        // Prepare statement to insert order into database
        $stmt = $conn->prepare("INSERT INTO orders (customer_id, product_id, price) VALUES (:customerId, :productId, :price)");

        // Loop through each product in the cart
        foreach ($cart as $productId) {
            // Fetch the price and discount of the product from the section_products table
            $stmtPrice = $conn->prepare("SELECT price, discount FROM section_products WHERE id = :productId");
            $stmtPrice->bindParam(':productId', $productId);
            $stmtPrice->execute();
            $product = $stmtPrice->fetch(PDO::FETCH_ASSOC);

            if ($product) {
                // Calculate discounted price
                $price = $product['price'] * (100 - $product['discount']) / 100;

                // Bind parameters and execute the insert statement
                $stmt->bindParam(':customerId', $customerId);
                $stmt->bindParam(':productId', $productId);
                $stmt->bindParam(':price', $price);
                $stmt->execute();
            }
        }

        $_SESSION['cart'] = [];

        header('Location: shop.php');
        exit();

    } else {
        header('Location: cart.php');
        exit();
    }

?>
