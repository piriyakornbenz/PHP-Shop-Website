<?php

session_start();
require('./backend/config.php');
require('./component/checklogin.php');

$stmt = $conn->prepare("SELECT * FROM section_icons");
$stmt->execute();
$row = $stmt->fetchAll(PDO::FETCH_ASSOC);

// update data
if (isset($_POST['update'])) {
    try {
        $id = $_POST['update_id'];
        $icon = $_FILES['icon_icons'];
        $heading = $_POST['heading_icons'];
        $description = $_POST['description_icons'];
        $img2 = $_POST['img2'];
        $upload = $_FILES['icon_icons']['name'];

        if ($upload != '') {
            $allow = ['jpg', 'jpeg', 'png'];
            $extension = explode(".", $icon['name']);
            $fileActExt = strtolower(end($extension));
            $fileNew = rand() . "." . $fileActExt;
            $filePath = "uploads/" . $fileNew;

            if (in_array($fileActExt, $allow)) {
                if ($icon['size'] > 0 && $icon['error'] == 0) {
                    move_uploaded_file($icon['tmp_name'], $filePath);
                }
            }
        } else {
            $fileNew = $img2;
        }

        $update = $conn->prepare("UPDATE section_icons SET icon = :icon, heading = :heading, description = :description WHERE id = :id");
        $update->bindParam(':id', $id);
        $update->bindParam(':icon', $fileNew);
        $update->bindParam(':heading', $heading);
        $update->bindParam(':description', $description);

        if ($update->execute()) {
            $_SESSION['success'] = "Updated successfully";
            echo '<script>window.location.href = "icons.php";</script>';
            exit;
        }
    } catch (PDOException $e) {
        $_SESSION['error'] = "Update failed: " . $e->getMessage();
    }
}

// add data
if (isset($_POST['add'])) {
    try {
        $heading = $_POST['add_heading_icons'];
        $description = $_POST['add_description_icons'];
        $icon = $_FILES['add_icon_icons'];

        $allow = ['jpg', 'jpeg', 'png'];
        $extension = explode(".", $icon['name']);
        $fileActExt = strtolower(end($extension));
        $fileNew = rand() . "." . $fileActExt;
        $filePath = "uploads/" . $fileNew;

        if (in_array($fileActExt, $allow)) {
            if ($icon['size'] > 0) {
                if (move_uploaded_file($icon['tmp_name'], $filePath)) {
                    $add = $conn->prepare("INSERT INTO section_icons(icon, heading, description) VALUES(:icon, :heading, :description)");
                    $add->bindParam(':icon', $fileNew);
                    $add->bindParam(':heading', $heading);
                    $add->bindParam(':description', $description);

                    if ($add->execute()) {
                        $_SESSION['success'] = "Insert successfully";
                        echo '<script>window.location.href = "icons.php";</script>';
                        exit;
                    } else {
                        $_SESSION['error'] = 'Insert failed';
                        header('location: icons.php');
                    }
                }
            }
        }
    } catch (PDOException $e) {
        $_SESSION['error'] = "Insert failed: " . $e->getMessage();
    }
}

// delete data
if (isset($_GET['id'])) {
    try {
        $id = $_GET['id'];
        $delete = $conn->prepare("DELETE FROM section_icons WHERE id=$id");

        if ($delete->execute()) {
            $_SESSION['success'] = "Delete successfully";
            echo '<script>window.location.href = "icons.php";</script>';
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
        <script src="./component/sidebar_icons.js"></script>

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
                    <p class="mb-4">Pages &nbsp;/&nbsp; Icons</p>

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
                <!-- End of Main Content -->

                <!-- DataTales -->
                <div class="card shadow m-4">

                    <div class="card-header py-3 d-flex justify-content-between align-items-center">
                        <h6 class="m-0 font-weight-bold text-primary">DataTables</h6>
                        <a class="btn btn-success px-3 addbtn">+ Add data</a>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr class="text-center">
                                        <th>Icon</th>
                                        <th>Heading</th>
                                        <th>Description</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php foreach ($row as $data) : ?>
                                        <tr class="text-center">
                                            <td style="display: none;"><?= $data['id']; ?></td>
                                            <td><img style="height: 30px; width: 30px;" src="./uploads/<?= $data['icon']; ?>"></td>
                                            <td><?= $data['heading']; ?></td>
                                            <td><?= $data['description']; ?></td>
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
    <script src="./component/update_icons.js"></script>
    <script src="./component/add_icons.js"></script>

</body>

</html>