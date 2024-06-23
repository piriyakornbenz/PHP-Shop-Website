<?php 

    session_start();
    require('./backend/config.php');
    require('./component/checklogin.php');

    $i=1;

    $stmt = $conn->prepare("SELECT * FROM section_products");
    $stmt->execute();
    $row = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // update data
    if(isset($_POST['update'])) {
        try {
            $id = $_POST['update_id'];
            $heading = $_POST['heading_products'];
            $price = $_POST['price_products'];
            $discount = $_POST['discount_products'];
            $img = $_FILES['picture_products'];
            $img2 = $_POST['img2'];
            $upload = $_FILES['picture_products']['name'];

            if($upload != '') {
                $allow = ['jpg', 'jpeg', 'png'];
                $extension = explode(".", $img['name']);
                $fileActExt = strtolower(end($extension));
                $fileNew = rand() . "." . $fileActExt;
                $filePath = "uploads/" . $fileNew;
    
                if(in_array($fileActExt, $allow)) {
                    if($img['size'] > 0 && $img['error'] == 0) {
                        move_uploaded_file($img['tmp_name'], $filePath);
                    }
                }
            }else {
                $fileNew = $img2;
            }

            $update = $conn->prepare("UPDATE section_products SET heading = :heading, price = :price, discount = :discount, picture = :picture WHERE id = :id");
            $update->bindParam(':id', $id);
            $update->bindParam(':heading', $heading);
            $update->bindParam(':price', $price);
            $update->bindParam(':discount', $discount);
            $update->bindParam(':picture', $fileNew);
            
            if ($update->execute()) {
                $_SESSION['success'] = "Updated successfully";
                echo '<script>window.location.href = "products.php";</script>';
                exit;
            }
            
        } catch (PDOException $e) {
            $_SESSION['error'] = "Update failed: " . $e->getMessage();
        }
    }

    // add data
    if(isset($_POST['add'])) {
        try {
            $heading = $_POST['add_heading_products'];
            $price = $_POST['add_price_products'];
            $discount = $_POST['add_discount_products'];
            $img = $_FILES['add_picture_products'];
            
            $allow = ['jpg', 'jpeg', 'png'];
            $extension = explode(".", $img['name']);
            $fileActExt = strtolower(end($extension));
            $fileNew = rand() . "." . $fileActExt;
            $filePath = "uploads/" . $fileNew;
            
            if(in_array($fileActExt, $allow)) {
                if($img['size'] > 0) {
                    if(move_uploaded_file($img['tmp_name'], $filePath)) {
                        $add = $conn->prepare("INSERT INTO section_products(heading, price, discount, picture) VALUES(:heading, :price, :discount, :picture)");
                        $add->bindParam(':heading', $heading);
                        $add->bindParam(':price', $price);
                        $add->bindParam(':discount', $discount);
                        $add->bindParam(':picture', $fileNew);

                        if ($add->execute()) {
                            $_SESSION['success'] = "Insert successfully";
                            echo '<script>window.location.href = "products.php";</script>';
                            exit;
                        }else {
                            $_SESSION['error'] = 'Insert failed';
                            header('location: products.php');
                        }
                    }
                }
            }
            
        } catch (PDOException $e) {
            $_SESSION['error'] = "Insert failed: " . $e->getMessage();
        }
    }

    // delete data
    if(isset($_GET['id'])) {
        try {
            $id = $_GET['id'];
            $delete = $conn->prepare("DELETE FROM section_products WHERE id=$id");
            
            if ($delete->execute()) {
                $_SESSION['success'] = "Delete successfully";
                echo '<script>window.location.href = "products.php";</script>';
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
    
</head>

<body id="page-top">

    <div id="wrapper">

        <!-- sidebar -->
        <?php include('./component/sidebar.php'); ?>
        <script src="./component/sidebar_products.js"></script>

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
                    <p class="mb-4">Pages &nbsp;/&nbsp; Products</p>

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

                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">DataTables</h6>
                    <a class="btn btn-success px-3 addbtn">+ Add data</a>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
                            <thead> 
                                <tr class="text-center fs-1">
                                    <th>#</th>
                                    <th>Heading</th>
                                    <th>Price</th>
                                    <th>Discount</th>
                                    <th>Picture</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php foreach($row as $data):?>
                                <tr class="text-center">
                                    <td style="display: none;"><?= $data['id']; ?></td>
                                    <td><?= $i++ ?></td>
                                    <td><?= $data['heading']; ?></td>
                                    <td><?= $data['price']; ?>.-</td>
                                    <td><?= $data['discount']; ?>%</td>
                                    <td><img src="uploads/<?= $data['picture']; ?>" style="width: 90px; height:100px; object-fit: cover;"></td>
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

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- logout modal -->
    <?php include('./component/modal.php'); ?>


    <!-- update modal -->
    <script src="./component/add_products.js"></script>
    

</body>
</html>