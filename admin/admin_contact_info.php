<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Contact Info</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel = "icon" href ="Images/logo.jpg" type = "image/x-icon">
        <link rel="stylesheet" href="css/bootstrap.min.css">
    </head>
    <body>
        <?php require 'admin_navbar.php' ?>
        <div class="alert alert-info alert-dismissible fade show" role="alert" style="width:100%" id='notempty'>
            <strong>Info!</strong> If problem is not related to the order then order id = 0	
            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span></button>
        </div>
        <div class="container-md card bg-body-tertiary" style="margin-top:98px;background: aliceblue;">
            <div class="table-wrapper">
                <div class="table-title card bg-body-tertiary">
                    <div class="form-row d-flex"><div class="col-sm-4"><h2>Contact <b>Information</b></h2></div></div>
                </div>
                <table class="table table-striped table-hover table-center table-responsive-md" id="NoOrder">
                    <thead style="background-color: rgb(111 202 203);">
                        <tr>
                            <th>Feedback Id</th>
                            <th>Email</th>
                            <th>Phone No</th>
                            <th>Order Id</th>						
                            <th>Message</th>
                            <th>Datatime</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        require_once("connect.php");
                            $sql = "SELECT * FROM `feedback`"; 
                            $result = mysqli_query($conn, $sql);
                            while($row=mysqli_fetch_assoc($result)) {
                                $feedbackId = $row['feedbackId'];
                                $orderId = $row['orderId'];
                                $email = $row['email'];
                                $phoneNo = $row['phoneNo'];
                                $feedback = $row['feedback'];
                                $time = $row['time'];
                                echo '<tr>
                                    <td>' .$feedbackId. '</td>
                                    <td>' .$email. '</td>
                                    <td>' .$phoneNo. '</td>
                                    <td>' .$orderId. '</td>
                                    <td>' .$feedback. '</td>
                                    <td>' .$time. '</td>
                                    </tr>';
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div> 
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
