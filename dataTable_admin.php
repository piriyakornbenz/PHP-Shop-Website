<?php

    session_start();
    require('./backend/config.php');
    require('./component/checklogin.php');

    $count = 1;

    $stmt = $conn->prepare("SELECT * FROM admin");
    $stmt->execute();
    $row = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // add data
    if (isset($_POST['add'])) {
        try {
            $admin = $_POST['add_name_admin'];
            $password = $_POST['add_password_admin'];
            $hashed_password = password_hash($password, PASSWORD_BCRYPT);

            $add = $conn->prepare("INSERT INTO admin(admin, password) VALUES(:admin, :password)");
            $add->bindParam(':admin', $admin);
            $add->bindParam(':password', $hashed_password);

            if ($add->execute()) {
                $_SESSION['success'] = "Insert successfully";
                echo '<script>window.location.href = "dataTable_admin.php";</script>';
                exit;
            } else {
                $_SESSION['error'] = 'Insert failed';
                header('location: dataTable_admin.php');
            }
        } catch (PDOException $e) {
            $_SESSION['error'] = "Insert failed: " . $e->getMessage();
        }
    }

    // update data
    if (isset($_POST['update'])) {
        try {
            $id = $_POST['update_id_admin'];
            $admin = $_POST['update_name_admin'];
            $password = $_POST['update_password_admin'];
            $hashed_password = password_hash($password, PASSWORD_BCRYPT);

            $update = $conn->prepare("UPDATE admin SET admin = :admin, password = :password WHERE id = :id");
            $update->bindParam(':id', $id);
            $update->bindParam(':admin', $admin);
            $update->bindParam(':password', $hashed_password);

            if ($update->execute()) {
                $_SESSION['success'] = "Updated successfully";
                echo '<script>window.location.href = "dataTable_admin.php";</script>';
                exit;
            }
        } catch (PDOException $e) {
            $_SESSION['error'] = "Update failed: " . $e->getMessage();
        }
    }

    // delete data
    if (isset($_GET['id'])) {
        try {
            $id = $_GET['id'];
            $delete = $conn->prepare("DELETE FROM admin WHERE id=$id");

            if ($delete->execute()) {
                $_SESSION['success'] = "Delete successfully";
                echo '<script>window.location.href = "dataTable_admin.php";</script>';
                exit;
            }
        } catch (PDOException $e) {
            $_SESSION['error'] = "Delete failed: " . $e->getMessage();
        }
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Admin - Dashboard</title>
    <!-- link css -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <script src="./component/script.js"></script>
</head>


<body id="page-top">

    <div id="wrapper">

        <!-- sidebar -->
        <?php include('./component/sidebar.php'); ?>
        <script src="./component/sidebar_dataTablesAdmin.js"></script>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- topbar -->
                <?php include('./component/topbar.php'); ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Data Tables</h1>
                    <p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Error, modi. Nisi, iste. Blanditiis, dolorum, consequuntur hic nostrum molestias esse dolores dolore doloribus voluptate quasi iusto sint, porro nobis fuga repellendus!</p>

                    <?php if (isset($_SESSION['success'])) { ?>
                        <div class="alert alert-success">
                            <?php echo $_SESSION['success']; ?>
                            <?php unset($_SESSION['success']); ?>
                        </div>
                    <?php } ?>

                    <?php if (isset($_SESSION['error'])) { ?>
                        <div class="alert alert-danger">
                            <?php echo $_SESSION['error']; ?>
                            <?php unset($_SESSION['error']); ?>
                        </div>
                    <?php } ?>

                </div>

                <!-- DataTales -->
                <div class="card shadow m-4">

                    <div class="card-header py-3 d-flex justify-content-between align-items-center">
                        <h6 class="m-0 font-weight-bold text-primary">Admin</h6>
                        <a class="btn btn-success px-3 addbtn">+ Add data</a>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr class="text-center">
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Password</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php foreach ($row as $data) : ?>
                                        <tr class="text-center">
                                            <td style="display: none;"><?= $data['id']; ?></td>
                                            <td><?= $count++; ?></td>
                                            <td><?= $data['admin']; ?></td>
                                            <td><?= $data['password']; ?></td>
                                            <td style="width: 200px;">
                                                <a class="btn btn-primary editbtn">Edit</a>
                                                <a href="?id=<?= $data['id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
                <!-- End DataTales -->


            </div>
            <!-- End of Page Wrapper -->

            <!-- footer -->
            <?php include('./component/footer.php'); ?>

            <!-- logout modal -->
            <?php include('./component/modal.php'); ?>

            <!-- Bootstrap core JavaScript-->
            <script src="vendor/jquery/jquery.min.js"></script>
            <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

            <!-- Core plugin JavaScript-->
            <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

            <!-- Custom scripts for all pages-->
            <script src="js/sb-admin-2.min.js"></script>

            <!-- Page level plugins -->
            <script src="vendor/chart.js/Chart.min.js"></script>

            <!-- Page level custom scripts -->
            <script src="js/demo/chart-area-demo.js"></script>
            <script src="js/demo/chart-pie-demo.js"></script>

            <!-- add & update modal -->
            <script>
                $(document).ready(function() {
                    $('.addbtn').on('click', function() {
                        $('#addModalAdmin').modal('show');
                    });
                });

                $(document).ready(function () {
                    $('.editbtn').on('click', function () {
                        $('#updateModalAdmin').modal('show');
                        $tr = $(this).closest('tr');
                        var data = $tr.children("td").map(function () {
                            return $(this).text();
                        }).get();
                        $('#update_id_admin').val(data[0]);
                        $('#update_name_admin').val(data[2]);
                    });
                });
            </script>

</body>

</html>