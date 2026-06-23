<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Site Settings</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel = "icon" href ="Images/logo.jpg" type = "image/x-icon">
        <link rel="stylesheet" href="css/bootstrap.min.css">
    </head>
    <body>
        <?php require_once 'admin_navbar.php' ?>
        <?php
                        require_once("connect.php");
                            $sql = "SELECT * FROM `sitedetails`"; 
                            $result = mysqli_query($conn, $sql);
                            while($row=mysqli_fetch_assoc($result)) {
                                $tempId = $row['tempId'];
                                $systemName = $row['systemName'];
                                $email = $row['email'];
                                $contact1 = $row['contact1'];
                                $contact2 = $row['contact2'];
                                $address = $row['address'];
                            }
        ?>
        <div class="container-fluid d-flex justify-content-center" style="margin-top:98px">
            <div class="card col-lg-6 p-0">
                <div class="title" style="background-color: rgb(111 202 203);">
                    <em><h2 class="text-center" style="margin-top: 11px;"><?php echo $systemName; ?></h2></em>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="name" class="control-label">System Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="<?php echo $systemName; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="email" class="control-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="contact" class="control-label">Contact-1</label>
                            <input type="tel" class="form-control" id="contact1" name="contact1" value="<?php echo $contact1; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="contact" class="control-label">Contact-2(optional)</label>
                            <input type="tel" class="form-control" id="contact2" name="contact2" value="<?php echo $contact2; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="address" class="control-label">Address</label>
                            <input type="text" class="form-control" id="address" name="address" value="<?php echo $address; ?>" required>
                        </div>
                        <center>
                            <button name="updateDetail" class="btn btn-info btn-primary btn-lg btn-block">Save</button>
                        </center>
                    </form>
                </div>
            </div>
            <?php
                if($_SERVER["REQUEST_METHOD"] == "POST") {

                    if(isset($_POST['updateDetail'])) {
                        $name = $_POST["name"];
                        $email = $_POST["email"];
                        $contact1 = $_POST["contact1"];
                        $contact2 = $_POST["contact2"];
                        $addr = $_POST["address"];
                        $sql = "UPDATE `sitedetails` SET systemName = '$name' WHERE tempId = 1";   
                        $result = mysqli_query($conn, $sql);
                        $sql = "UPDATE `sitedetails` SET email = '$email' WHERE tempId = 1";   
                        $result = mysqli_query($conn, $sql);
                        $sql = "UPDATE `sitedetails` SET contact1 = '$contact1' WHERE tempId = 1";   
                        $result = mysqli_query($conn, $sql);
                        $sql = "UPDATE `sitedetails` SET contact2 = '$contact2' WHERE tempId = 1";   
                        $result = mysqli_query($conn, $sql);
                        $sql = "UPDATE `sitedetails` SET `address` = '$addr' WHERE tempId = 1";   
                        $result = mysqli_query($conn, $sql);
                        if($result){
                            echo "<script>
                                window.location=document.referrer;
                                </script>";
                        }    
                    }
                }
            ?>
    </body>
</html>
