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
      if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true)
      {
        $loggedin= true;
        $id = $_SESSION['id'];
        $username = $_SESSION['username'];
        echo'<body class="text-light">
        <!-- navbar start -->
        <nav class="navbar navbar-expand-lg navbar-dark ftco-navbar bg-dark ftco-navbar-light" id="ftco-navbar">
            <div class="container-fluid">
                  <a class="navbar-brand" href="index.php"></a>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="oi oi-menu"></span> Menu
                  </button>
              <div class="collapse navbar-collapse" id="ftco-nav">
                <img src="Images/logo1.jpg" style="width:7%;height:7">
                <ul class="navbar-nav mr-auto">
                  <li class="nav-item"><a href="home.php" class="nav-link">Home</a></li>
                  <li class="nav-item"><a href="menu.php" class="nav-link">Menu</a></li>
                  <li class="nav-item"><a href="view_order.php" class="nav-link">Your Orders</a></li>
                  <li class="nav-item"><a href="about_us.php" class="nav-link">About Us</a></li>
                  <li class="nav-item"><a href="contact_us.php" class="nav-link">Contact Us</a></li>
                </ul>
                <form method="get" action="search.php" class="form-inline">
                    <input class="form-control mr-sm-2 mx-2" id="search" name="search" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-info my-2 my-sm-0 mx-2" type="submit">Search</button>
                </form>
                  <a href="cart.php"><button type="button" class="btn btn-secondary mx-2">Cart</button></a>
                  <ul class="navbar-nav mr-2">
                        <li class="nav-item"><a class="nav-link" href="#" role="button"> Welcome ' .$username. '</a></li>
                  </ul>
                  <a href="_logout.php"><button type="button" class="btn btn-info mx-2">Log Out</button></a>
              </div>
            </div>
        </nav>';
      }
      else
      {
        header("Location:index.php");
        exit();
      }
    ?>
        <!-- END nav -->
        <script src="JS/jquery.slim.min.js"></script>
        <script src="JS/bootstrap1.bundle.min.js"></script>
  </body>
</html>
