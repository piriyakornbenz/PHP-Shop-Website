<?php 

    require('./backend/config.php');
    include('data_index.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
            <a href="#home">home</a>
            <a href="#about">about</a>
            <a href="#products">product</a>
            <a href="#review">review</a>
            <a href="#contact">contact</a>
        </nav>

        <div class="icons">
            <div class="dropdown" id="dropdown">
                <button class="dropdown-toggle fas fa-user" type="button" onclick="toggleDropdown()"></button>
                <ul class="dropdown-menu">
                    <li><a href="login.php"><i class="fas fa-right-to-bracket"></i> Login</a></li>
                    <li><a href="register.php"><i class="fas fa-file-pen"></i> Register</a></li>
                    <li><a href="login_admin.php"><i class="fas fa-user-tie"></i> Admin</a></li>
                </ul>
            </div>
        </div>
        
    </header>

    <!-- home -->
    <section class="home" id="home">

        <div class="content">
            <h1 class="h1"><?= $row1['heading']; ?></h1>
            
            <span><?= $row1['sub_heading']; ?></span>
            <p><?= $row1['description']; ?></p>
            <a href="#" class="btn"><?= $row1['button']; ?></a>
        </div>

    </section>

    <!-- about -->
    <section class="about" id="about">

        <h1 class="heading"> <span>about</span> us </h1>

        <div class="row">
            <div class="video-container">
                <video src="./src/video.mp4" loop autoplay muted></video>
                <h3>Best Sellers</h3>
            </div>

            <div class="content">
                <h2 class="h2"><?= $row2['heading']; ?></h2>
                <p><?= $row2['description']; ?></p>
                <a href="#" class="btn"><?= $row2['button']; ?></a>
            </div>
        </div>

    </section>

    <!-- icons -->
    <section class="icons-container">

        <?php foreach($row3 as $result): ?>
        <div class="icons">
            <img src="./uploads/<?= $result['icon']; ?>"  alt="">
            <div class="info">
                <h3 class="h3"><?= $result['heading']; ?></h3>
                <span><?= $result['description']; ?></span>
            </div>
        </div>
        <?php endforeach; ?>

    </section>

    <!-- product -->
    <section class="products" id="products">

        <h1 class="heading"> lastest <span>products</span> </h1>

        <div class="box-container">

            <?php foreach($row4 as $result): ?>
            <div class="box">
                <?php if($result['discount']>0) { ?>
                    <span class="discount">-<?= $result['discount']; ?>%</span>
                <?php }else { ?>
                    <span style="display: none;"></span>
                <?php } ?>
                <div class="image">
                    <img src="./uploads/<?= $result['picture']; ?>" alt="">
                </div>
                <div class="content">
                    <h2 class="h2"><?= $result['heading']; ?></h2>
                    <?php if($result['discount']>0) { ?>
                        <div class="price">฿<?= $result['price']*(100-$result['discount'])/100; ?> <span>฿<?= $result['price']; ?></span> </div>
                    <?php }else { ?>
                        <div class="price"> <?= $result['price']*(100-$result['discount'])/100; ?> </div>
                    <?php } ?>
                </div>
            </div>
            <?php endforeach; ?>

        </div>

    </section>

    <!-- review -->
    <section class="review" id="review">

        <h1 class="heading"> customer's <span>review</span> </h1>

        <div class="box-container">

            <?php foreach($row5 as $result): ?>    
            <div class="box">
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <p><?= $result['message']; ?></p>
                <div class="user">
                    <img src="https://images.unsplash.com/photo-1633332755192-727a05c4013d?q=80&w=2080&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="">
                    <div class="user-info">
                        <h4 class="h4"><?= $result['name']; ?></h4>
                        <span><?= $result['email']; ?></span>
                    </div>
                </div>
                <span class="fas fa-quote-right"></span>
            </div>
            <?php endforeach; ?>

            
        </div>

    </section>

    <!-- contact -->
    <section class="contact" id="contact">

        <h1 class="heading"> <span>contact</span> us </h1>

        <div class="row">

            <form action="#" method="post">
                <input type="text" name="name" placeholder="name" class="box" required>
                <input type="email" name="email" placeholder="email" class="box" required>
                <textarea name="message" class="box" placeholder="message" cols="30" rows="10" required></textarea>
                <input type="submit" name="reviews" value="send message" class="btn">
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
                <a href="#home">home</a>
                <a href="#about">about</a>
                <a href="#products">products</a>
                <a href="#review">review</a>
                <a href="#contact">contact</a>
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

        <?php foreach($row6 as $result): ?>
        <div class="credit"> <?= $result['footer'];  ?> </div>
        <?php endforeach; ?>

    </section>

    <script>
        function toggleDropdown() {
            var dropdown = document.getElementById("dropdown");
            dropdown.classList.toggle("active");
        }
    </script>
    
</body>
</html>