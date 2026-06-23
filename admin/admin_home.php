<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Home</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel = "icon" href ="Images/logo.jpg" type = "image/x-icon">
        <link rel="stylesheet" href="css/bootstrap.min.css">
    </head>
    <body>
        <?php require 'admin_navbar.php' ?>
        <div class="alert alert-info alert-dismissible fade show" role="alert" style="width:100%">
            <strong>Success!</strong> You are logged in
            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span></button>
        </div>
        <h1 style="margin-top:98px">Welcome back <b><?php echo $_SESSION['adminname']; ?></b></h1>
        <script>
                $('.nav-home').addClass('active')
        </script>

    </body>
</html>
