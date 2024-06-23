<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard.php">
    <i class="fas fa-database"></i>
    <div class="sidebar-brand-text mx-3">Admin</div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item" id="dashboard_php" >
    <a class="nav-link" href="dashboard.php">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">Interface</div>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item" id="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
        aria-expanded="true" aria-controls="collapsePages">
        <i class="fas fa-fw fa-folder"></i>
        <span>Pages</span>
    </a>
    <div id="collapsePages" class="collapse" aria-labelledby="headingPages">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Includes:</h6>
            <a class="collapse-item" id="home_php" href="home.php">Home</a>
            <a class="collapse-item" id="about_php" href="about.php">About</a>
            <a class="collapse-item" id="icons_php" href="icons.php">Icons</a>
            <a class="collapse-item" id="products_php" href="products.php">Products</a>
            <a class="collapse-item" id="reviews_php" href="reviews.php">Reviews</a>
            <a class="collapse-item" id="footer_php" href="footer.php">Footer</a>
            <div class="collapse-divider"></div>
        </div>
    </div>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">Orders</div>

<!-- Nav Item - Charts -->
<li class="nav-item" id="order_php">
    <a class="nav-link" href="order.php">
        <i class="fas fa-fw fa-folder"></i>
        <span>Order data</span></a>
</li>

 <!-- Divider -->
 <hr class="sidebar-divider">

 <!-- Heading -->
 <div class="sidebar-heading">Users</div>

 <!-- Nav Item - Charts -->
 <li class="nav-item" id="dataTables_php">
     <a class="nav-link" href="dataTable_user.php">
         <i class="fas fa-fw fa-users"></i>
         <span>Users Data</span></a>
 </li>

 <!-- Divider -->
 <hr class="sidebar-divider">

 <!-- Heading -->
 <div class="sidebar-heading">Admin</div>

 <!-- Nav Item - Charts -->
 <li class="nav-item" id="dataTables_admin">
     <a class="nav-link" href="dataTable_admin.php">
         <i class="fas fa-fw fa-user-tie"></i>
         <span>Admin Data</span></a>
 </li>

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->