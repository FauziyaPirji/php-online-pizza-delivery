<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Orders</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel = "icon" href ="Images/logo.jpg" type = "image/x-icon">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <style>
            .table-title {
                color: #fff;
                background: #4b5366;		
                padding: 16px 25px;
                margin-top:10px;
            }
            table.table tr th, table.table tr td {
                border-color: #e9e9e9;
                padding: 12px 15px;
                vertical-align: middle;
                color:white;
            }
            table.table tr th:first-child {
                width: 60px; 
            }
        </style>
    </head>
    <body>
        <?php require 'navbar.php' ?>
        <div class="container-md" id="cont">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-4">
                            <h2>Order <b>Details</b></h2>
                        </div>
                    </div>
                </div>
                <table class="table table-striped table-hover text-center table-responsive-md">
                    <thead>
                        <tr>
                            <th>Order Id</th>
                            <th>Address</th>
                            <th>Phone No</th>
                            <th>Amount</th>						
                            <th>Payment Mode</th>
                            <th>Order Date</th>
                            <th>Status</th>						
                            <th>Items</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $sql = "SELECT * FROM `orders` WHERE `userId`= $id";
                        $result = mysqli_query($conn, $sql);
                        $counter = 0;
                        while($row = mysqli_fetch_assoc($result)){
                            $orderId = $row['orderId'];
                            $address = $row['address'];
                            $zipCode = $row['zipCode'];
                            $phoneNo = $row['phoneNo'];
                            $amount = $row['amount'];
                            $orderDate = $row['OrderDate'];
                            $paymentMode = $row['paymentMode'];
                            if($paymentMode == 0) {
                                $paymentMode = "Cash on Delivery";
                            }
                            else {
                                $paymentMode = "Online";
                            }
                            $orderStatus = $row['orderStatus'];
                            $counter++;
                            echo '<tr>
                                    <td>' . $orderId . '</td>
                                    <td>' . substr($address, 0, 20) . '...</td>
                                    <td>' . $phoneNo . '</td>
                                    <td>' . $amount . '</td>
                                    <td>' . $paymentMode . '</td>
                                    <td>' . $orderDate . '</td>
                                    <td><a href="#" data-toggle="modal" data-target="#orderStatus' . $orderId . '" class="view"><img src="Images/image.png" width="10%;"></a></td>
                                    <td><a href="#" data-toggle="modal" data-target="#orderItem' . $orderId . '" class="view" title="View Details"><img src="Images/image.png" width="10%;"></a></td>
                                </tr>';
                        }
                        if($counter==0) {
                            ?>
                                <script> document.getElementById("cont").innerHTML = '<div class="col-md-12 my-5 bg-dark text-center"><img src="Images/cart.jpg" width="130" height="130" class="img-fluid mb-4 mr-3"><h3><strong>Your Cart is Empty</strong></h3><h4>Add something to make me happy :)</h4> <a href="menu.php" class="btn btn-primary cart-btn-transform m-3" data-abc="true">continue shopping</a> </div>';</script>
                            <?php }
                    ?>
                    </tbody>
                </table>
            </div>
        </div> 
        <?php
            include '_orderItemModal.php';
            include '_orderStatusModal.php';
            require '_footer.php' 
        ?>
    </body>
</html>
