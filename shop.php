<?php

session_start();
require('./backend/config.php');
include('data_index.php');

if (isset($_SESSION['login'])) {
    $id = $_SESSION['login'];
    $dataCustomer = $conn->prepare("SELECT * FROM customers WHERE id=:id");
    $dataCustomer->bindParam('id', $id);
    $dataCustomer->execute();
    $row = $dataCustomer->fetch(PDO::FETCH_ASSOC);
} else {
    header('location: login.php');
}

if (isset($_POST['reviews'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $stmt = $conn->prepare("INSERT INTO section_reviews(name, email, message) VALUES(:name, :email, :message)");
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':message', $message);

    if ($stmt->execute()) {
        header('location: shop.php');
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

        <nav class="navbar">
            <a href="#products">Products</a>
            <a href="#review">Review</a>
        </nav>

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
    <section class="products" id="products" style="margin-top: 10rem;">

        <p id="text-alert"></p>

        <h1 class="heading"> lastest <span>Products</span> </h1>

        <div class="box-container">

            <?php foreach ($row4 as $result) : ?>
                <div class="box">
                    <?php if ($result['discount'] > 0) { ?>
                        <span class="discount">-<?= $result['discount']; ?>%</span>
                    <?php } else { ?>
                        <span style="display: none;"></span>
                    <?php } ?>
                    <div class="image">
                        <img src="./uploads/<?= $result['picture']; ?>" alt="">
                    </div>
                    <div class="content">
                        <h2 class="h2"><?= $result['heading']; ?></h2>
                        <?php if ($result['discount'] > 0) { ?>
                            <div class="price">฿<?= $result['price'] * (100 - $result['discount']) / 100; ?> <span>฿<?= $result['price']; ?></span> </div>
                        <?php } else { ?>
                            <div class="price">฿<?= $result['price'] * (100 - $result['discount']) / 100; ?> </div>
                        <?php } ?>
                    </div>
                    <div class="button-add">
                        <a class="btn add-to-cart-btn" data-id="<?= $result['id']; ?>"><i class="fa-solid fa-cart-shopping"></i> add to cart</a>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>

    </section>

    <!-- review -->
    <section class="contact" id="review">

        <h1 class="heading"> <span>review</span> </h1>

        <div class="row">

            <form action="#" method="post">
                <input type="text" name="name" placeholder="name" class="box" required>
                <input type="email" name="email" placeholder="email" class="box" required>
                <textarea name="message" class="box" placeholder="review product..." cols="30" rows="10" required></textarea>
                <input type="submit" name="reviews" value="review" class="btn">
            </form>

            <div class="image">
                <img src="./src/contact.jpg" alt="">
            </div>

        </div>

    </section>

    <!-- footer -->
    <section class="footer">

        <div class="box-container">

            <div class="box">
                <h2 class="h2">quick links</h2>
                <a href="#products">products</a>
                <a href="#review">review</a>
            </div>

            <div class="box">
                <h2 class="h2">extra links</h2>
                <a href="#">my account</a>
                <a href="#">my order</a>
                <a href="#">my favorite</a>
            </div>

            <div class="box">
                <h2 class="h2">location</h2>
                <a href="#">thailand</a>
                <a href="#">USA</a>
                <a href="#">japan</a>
            </div>

            <div class="box">
                <h2 class="h2">contact info</h2>
                <a href="#">+123-456-7890</a>
                <a href="#">example@email.com</a>
                <a href="#">Thailand</a>
                <i class="fa-brands fa-cc-paypal" style="color: #74C0FC;"></i>
                <i class="fa-solid fa-credit-card"></i>
            </div>

        </div>

        <?php foreach ($row6 as $result) : ?>
            <div class="credit"> <?= $result['footer'];  ?> </div>
        <?php endforeach; ?>

    </section>

    <script>
        function toggleDropdown() {
            var dropdown = document.getElementById("dropdown");
            dropdown.classList.toggle("active");
        }

        document.querySelectorAll('.add-to-cart-btn').forEach(button => {
            button.addEventListener('click', function(event) {
                event.preventDefault();
                var productId = this.getAttribute('data-id');

                fetch('update_cart.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({
                            id: productId
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            var alert = document.getElementById('text-alert');
                            alert.textContent = 'Product added to cart';
                            alert.style.display = 'block';
                            setTimeout(() => {
                                alert.style.display = 'none';
                            }, 3000);
                        } else {
                            var alert = document.getElementById('text-alert');
                            alert.textContent = 'Error adding product to cart';
                            alert.style.display = 'block';
                            setTimeout(() => {
                                alert.style.display = 'none';
                            }, 3000);
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
            });
        });

        document.addEventListener("DOMContentLoaded", function() {
            var addToCartButtons = document.querySelectorAll('.add-to-cart-btn');

            addToCartButtons.forEach(function(button) {
                button.addEventListener('click', function() {
                    if (!button.classList.contains('disabled')) {
                        button.classList.add('disabled');
                        button.textContent = 'Added';
                        updateCartCount();
                    }
                });
            });

            function updateCartCount() {
                var cartCountElement = document.getElementById('cart-count');
                var cartCount = parseInt(cartCountElement.textContent) || 0;
                cartCount++;
                cartCountElement.textContent = cartCount;
                if (cartCount > 0) {
                    cartCountElement.style.display = 'inline';
                } else {
                    cartCountElement.style.display = 'none';
                }
            }

            window.onload = function() {
                var cartCountElement = document.getElementById('cart-count');
                var cartCount = parseInt(cartCountElement.textContent) || 0;
                if (cartCount === 0) {
                    cartCountElement.style.display = 'none';
                }
            };
        });
    </script>

</body>

</html>