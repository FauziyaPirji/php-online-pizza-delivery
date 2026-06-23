<!DOCTYPE html>
<html lang="en">
    <head>
        <title>SignUp</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel = "icon" href ="Images/logo.jpg" type = "image/x-icon">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <style>
            input{
                background: transparent !important;
                border: none;
                border-bottom: 1px solid #fac564;
            }
            body{
              background-image: url('Images/bg_4.jpg');
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
        <form action="signup_2.php" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
        <br>
            <h1>SignUp Here</h1>
            <hr class="bg-dark">
            <br>
            <div class="form-row d-flex">
                <div class="col-md-2 mb-3">
                    <h5><label for="username">User Name : </label></h5>
                </div>
                <div class="col-md-3 mb-3">
                    <input type="text" class="form-control" id="username" name="username" required>
                    <div class="invalid-tooltip">Required</div>
                </div>
            </div>
            <div class="form-row d-flex">
                <div class="col-md-2 mb-3">
                    <h5><label for="firstname">First Name : </label></h5>
                </div>
                <div class="col-md-3 mb-3">
                    <input type="text" class="form-control" id="firstname" name="firstname" required>
                    <div class="invalid-tooltip">Required</div>
                </div>
                <div class="col-md-2 mb-3">
                    <h5><label for="lastname">Last Name : </label></h5>
                </div>
                <div class="col-md-3 mb-3">
                    <input type="text" class="form-control" id="lastname" name="lastname" required>
                    <div class="invalid-tooltip">Required</div>
                </div>
            </div>
            <div class="form-row d-flex">
                <div class="col-md-2 mb-3">
                    <h5><label for="image">Select image to upload:</label></h5>
                </div>
                <div class="col-md-3 mb-3">
                    <input type="file" name="image" id="image" class="form-control" required>
                    <div class="invalid-tooltip">Required</div>
                </div>
            </div>
            <div class="form-row d-flex">
                <div class="col-md-2 mb-3">
                    <h5><label for="email">Email : </label></h5>
                </div>
                <div class="col-md-3 mb-3">
                    <input type="email" class="form-control" id="email" name="email" required>
                    <div class="invalid-tooltip">Required</div>
                </div>
                <div class="col-md-2 mb-3">
                    <h5><label for="phoneno">Phone No : </label></h5>
                </div>
                <div class="col-md-3 mb-3">
                    <input type="tel" class="form-control" id="phoneno" name="phoneno" required>
                    <div class="invalid-tooltip">Required</div>
                </div>
            </div>
            <div class="form-row d-flex">
                <div class="col-md-2 mb-3">
                    <h5><label for="password">Password : </label></h5>
                </div>
                <div class="col-md-3 mb-3">
                    <input type="password" class="form-control" id="password" name="password" required>
                    <div class="invalid-tooltip">Required</div>
                </div>
                <div class="col-md-2 mb-3">
                    <h5><label for="confirmpassword">Confirm Password : </label></h5>
                </div>
                <div class="col-md-3 mb-3">
                    <input type="password" class="form-control" id="confirmpassword" name="confirmpassword" required>
                    <div class="invalid-tooltip">Required</div>
                </div>
            </div>
            <br>
            <button class="btn btn-primary btn-block" type="submit" id="submit" name="submit">Sign Up</button>
            <br>
            <p>Already have an account? <a href="index.php">Login Here</a></p>
        </form>
        </center>
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
        <?php require '_footer.php' ?>
    </body>
</html>