<?php 

    session_start();
    require('./backend/config.php');
    require('./component/checklogin.php');

    $stmt = $conn->prepare("SELECT * FROM section_footer");
    $stmt->execute();
    $row = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if(isset($_POST['update'])) {
        try {
            $id = $_POST['update_id'];
            $footer = $_POST['update_footer'];

            $update = $conn->prepare("UPDATE section_footer SET footer = :footer WHERE id = :id");
            $update->bindParam(':id', $id);
            $update->bindParam(':footer', $footer);
            
            if ($update->execute()) {
                $_SESSION['success'] = "Updated successfully";
                echo '<script>window.location.href = "footer.php";</script>';
                exit;
            }
            
        } catch (PDOException $e) {
            $_SESSION['error'] = "Update failed: " . $e->getMessage();
        }
    }

    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $deletefooter = $conn->prepare("DELETE FROM section_footer WHERE id=$id");
        
        if ($deletefooter->execute()) {
            $_SESSION['success'] = "Delete success";
            header('location:footer.php');
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
        <script src="./component/sidebar_footer.js"></script>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- topbar -->
                <?php include('./component/topbar.php'); ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Pages</h1>
                    <p class="mb-4">Pages &nbsp;/&nbsp; Footer</p>

                    <?php if(isset($_SESSION['success'])) { ?>
                        <div class="alert alert-success">
                            <?php echo $_SESSION['success']; ?> 
                            <?php unset($_SESSION['success']); ?> 
                        </div>
                    <?php } ?>

                    <?php if(isset($_SESSION['error'])) { ?>
                        <div class="alert alert-danger">
                            <?php echo $_SESSION['error']; ?> 
                            <?php unset($_SESSION['error']); ?> 
                        </div>
                    <?php } ?>

            </div>
            <!-- End of Main Content -->

            <!-- DataTales -->
            <div class="card shadow m-4">

                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">DataTables</h6>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr class="text-center">
                                    <th>Footer</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php foreach($row as $data): ?>
                                <tr class="text-center">
                                    <td style="display: none;"><?= $data['id']; ?></td>
                                    <td><?= $data['footer']; ?></td>
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

            </div>
            <!-- /.container-fluid -->

            <!-- footer -->
            <?php include('./component/footer.php'); ?>

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

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

    <!-- update modal -->
    <script src="./component/update_footer.js"></script>

</body>
</html>