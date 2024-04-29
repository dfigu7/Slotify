<?php 
    include("includes/includedFiles.php"); 

    $usersToShowQuery = mysqli_query($con, "SELECT * FROM users");

    $usersToShow = mysqli_fetch_all($usersToShowQuery, MYSQLI_ASSOC);
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
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Users</h6>
                    <div>
                        <button onclick='openPage("addUser.php")' class="btn btn-primary ml-auto">Add User</button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th class="text-primary">Username</th>
                                    <th class="text-primary">Firstname</th>
                                    <th class="text-primary">Lastname</th>
                                    <th class="text-primary">Email</th>
                                    <th class="text-primary">User role</th>
                                    <th class="text-primary">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($usersToShow as $key => $user): ?>
                                    <tr>
                                        <td class="text-primary"><?= $user['username'] ?></td>
                                        <td class="text-primary"><?= $user['firstName'] ?></td>
                                        <td class="text-primary"><?= $user['lastName'] ?></td>
                                        <td class="text-primary"><?= $user['email'] ?></td>
                                        <td class="text-primary"><?= $user['role'] ?></td>
                                        <td>
                                            <?php $userId = $user['id']; ?>
                                            <button type="button" onclick="deleteUser('<?php echo $userId; ?>')" class="btn btn-danger">Delete</button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
  </body>
</html>