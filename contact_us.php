<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Contact Us</title>
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
            textarea{
              background: transparent !important;
              border: none;
              border-bottom: 1px solid #fac564;
            }
        </style>
    </head>
    <body>
        <?php require 'navbar.php' ?>
        <?php
            $passSql = "SELECT * FROM customer WHERE id='$id'"; 
            $passResult = mysqli_query($conn, $passSql);
            $passRow=mysqli_fetch_assoc($passResult);
            $email = $passRow['email'];
            $phone = $passRow['phone'];
        ?>
        <div class="container mt-5">
            <div class="row block-9">
				<div class="col-md-4">
					<div class="row"><img src="Images/bg_1.jpg" style="width:100%;height:500px;"></div>
				</div>
				<div class="col-md-1"></div>
                    <div class="col-md-6">
                        <form action="contact_us_2.php" class="contact-form" method="post">
            	            <div class="row">
            		            <div class="col-md-6">
	                                <div class="form-group">
	                                    <input type="text" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $email ?>">
	                                </div>
                                </div>
                                <div class="col-md-6">
	                                <div class="form-group">
	                                    <input type="tel" class="form-control" name="phone" id="phone" placeholder="Phone Number" value="<?php echo $phone ?>">
	                                </div>
	                            </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="number" class="form-control" name="orderid" id="orderid" placeholder="Order Id">
                                        <p>If your problem is not related to the order(order id = 0).</p>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <textarea name="msg" id="msg" cols="30" rows="7" class="form-control" placeholder="Message"></textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit" name="submit" id="submit" value="Send Message" class="btn btn-primary py-3 px-5">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php require '_footer.php' ?>
    </body>
</html>
