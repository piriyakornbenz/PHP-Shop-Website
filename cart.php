<?php
    session_start();
    require('./backend/config.php');

    if (isset($_SESSION['login'])) {
        $id = $_SESSION['login'];
        $dataCustomer = $conn->prepare("SELECT * FROM customers WHERE id=:id");
        $dataCustomer->bindParam(':id', $id);
        $dataCustomer->execute();
        $row = $dataCustomer->fetch(PDO::FETCH_ASSOC);
    } else {
        header('location: login.php');
    }

    // product in cart
    if (isset($_GET['id'])) {
        if (empty($_SESSION['cart'])) {
            $_SESSION['cart'][$_GET['id']] = 1;
        }else {
            $_SESSION['cart'][$_GET['id']] += 1;
        }
        $_SESSION['success'] = "Add to cart successful.";
        header('location: shop.php');
    }

    // loop product in cart
    if (isset($_SESSION['cart'])) {

        $productIds = [];

        foreach($_SESSION['cart'] as $id => $amount) {
            $productIds[] = $id;
        }

        if (count($productIds) > 0) {
            
            $placeholders = implode(',', array_fill(0, count($productIds), '?'));
            $stmt = $conn->prepare("SELECT * FROM section_products WHERE id IN ($placeholders)");
        
            foreach ($productIds as $index => $id) {
                $stmt->bindValue($index + 1, $id);
            }
        
            $stmt->execute();
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    
    }

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>

<body>

    <!-- navbar -->
    <header>

        <input type="checkbox" id="toggler">
        <label for="toggler" class="fas fa-bars"></label>

        <a href="#" class="logo">flower<span>.</span></a>

        <nav class="navbar"></nav>

        <div class="icons">
            <a style="font-size: 1.5rem;">welcome <?= $row['firstname'] ?></a>
            <a href="cart.php" class="fas fa-shopping-cart"><span id="cart-count">
                    <?php echo isset($_SESSION['cart']) ? count($_SESSION['cart']) : '0'; ?>
                </span></a>
            <div class="dropdown" id="dropdown">
                <button class="dropdown-toggle fas fa-user" type="button" onclick="toggleDropdown()"></button>
                <ul class="dropdown-menu">
                    <?php if (isset($_SESSION['login'])) { ?>
                        <li><a href="logout.php"><i class="fas fa-right-to-bracket"></i> Logout</a></li>
                    <?php } else { ?>
                        <li><a href="login.php"><i class="fas fa-right-to-bracket"></i> Login</a></li>
                        <li><a href="register.php"><i class="fas fa-file-pen"></i> Register</a></li>
                    <?php } ?>
                </ul>
            </div>
        </div>

    </header>

    <!-- product -->
    <section style="margin-top: 10rem;">

        <a href="shop.php" class="btn"><i class="fa-solid fa-arrow-left"></i> back</a>

        <h1 class="heading"> Cart </h1>

        <div class="table-container">
            
                    <table class="cart-table">
                        <tr>
                            <th>Product</th>
                            <th>Image</th>
                            <th>Price</th>
                            <th>Remove</th>
                        </tr>

                        <?php 
                            if (isset($data)) {
                                foreach ($data as $row) { 
                        ?>
                            <tr>
                                <td><?= $row['heading'] ?></td>
                                <td><img src="./uploads/<?= $row['picture'] ?>" alt=""></td>
                                <td>฿<?= $row['price'] * (100 - $row['discount']) / 100; ?></td>
                                <td><a href="remove_from_cart.php?id=<?= $row['id'] ?>" class="btn btn-remove">remove</a></td>
                            </tr>

                        <?php 
                                } 
                            }else {
                                echo '<p>Your Cart Is Empty.</p>';
                            }
                        ?>

                    </table>
        </div>

        <div class="right">
            <a href="clear_cart.php" class="btn btn-clear">Clear</a>
            <a href="process_order.php" class="btn">Order</a>
        </div>

    </section>

    <script>
        function toggleDropdown() {
            var dropdown = document.getElementById("dropdown");
            dropdown.classList.toggle("active");
        }
    </script>

</body>

</html>