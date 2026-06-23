<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Navbar</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel = "icon" href ="Images/logo1.jpg" type = "image/x-icon">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <style>
            body{
              background-image: url('Images/bg_4.jpg');
            }
            input{
              background: transparent !important;
              border: none;
              border-bottom: 1px solid #fac564;
            }
        </style>
    </head>
    <?php 
      require_once("connect.php");
      session_start();
      if(isset($_SESSION['adminloggedin']) && $_SESSION['adminloggedin']==true){
        $adminloggedin= true;
        $adminid = $_SESSION['adminid'];
        $adminname = $_SESSION['adminname'];
    ?>
    <body class="text-light">
        <!-- navbar start -->
        <nav class="navbar navbar-expand-lg navbar-dark ftco-navbar bg-dark ftco-navbar-light" id="ftco-navbar">
            <div class="container-fluid">
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="oi oi-menu"></span> Menu
                  </button>
              <div class="collapse navbar-collapse" id="ftco-nav">
                  <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a href="admin_home.php" class="nav-link">Home</a></li>
                    <li class="nav-item"><a href="admin_order.php" class="nav-link">Orders</a></li>
                    <li class="nav-item"><a href="admin_category_list.php" class="nav-link">Category</a></li>
                    <li class="nav-item"><a href="admin_menu.php" class="nav-link">Menu</a></li>
                    <li class="nav-item"><a href="admin_contact_info.php" class="nav-link">Contact Info</a></li>
                    <li class="nav-item"><a href="admin_customer.php" class="nav-link">Customers</a></li>
                    <li class="nav-item"><a href="admin_admin.php" class="nav-link">Admin</a></li>
                    <li class="nav-item"><a href="admin_settings.php" class="nav-link">Site</a></li>
                  </ul>
                  <a href="_logout.php"><button type="button" class="btn btn-info mx-2">Log Out</button></a>
                </div>
            </div>
          </nav>
        <!-- END nav -->
        <?php
          }
          else
          {
            header("Location:admin_index.php");
            exit();
          }
        ?>
        <script src="JS/jquery.slim.min.js"></script>
        <script src="JS/bootstrap1.bundle.min.js"></script>
    </body>
</html>   