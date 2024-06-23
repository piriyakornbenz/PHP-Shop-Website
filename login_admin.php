<?php 

    session_start(); 

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

           <form class="row g-3 needs-validation" action="login_db.php" method="post" novalidate>

             <div class="box-container">

                <h1 class="text-center">Admin Login</h1>

                <div class="col-md-12 col-lg-12">
                    <label for="admin" class="form-label">Admin</label>
                    <input type="text" class="form-control mb-3" id="admin" name="admin" required>
                </div>

                <div class="col-md-12 col-lg-12">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control mb-3" id="password" name="password" required>
                </div>

                <div class="col-12 col-md-12 col-lg-12">
                    <input type="checkbox" class="mb-3" id="togglePassword"> Show password
                    <button class="btn btn-primary w-100 mb-3" type="submit" name="login">login</button>
                </div>

                <!-- error message -->
                <?php if(isset($_SESSION['error'])) {?>
                    <div class="erro_ms text-danger">
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