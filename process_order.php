<?php
    session_start();
    require('./backend/config.php');

    if (!isset($_SESSION['login'])) {
        header('Location: login.php');
        exit();
    }

    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
        $customerId = $_SESSION['login'];
        $cart = $_SESSION['cart'];

        $stmt = $conn->prepare("INSERT INTO orders (customer_id, product_id, price) VALUES (:customerId, :productId, :price)");

        foreach ($cart as $productId) {
            $stmtPrice = $conn->prepare("SELECT price, discount FROM section_products WHERE id = :productId");
            $stmtPrice->bindParam(':productId', $productId);
            $stmtPrice->execute();
            $product = $stmtPrice->fetch(PDO::FETCH_ASSOC);

            if ($product) {
                $price = $product['price'] * (100 - $product['discount']) / 100;
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
