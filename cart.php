<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Cart</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel = "icon" href ="Images/logo.jpg" type = "image/x-icon">
        <link rel="stylesheet" href="css/bootstrap.min.css">
    </head>
    <body>
        <?php require 'navbar.php' ?>
        <div class="container" id="cont">
            <div class="row">
                <div class="alert alert-info mb-0" style="width: -webkit-fill-available;">
                    <strong>Info!</strong> online payment are currently disabled so please choose cash on delivery.
                </div>
                <div class="col-lg-12 text-center border rounded my-3"><h1>My Cart</h1></div>
                <div class="col-lg-8">
                    <div class="card wish-list mb-3">
                        <table class="table text-center table-responsive-md">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Item Name</th>
                                    <th scope="col">Item Price</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Total Price</th>
                                    <th scope="col">
                                        <form action="manageCart.php" method="POST">
                                            <button name="removeAllItem" class="btn btn-sm btn-outline-danger">Remove All</button>
                                            <input type="hidden" name="userId" value="">
                                        </form>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                require_once("connect.php");
                                $sql = "SELECT * FROM `viewcart` WHERE `userId`= $id";
                                $result = mysqli_query($conn, $sql);
                                $counter = 0;
                                $totalPrice = 0;
                                while($row = mysqli_fetch_assoc($result)){
                                    $pizzaId = $row['pizzaId'];
                                    $Quantity = $row['itemQuantity'];
                                    $mysql = "SELECT * FROM `pizza` WHERE pizzaId = $pizzaId";
                                    $myresult = mysqli_query($conn, $mysql);
                                    $myrow = mysqli_fetch_assoc($myresult);
                                    $pizzaName = $myrow['pizzaName'];
                                    $pizzaPrice = $myrow['pizzaPrice'];
                                    $total = $pizzaPrice * $Quantity;
                                    $counter++;
                                    $totalPrice = $totalPrice + $total;
                                    echo '<tr>
                                            <td>' . $counter . '</td>
                                            <td>' . $pizzaName . '</td>
                                            <td>' . $pizzaPrice . '</td>
                                            <td>
                                                <form action="manageCart.php" method="post">
                                                    <input type="hidden" name="pizzaId" value="' . $pizzaId . '">
                                                    <input type="number" name="quantity" value="' . $Quantity . '" class="text-center">
                                                    <input type="submit" value="update" name="update_qty" class="option-btn">
                                                </form>
                                            </td>
                                            <td>' . $total . '</td>
                                            <td>
                                                <form action="manageCart.php" method="POST">
                                                    <button name="removeItem" class="btn btn-sm btn-outline-danger">Remove</button>
                                                    <input type="hidden" name="itemId" value="'.$pizzaId. '">
                                                </form>
                                            </td>
                                        </tr>';
                                }
                                if($counter==0) {
                                ?>
                                    <script> document.getElementById("cont").innerHTML = '<div class="col-md-12 my-5 bg-dark text-center"><img src="Images/cart.jpg" width="130" height="130" class="img-fluid mb-4 mr-3"><h3><strong>Your Cart is Empty</strong></h3><h4>Add something to make me happy :)</h4> <a href="menu.php" class="btn btn-primary cart-btn-transform m-3" data-abc="true">continue shopping</a> </div>';</script>
                                <?php
                               }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card wish-list mb-3">
                        <div class="pt-4 border bg-light rounded p-3 text-dark">
                            <h5 class="mb-3 text-uppercase font-weight-bold text-center">Order summary</h5>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0 bg-light">Total Price<span>Rs.<?php echo $totalPrice ?></span></li>
                                <li class="list-group-item d-flex justify-content-between align-items-center px-0 bg-light">Shipping<span>Rs. 0</span></li>
                                <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3 bg-light">
                                    <div>
                                        <strong>The total amount of</strong>
                                        <strong><p class="mb-0">(including Tax & Charge)</p></strong>
                                    </div>
                                    <span><strong>Rs.<?php echo $totalPrice ?></strong></span>
                                </li>
                            </ul>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" checked>
                                <label class="form-check-label" for="flexRadioDefault1">Cash On Delivery </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault1" id="flexRadioDefault1" disabled>
                                <label class="form-check-label" for="flexRadioDefault1"> Online Payment </label>
                            </div><br>
                            <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#checkoutModal">go to checkout</button>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="pt-4">
                            <a class="dark-grey-text d-flex justify-content-between text-light" style="text-decoration: none;" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                Add a discount code (optional)
                                <span><i class="fas fa-chevron-down pt-1"></i></span>
                            </a>
                            <div class="collapse" id="collapseExample">
                                <div class="mt-3">
                                    <div class="md-form md-outline mb-0">
                                        <input type="text" id="discount-code" class="form-control text-light" placeholder="Enter discount code">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php require '_checkoutModal.php' ?>
        <?php require '_footer.php' ?>
    </body>
</html>
