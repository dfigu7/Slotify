<?php 
  include("includes/includedFiles.php"); 

  $userLoggedIn = new User($con, $_SESSION['userLoggedIn']);
    
  if ($userLoggedIn->getUserRole() != 1) {
      header("Location: browse.php");
  }

  $albumQuery = mysqli_query($con, "SELECT * FROM albums");
  $totalAlbums = mysqli_num_rows($albumQuery);

  $userQuery = mysqli_query($con, "SELECT * FROM users");
  $totalUsers = mysqli_num_rows($userQuery);

  $artistQuery = mysqli_query($con, "SELECT * FROM artists");
  $totalArtists = mysqli_num_rows($artistQuery);

  $genreQuery = mysqli_query($con, "SELECT * FROM genres");
  $totalGenres = mysqli_num_rows($genreQuery);
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Slotify</title>

    <!-- Custom styles for this template-->
    <link href="assets/css/sb-admin-2.css" rel="stylesheet">
    <script src="assets/js/script.js"></script>

</head>

<body id="page-top">
  <!-- Page Wrapper -->
  <div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
      <!-- Sidebar - Brand -->
      <div class="sidebar-brand d-flex align-items-center justify-content-center" onclick='openPage("adminDashboard.php")' role="link">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Slotify</div>
      </div>
      <!-- Divider -->
      <hr class="sidebar-divider my-0">
      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <div class="nav-link" role="link">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span onclick="openPage('browse.php')">Back to slotify</span>
        </div>
      </li>
      <hr class="sidebar-divider my-0">
      <div class="sidebar-heading pt-3">
        Tables
      </div>
      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <div class="nav-link" href="tables.html" role="link">
            <i class="fas fa-fw fa-table"></i>
            <span onclick="openPage('users.php')">Users</span>
        </div>
      </li>
    </ul>
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">
          <!-- Topbar -->
          <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
            <!-- Sidebar Toggle (Topbar) -->
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                <i class="fa fa-bars"></i>
            </button>
            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">
              <!-- Nav Item - User Information -->
              <li class="nav-item dropdown no-arrow">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $userLoggedIn->getFirstAndLastName() ?></span>
              </li>
            </ul>
          </nav>
          <!-- Begin Page Content -->
          <div class="container-fluid">
            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
              <h1 class="h3 mb-0 text-gray-800">General Information</h1>
            </div>
            <!-- Content Row -->
            <div class="row">
              <!-- Earnings (Monthly) Card Example -->
              <div class="col-xl-3 col-md-6 mb-4">
                  <div class="card border-left-primary shadow h-100 py-2">
                      <div class="card-body">
                          <div class="row no-gutters align-items-center">
                              <div class="col mr-2">
                                  <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                      Total Users</div>
                                  <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $totalUsers ?></div>
                              </div>
                              <div class="col-auto">
                                  <i class="fas fa-calendar fa-2x text-gray-300"></i>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-xl-3 col-md-6 mb-4">
                  <div class="card border-left-success shadow h-100 py-2">
                      <div class="card-body">
                          <div class="row no-gutters align-items-center">
                              <div class="col mr-2">
                                  <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                      Total Artists</div>
                                  <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $totalArtists ?></div>
                              </div>
                              <div class="col-auto">
                                  <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-xl-3 col-md-6 mb-4">
                  <div class="card border-left-info shadow h-100 py-2">
                      <div class="card-body">
                          <div class="row no-gutters align-items-center">
                              <div class="col mr-2">
                                  <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Genres
                                  </div>
                                  <div class="row no-gutters align-items-center">
                                      <div class="col-auto">
                                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $totalGenres ?></div>
                                      </div>
                                      <div class="col">
                                          <div class="progress progress-sm mr-2">
                                              <div class="progress-bar bg-info" role="progressbar"
                                                  style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                                  aria-valuemax="100"></div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-auto">
                                  <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                          <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                              Total Albums</div>
                          <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $totalAlbums ?></div>
                      </div>
                      <div class="col-auto">
                          <i class="fas fa-comments fa-2x text-gray-300"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>