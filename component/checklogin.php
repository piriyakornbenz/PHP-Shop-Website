<?php 

    if(isset($_SESSION['admin_login'])) {
        $id = $_SESSION['admin_login'];
        $stmt = $conn->prepare("SELECT * FROM admin WHERE id = :id");
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

    }else{
        header('location: login.php');
    }

?>