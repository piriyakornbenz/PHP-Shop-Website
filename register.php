<?php 

    session_start(); 
    require('./backend/config.php');

    if (isset($_POST['submit'])) {
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $conn->prepare("INSERT INTO customers(firstname, lastname, email, password) VALUES(:firstname, :lastname, :email, :password)");
        $stmt->bindParam('firstname', $firstname);
        $stmt->bindParam('lastname', $lastname);
        $stmt->bindParam('email', $email);
        $stmt->bindParam('password', $hashed_password);
        $result = $stmt->execute();

        if ($result) {
            $_SESSION['success'] = "insert success";
            header('location: register.php');
        }else{
            $_SESSION['error'] = "insert failed";
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

                <h1 class="text-center">Register</h1>

                <div class="col-md-12 col-lg-12">
                    <label for="firstname" class="form-label">Firstname</label>
                    <input type="text" class="form-control mb-3" id="firstname" name="firstname" placeholder="Please enter your firstname" required>
                </div>

                <div class="col-md-12 col-lg-12">
                    <label for="lastname" class="form-label">Lastname</label>
                    <input type="text" class="form-control mb-3" id="lastname" name="lastname" placeholder="Please enter your lastname" required>
                </div>

                <div class="col-md-12 col-lg-12">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control mb-3" id="email" name="email" placeholder="Please enter your email" required>
                </div>

                <div class="col-md-12 col-lg-12">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control mb-3" id="password" name="password" placeholder="Please enter your password" required>
                </div>

                <div class="col-12 col-md-12 col-lg-12">
                    <input type="checkbox" class="mb-4" id="togglePassword"> Show password
                    <button class="btn btn-primary w-100 mb-3" type="submit" name="submit">Register</button>
                </div>

                <div class="col-12 col-md-12 col-lg-12">
                   <p>Already have an account? <a href="login.php">Login</a> </p>
                </div>

                <!-- success message -->
                <?php if(isset($_SESSION['success'])) {?>
                    <div class="alert alert-success">
                        <?php echo $_SESSION['success'];  ?>
                        <?php unset($_SESSION['success']);  ?>
                    </div>
                <?php } ?>

                <!-- error message -->
                <?php if(isset($_SESSION['error'])) {?>
                    <div class="alert alert-danger">
                        <?php echo $_SESSION['error'];  ?>
                        <?php unset($_SESSION['error']);  ?>
                    </div>
                <?php } ?>

             </div>

           </form>

    </div>

    <script src="./component/script.js"></script>
</body>
</html>