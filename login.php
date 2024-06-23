<?php 

    session_start(); 
    require('./backend/config.php');

    if (isset($_POST['submit'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $stmt = $conn->prepare("SELECT * FROM customers WHERE email=:email");
        $stmt->bindParam('email', $email);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            if (password_verify($password, $row['password'])) {
                $_SESSION['login'] = $row['id']; 
                header('location: shop.php');
                exit;

            }else{
                $_SESSION['error'] = "Incorrect email or password";
            }
            
        }else{
            $_SESSION['error'] = "Email not found in database";
            header('location: login.php');
            exit;
        }
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bootstrap Site</title>
  <?php include('./component/link.php'); ?>
</head>
<body>

    <div class="container">

           <form class="row g-3 needs-validation" action="" method="post" novalidate>

             <div class="box-container">

                <h1 class="text-center mb-3">Login</h1>

                <!-- error message -->
                <?php if(isset($_SESSION['error'])) {?>
                    <div class="alert alert-danger">
                        <?php echo $_SESSION['error'];  ?>
                        <?php unset($_SESSION['error']);  ?>
                    </div>
                <?php } ?>

                <div class="col-md-12 col-lg-12">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control mb-3" id="email" name="email" placeholder="Please enter your email" required>
                </div>

                <div class="col-md-12 col-lg-12">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control mb-3" id="password" name="password" placeholder="Please enter your password" required>
                </div>

                <div class="col-12 col-md-12 col-lg-12">
                    <input type="checkbox" class="mb-3" id="togglePassword"> Show password
                    <button class="btn btn-primary w-100 mb-3" type="submit" name="submit">login</button>
                </div>

                <div class="col-12 col-md-12 col-lg-12">
                    <p>Don't have an account? <a href="register.php">register</a> </p>
                </div>

             </div>

           </form>

    </div>

    <script src="./component/script.js"></script>

</body>
</html>