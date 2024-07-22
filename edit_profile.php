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

    if (isset($_POST['update'])) {
        try {
            $id = $_POST['id'];
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $address = $_POST['address'];
            $hashed_password = password_hash($password, PASSWORD_BCRYPT);

            $img = $_FILES['img'];
            $img2 = $_POST['img2'];
            $imgname = $_FILES['img']['name'];
            $imgfile = $_FILES['img']['tmp_name'];
            
            if (!empty($imgfile)) {
                $extension = explode(".", $imgname);
                $fileActExt = strtolower(end($extension));
                $filename = rand() . "." . $fileActExt;
                $filePath = "uploads/" . $filename;
                move_uploaded_file($imgfile, $filePath);
            }else {
                $filename = $img2;
            }

            $update = $conn->prepare("UPDATE customers SET firstname = :firstname, lastname = :lastname, email = :email, img = :img, address = :address, password = :password WHERE id = :id");
            $update->bindParam(':id', $id);
            $update->bindParam(':firstname', $firstname);
            $update->bindParam(':lastname', $lastname);
            $update->bindParam(':email', $email);
            $update->bindParam(':address', $address);
            $update->bindParam(':img', $filename);
            $update->bindParam(':password', $hashed_password);

            if ($update->execute()) {
                $_SESSION['success'] = "Updated successfully";
                header('location: profile.php');
                exit();
            }
        } catch (PDOException $e) {
            $_SESSION['error'] = "Update failed: " . $e->getMessage();
        }
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <style>
        .alert-success {
            width: 100%;
            color: #fff;
            font-size: 1.5rem;
            background-color: green;
            border-radius: 5px;
            padding: 15px;
        }
    </style>
</head>

<body>

    <!-- navbar -->
    <header>

        <input type="checkbox" id="toggler">
        <label for="toggler" class="fas fa-bars"></label>

        <a href="#" class="logo">flower<span>.</span></a>

        <div class="icons">
            <a style="font-size: 1.5rem;">welcome <?= $row['firstname'] ?></a>
            <a href="cart.php" class="fas fa-shopping-cart"><i class="fa-solid fa-cart"></i><span id="cart-count">
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

    <!-- product -->
    <section class="products" id="products" style="margin-top: 10rem;">

        <a href="shop.php" class="btn"><i class="fa-solid fa-arrow-left"></i> back</a>

        <h1 class="heading"> profile</span> </h1>

        <?php if(isset($_SESSION['success'])) { ?>
            <div class="alert alert-success">
                <?php 
                    echo $_SESSION['success'];
                    unset($_SESSION['success']);
                ?>
            </div>
        <?php } ?>

        <div class="container">

            <form action="" method="post" enctype="multipart/form-data">
                <div class="text-center">
                    <img src="uploads/<?= $row['img'] ?>" width="200px">
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mt-4">
                            <label>Image</label>
                            <input type="file" name="img" class="form-control">
                            <input type="text" name="img2" class="form-control" style="display: none;" value="<?= $row['img'] ?>">
                        </div>
                    </div>
                </div>
                <div class="row my-4">
                    <div class="col-md-6">
                        <div>
                            <label>firstname</label>
                            <input type="text" class="form-control" name="firstname" value="<?= $row['firstname'] ?>">
                            <input type="hidden" class="form-control" name="id" value="<?= $row['id'] ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div>
                            <label>lastname</label>
                            <input type="text" class="form-control" name="lastname" value="<?= $row['lastname'] ?>">
                        </div>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-md-6">
                        <div>
                            <label>email</label>
                            <input type="email" class="form-control" name="email" value="<?= $row['email'] ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div>
                            <label>password</label>
                            <input type="password" class="form-control" name="password">
                        </div>
                    </div>
                </div>
                <div class="mb-4">
                    <label>address</label>
                    <input type="text" class="form-control" name="address" value="<?= $row['address'] ?>">
                </div>
                <div class="text-end">
                    <button type="submit" class="btn btn-primary" name="update">update</button>
                </div>
            </form>

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