<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Customer</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel = "icon" href ="Images/logo.jpg" type = "image/x-icon">
        <link rel="stylesheet" href="css/bootstrap.min.css">
    </head>
    <body>
        <?php require 'admin_navbar.php' ?>
        <div class="container-md card bg-body-tertiary" style="margin-top:98px;background: aliceblue;">
            <div class="table-wrapper">
                <div class="table-title card bg-body-tertiary">
                    <div class="form-row d-flex">
                        <div class="col-sm-4">
                            <h2>Customer <b>Details</b></h2>
                        </div>
                        <div class="col">
                            <button class="btn btn-primary float-right btn-sm" data-toggle="modal" data-target="#newCustomer">
                                <!-- <i class="fa fa-plus"></i>--> New customer
                            </button>
                        </div>
                    </div>
                </div>
                <table class="table table-striped table-hover table-center table-responsive-md" id="NoOrder">
                    <thead style="background-color: rgb(111 202 203);">
                        <tr>
                            <th>User Id</th>
                            <th style="width:7%;">Photo</th>
                            <th>UserName</th>
                            <th>Name</th>
                            <th>Email</th>						
                            <th>Phone No.</th>
                            <th>Join Date</th>
                            <th>Action</th>						
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        require_once("connect.php");
                            $sql = "SELECT * FROM `customer`"; 
                            $result = mysqli_query($conn, $sql);
                            while($row=mysqli_fetch_assoc($result)) 
                            {
                                $id = $row['id'];
                                $photo = $row['photo'];
                                $username = $row['userName'];
                                $firstName = $row['firstName'];
                                $lastName = $row['lastName'];
                                $email = $row['email'];
                                $phone = $row['phone'];
                                $date = $row['joinDate'];
                                echo '<tr>
                                    <td>' .$id. '</td>
                                    <td><img src="Images/' .$photo. '" alt="image for this user" width="100px" height="100px"></td>
                                    <td>' .$username. '</td>
                                    <td>
                                        <p>First Name : <b>' .$firstName. '</b></p>
                                        <p>Last Name : <b>' .$lastName. '</b></p>
                                    </td>
                                    <td>' .$email. '</td>
                                    <td>' .$phone. '</td>
                                    <td>' .$date. '</td>
                                    <td>
                                    <button class="btn btn-sm btn-primary" style="margin-left:35px;" data-toggle="modal" data-target="#editUser' .$id. '" type="button">Edit</button>
                                    <form action="admin_customer_2.php" method="POST">
                                        <button name="removeUser" class="btn btn-sm btn-danger" style="margin-left:35px;margin-top:4px;">Delete</button>
                                        <input type="hidden" name="Id" value="'.$id. '">
                                    </form>
                                    </td>
                                    </tr>';
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div> 
        <?php 
            $sql = "SELECT * FROM `customer`"; 
            $result = mysqli_query($conn, $sql);
            while($row=mysqli_fetch_assoc($result)) 
            {
                $id = $row['id'];
                $photo = $row['photo'];
                $username = $row['userName'];
                $firstName = $row['firstName'];
                $lastName = $row['lastName'];
                $email = $row['email'];
                $phone = $row['phone'];
                $date = $row['joinDate'];
        ?>
        <!-- editUser Modal -->
        <div class="modal fade text-dark" id="editUser<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="editUser<?php echo $id; ?>" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header" style="background-color: rgb(111 202 203);">
                <h5 class="modal-title" id="editUser<?php echo $id; ?>">User Id: <b><?php echo $id; ?></b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <div class="modal-body">
                    <form action="admin_customer_2.php" method="post">
                        <div class="form-group">
                            <b><label for="username">Username</label></b>
                            <input class="form-control" id="username" name="username" value="<?php echo $username; ?>" type="text" disabled>
                        </div>
                        <div class="form-row">
                        <div class="form-group col-md-6">
                            <b><label for="firstName">First Name:</label></b>
                            <input type="text" class="form-control" id="firstName" name="firstName" value="<?php echo $firstName; ?>" required>
                        </div>
                        <div class="form-group col-md-6">
                            <b><label for="lastName">Last name:</label></b>
                            <input type="text" class="form-control" id="lastName" name="lastName" value="<?php echo $lastName; ?>" required>
                        </div>
                        </div>
                        <div class="form-group">
                            <b><label for="email">Email:</label></b>
                            <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>" required>
                        </div>
                        <div class="form-group row my-0">
                            <div class="form-group col-md-6 my-0">
                                <b><label for="phone">Phone No:</label></b>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon">+91</span>
                                    </div>
                                    <input type="tel" class="form-control" id="phone" name="phone" value="<?php echo $phone; ?>" required pattern="[0-9]{10}" maxlength="10">
                                </div>
                            </div>
                        </div>
                        <input type="hidden" id="userId" name="userId" value="<?php echo $id; ?>">
                        <button type="submit" name="editUser" class="btn btn-success">Update</button>
                    </form>
                </div>
            </div>
        </div>
        </div>
        <?php
            }
        ?>
        <?php 
            include 'partials/customer_form.php';
        ?>
        <style>
            .table-title {
                color: #fff;
                background: #4b5366;		
                padding: 16px 25px;
                margin: -20px -25px 10px; 
                border-radius: 3px 3px 0 0;
            }
        </style>
    </body>
</html>
