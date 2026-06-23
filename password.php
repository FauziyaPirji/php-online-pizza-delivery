<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Forgot</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel = "icon" href ="Images/logo.jpg" type = "image/x-icon">
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
    <body>  
        <!-- Background image -->
        <div class="bg-image" style="background-image: url('Images/bg_2.jpg');height: 150px;background-size:cover;">
        </div>
        <!-- Background image-->
        <div class="container-md card bg-body-tertiary text-light" style="background-image: url(Images/blur.jpg);margin-top:-50px;">
            <center>
            <form class="needs-validation" action="" method="post" novalidate>
                <br>
                <h1>Reset password Here</h1>
                <hr class="bg-dark">
                <br>
                <div class="form-row d-flex justify-content-center">
                    <div class="col-md-6 mb-3">
                        <h3><label>Email : </label></h3>
                        <input type="text-light" id="email" name="email" class="form-control" required>
                        <div class="invalid-tooltip">
                            Required
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <h3><label>Password : </label></h3>
                        <input type="text-light" id="password" name="password" class="form-control" required>
                        <div class="invalid-tooltip">
                            Required
                        </div>
                    </div>
                </div>
                <br>
                <button class="btn btn-primary btn-block" type="submit" name="submit" id="submit">Reset</button>
            </form>
            </center>
        </div>
        <script>
            // Example starter JavaScript for disabling form submissions if there are invalid fields
            (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
                });
            }, false);
            })();
        </script>
        <?php
            require_once("connect.php");
            if(isset($_POST["submit"]))
            {
                $email = $_POST['email'];
                $pass = $_POST['password'];
                $sql = "SELECT * FROM `customer` WHERE `email`='$email'";   
                $result = mysqli_query($conn, $sql);
                $num = mysqli_num_rows($result);
                if ($num == 1){
                    $sql = "UPDATE `customer` SET `password`='$pass' WHERE `email`='$email'";
                    $result = mysqli_query($conn,$sql);
                    header("location: /php-online-pizza-delivery/index.php");
                }
                else {
                    echo "<script>alert('failed');
                        window.location=document.referrer;
                        </script>";
                }
            }
        ?>
        <?php require '_footer.php' ?>
    </body>
</html>