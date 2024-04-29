<?php
    include("includes/config.php");
    include("includes/classes/Account.php");
    include("includes/classes/Constants.php");
    include("includes/classes/User.php");
    
    $userLoggedIn = new User($con, $_SESSION['userLoggedIn']);
    
    if ($userLoggedIn->getUserRole() != 1) {
        header("Location: browse.php");
    }
    $account = new Account($con);

    include("includes/handlers/admin-register-handler.php");
    
    function getInputValue($name) {
        if(isset($_POST[$name])){
            echo $_POST[$name];
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
            <!-- REGISTER FORM -->
            <form class="user-form" action="addUser.php" id="registerForm" method="POST">
                <h2 class="text-primary">Create user</h2>
                <p>
                    <label class="text-gray-700" for="username">Username</label>
                    <br>
                    <span class="text-danger"><?php echo $account->getError(Constants::$usernameCharacters); ?></span>
                    <span class="text-danger"><?php echo $account->getError(Constants::$usernameTaken); ?></span>
                    <input class="form-control form-control-user" id="username" name="username" type="text" placeholder="e.g. bartSimpson" value="<?php getInputValue('username') ?>" required>
                </p>

                <p>
                    <label class="text-gray-700" for="firstName">First Name</label>
                    <br>
                    <span class="text-danger">
                        <?php echo $account->getError(Constants::$firstNameCharacters); ?>
                    </span>
                    <input class="form-control form-control-user" id="firstName" name="firstName" type="text" placeholder="e.g. Bart"
                    value="<?php getInputValue('firstName') ?>" required>
                </p>

                <p>
                    <label class="text-gray-700" for="lastName">Last Name</label>
                    <br>
                    <span class="text-danger">
                        <?php echo $account->getError(Constants::$lastNameCharacters); ?>
                    </span>
                    <input class="form-control form-control-user" id="lastName" name="lastName" type="text" placeholder="e.g. Simpson" value="<?php getInputValue('lastName') ?>" required>
                </p>

                <p>
                    <label class="text-gray-700" for="email">Email</label>
                    <br>
                    <span class="text-danger">
                        <?php echo $account->getError(Constants::$emailsDoNotMatch); ?>
                    </span>
                    <span class="text-danger">
                        <?php echo $account->getError(Constants::$emailInvalid); ?>
                    </span>
                    <span class="text-danger">
                        <?php echo $account->getError(Constants::$emailTaken); ?>
                    </span>
                    <input class="form-control form-control-user" id="email" name="email" type="email" placeholder="e.g. bart@gmail.com" value="<?php getInputValue('email') ?>" required>
                </p>

                <p>
                    <label class="text-gray-700" for="email2">Confirm email</label>
                    <input class="form-control form-control-user" id="email2" name="email2" type="email" placeholder="e.g. bart@gmail.com" required>
                </p>

                <p>
                    <label class="text-gray-700" for="password">Password</label>
                    <br>
                    <span class="text-danger">
                        <?php echo $account->getError(Constants::$passwordsDoNotMatch); ?>
                    </span>                
                    <span class="text-danger">
                        <?php echo $account->getError(Constants::$passwordNotAlphanumeric); ?>
                    </span>                
                    <span class="text-danger">
                        <?php echo $account->getError(Constants::$passwordCharacters); ?>
                    </span>
                    <input class="form-control form-control-user" id="password" name="password" placeholder="Your password" type="password" required>
                </p>

                <p>
                    <label class="text-gray-700" for="password2">Confirm password</label>
                    <input class="form-control form-control-user" id="password2" name="password2" type="password" placeholder="Your password" required>
                </p>

                <button type="submit" name="registerButton" class="btn btn-primary">Create</button>
            </form>
        </div>
      </div>
    </div>
  </body>
</html>