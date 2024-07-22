<?php
session_start();
require('./backend/config.php');

if (isset($_SESSION['login'])) {
    $id = $_SESSION['login'];
    $dataOrder = $conn->prepare("SELECT orders.*, section_products.* 
            FROM orders 
            JOIN section_products ON orders.product_id = section_products.id 
            WHERE orders.customer_id = :id
            ORDER BY orders.date DESC
        ");
    $dataOrder->bindParam(':id', $id);
    $dataOrder->execute();
    $orders = $dataOrder->fetchAll(PDO::FETCH_ASSOC);

    $dataCustomer = $conn->prepare("SELECT * FROM customers WHERE id=:id");
    $dataCustomer->bindParam(':id', $id);
    $dataCustomer->execute();
    $customer = $dataCustomer->fetch(PDO::FETCH_ASSOC);
} else {
    header('location: login.php');
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

        <div class="icons">
            <a style="font-size: 1.5rem;">welcome <?= $customer['firstname'] ?></a>
            <a href="cart.php" class="fas fa-shopping-cart"><span id="cart-count">
                <?php echo isset($_SESSION['cart']) ? count($_SESSION['cart']) : '0'; ?>
            </span></a>
            <div class="dropdown" id="dropdown">
                <button class="dropdown-toggle fas fa-user" type="button" onclick="toggleDropdown()"></button>
                <ul class="dropdown-menu">
                    <?php if (isset($_SESSION['login'])) { ?>
                        <li><a href="profile.php"><i class="fa-solid fa-user"></i> Profile</a></li>
                        <li><a href="history.php"><i class="fa-solid fa-clipboard-check"></i> History</a></li>
                        <li><a href="logout.php"><i class="fas fa-right-to-bracket"></i> Logout</a></li>
                    <?php } else { ?>
                        <li><a href="login.php"><i class="fas fa-right-to-bracket"></i> Login</a></li>
                        <li><a href="register.php"><i class="fas fa-file-pen"></i> Register</a></li>
                    <?php } ?>
                </ul>
            </div>
        </div>

    </header>

    <!-- history -->
    <section style="margin-top: 10rem;">

        <a href="shop.php" class="btn"><i class="fa-solid fa-arrow-left"></i> back</a>
        <a href="feedback.php" class="btn btn-primary">feedback</a>

        <h1 class="heading"> History </h1>

        <div class="table-container">

            <table class="cart-table">
                <?php
                if (isset($orders)) {
                    $grouped_orders = [];
                    foreach ($orders as $row) {
                        $date = date("Y-m-d", strtotime($row['date']));
                        if (!isset($grouped_orders[$date])) {
                            $grouped_orders[$date] = [];
                        }
                        $grouped_orders[$date][] = $row;
                    }

                    foreach ($grouped_orders as $date => $orders_on_date) {
                ?>
                        <tr>
                            <th colspan="5"><?= $date ?></th>
                        </tr>
                        <tr>
                            <th>Order Time</th>
                            <th>Product</th>
                            <th>Image</th>
                            <th>Price</th>
                            <th>Status</th>
                        </tr>

                        <?php
                        foreach ($orders_on_date as $row) {
                        ?>
                            <tr>
                                <td><?= date("H:i:s", strtotime($row['date'])) ?></td>
                                <td><?= $row['heading'] ?></td>
                                <td><img src="uploads/<?= $row['picture'] ?>" alt=""></td>
                                <td>฿<?= $row['price'] * (100 - $row['discount']) / 100; ?></td>
                                <?php if ($row['status'] == "delivery") { ?>
                                    <td style="color: red;"><?= $row['status'] ?></td>
                                <?php } else { ?>
                                    <td style="color: green;"><?= $row['status'] ?></td>
                                <?php } ?>
                            </tr>
                <?php
                        }
                    }
                } else {
                    echo '<p>Your history Is Empty.</p>';
                }
                ?>
            </table>

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