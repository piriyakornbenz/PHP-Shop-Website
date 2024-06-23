<?php 

    session_start();
    require('./backend/config.php');

    if(isset($_POST['login'])) {
        $admin = trim($_POST['admin']);
        $password = trim($_POST['password']);

        if(empty($admin)) {
            $_SESSION['error'] = "Please enter your admin.";
            header('location: login_admin.php');
        }elseif(empty($password)) {
            $_SESSION['error'] = "Please enter your password.";
            header('location: login_admin.php');
        }else{
            try {
                $stmt = $conn->prepare("SELECT * FROM admin WHERE admin = :admin");
                $stmt->bindParam(":admin", $admin);
                $stmt->execute();
                $row = $stmt->fetch(PDO::FETCH_ASSOC);

                if($stmt->rowCount() > 0) {
                    if($admin == $row['admin']) {
                        if(password_verify($password, $row['password'])) {
                            $_SESSION['admin_login'] = $row['id'];
                            header("location: dashboard.php");
                        }else{
                            $_SESSION['error'] = 'Admin or password not correct.';
                            header("location: login_admin.php");
                        }
                    }
                }else {
                    $_SESSION['error'] = "No data this admin.";
                    header("location: login_admin.php");
                }

            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
    }

?>