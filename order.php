<?php

    session_start();
    require('./backend/config.php');
    require('./component/checklogin.php');

    $count = 1;

    $stmt = $conn->prepare("SELECT * FROM orders ORDER BY date DESC");
    $stmt->execute();
    $row = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $status = "received";
        $stmt = $conn->prepare("UPDATE orders SET status=:status WHERE id=:id");
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':status', $status);
        $stmt->execute();
        header('location: order.php');
        exit();
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
        <script src="./component/sidebar_order.js"></script>

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
                        <h6 class="m-0 font-weight-bold text-primary">Orders</h6>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr class="text-center">
                                        <th>No</th>
                                        <th>User id</th>
                                        <th>Product id</th>
                                        <th>Price</th>
                                        <th>Order date</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php foreach ($row as $data) : ?>
                                        <tr class="text-center">
                                            <td style="display: none;"><?= $data['id']; ?></td>
                                            <td><?= $count++; ?></td>
                                            <td><?= $data['customer_id']; ?></td>
                                            <td><?= $data['product_id']; ?></td>
                                            <td><?= $data['price']; ?></td>
                                            <td><?= $data['date']; ?></td>
                                            <?php if($data['status'] == "received") { ?>
                                                <td class="text-success">delivered</td>
                                            <?php }else { ?>
                                                <td><a href="?id=<?= $data['id'] ?>" class="btn btn-primary" onclick="return confirm('Are you sure you want to confirm?')">confirm</a></td>
                                            <?php } ?>
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

</body>

</html>