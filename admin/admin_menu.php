<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Menu</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel = "icon" href ="Images/logo.jpg" type = "image/x-icon">
        <link rel="stylesheet" href="css/bootstrap.min.css">
    </head>
    <body>
        <?php require 'admin_navbar.php' ?>
        <div class="container-fluid" style="margin-top:25px;">
	        <div class="col-lg-12">
		        <div class="row">
			    <!-- FORM Panel -->
			        <div class="col-md-4 text-dark">
			            <form action="admin_menu_2.php" method="post" enctype="multipart/form-data">
				            <div class="card mb-3">
					            <div class="card-header" style="background-color: rgb(111 202 203);">Create New Item</div>
					            <div class="card-body">
							        <div class="form-group">
								        <label class="control-label">Name: </label>
								        <input type="text" class="form-control" name="name" id="name" required>
							        </div>
							        <div class="form-group">
								        <label class="control-label">Description: </label>
								        <textarea cols="30" rows="3" class="form-control" name="description" id="description" required></textarea>
							        </div>
                                    <div class="form-group">
								        <label class="control-label">Price</label>
								        <input type="number" class="form-control" name="price" id="price" required min="1">
							        </div>	
							        <div class="form-group">
								        <label class="control-label">Category: </label>
								        <select name="categoryId" id="categoryId" class="custom-select browser-default" required>
								            <option hidden disabled selected value>None</option>
											<?php
												require_once("connect.php");
												$sql = "SELECT * FROM `categories`"; 
												$result = mysqli_query($conn, $sql);
												while($row = mysqli_fetch_assoc($result)){
													$catId = $row['categorieId'];
													$catName = $row['categorieName'];
													echo '<option value="' .$catId. '">' .$catName. '</option>';
												}
											?>
								        </select>
							        </div>
							        <div class="form-group">
								        <label for="image" class="control-label">Image</label>
								        <input type="file" name="image" id="image" accept=".jpg" class="form-control" required style="border:none;">
								        <small id="Info" class="form-text text-muted mx-3">Please .jpg file upload.</small>
							        </div>
					            </div>
					            <div class="card-footer">
						            <div class="row">
							            <div class="col-md-12">
								            <button type="submit" name="submit" class="btn btn-lg btn-primary btn-block"> Create </button>
							            </div>
						            </div>
					            </div>
				            </div>
			            </form>
			        </div>
			    <!-- FORM Panel -->
                    <!-- Table Panel -->
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body">
                                <table class="table table-bordered table-hover mb-0">
                                    <thead style="background-color: rgb(111 202 203);">
                                        <tr>
                                            <th class="text-center" style="width:7%;">Cat. Id</th>
                                            <th class="text-center">Img</th>
                                            <th class="text-center" style="width:58%;">Item Detail</th>
                                            <th class="text-center" style="width:18%;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php
											$sql = "SELECT * FROM `pizza`";
											$result = mysqli_query($conn, $sql);
											while($row = mysqli_fetch_assoc($result)){
												$pizzaId = $row['pizzaId'];
												$pizzaName = $row['pizzaName'];
												$pizzaPrice = $row['pizzaPrice'];
												$pizzaDesc = $row['pizzaDesc'];
												$pizzaCategorieId = $row['pizzaCategorieId'];
												$pizzaPhoto = $row['pizzaPhoto'];
												echo '<tr>
														<td class="text-center">' .$pizzaCategorieId. '</td>
														<td><img src="Images/' .$pizzaPhoto. '" alt="image for this user" width="100px" height="100px"></td>
														<td>
															<p>Name : <b>' .$pizzaName. '</b></p>
															<p>Description : <b class="truncate">' .$pizzaDesc. '</b></p>
															<p>Price : <b>' .$pizzaPrice. '</b></p>
														</td>
														<td>
                                                        	<button class="btn btn-sm btn-primary" style="margin-left:35px;" type="button" data-toggle="modal" data-target="#updateItem' .$pizzaId. '">Edit</button>
															<form action="_menuManage.php" method="POST">
																<button name="removeItem" class="btn btn-sm btn-danger" style="margin-left:35px;margin-top:4px;">Delete</button>
																<input type="hidden" name="pizzaId" value="'.$pizzaId. '">
															</form>
                                                    	</td>
													</tr>';
											}
										?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- Table Panel -->
                </div>
            </div>
        </div>
		<?php 
			$pizzasql = "SELECT * FROM `pizza`";
			$pizzaResult = mysqli_query($conn, $pizzasql);
			while($pizzaRow = mysqli_fetch_assoc($pizzaResult)){
				$pizzaId = $pizzaRow['pizzaId'];
				$pizzaName = $pizzaRow['pizzaName'];
				$pizzaPrice = $pizzaRow['pizzaPrice'];
				$pizzaCategorieId = $pizzaRow['pizzaCategorieId'];
				$pizzaDesc = $pizzaRow['pizzaDesc'];
		?>
		<!-- Modal -->
		<div class="modal fade text-dark" id="updateItem<?php echo $pizzaId; ?>" tabindex="-1" role="dialog" aria-labelledby="updateItem<?php echo $pizzaId; ?>" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
			<div class="modal-header" style="background-color: rgb(111 202 203);">
				<h5 class="modal-title" id="updateItem<?php echo $pizzaId; ?>">Item Id: <?php echo $pizzaId; ?></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="_menuManage.php" method="post">
					<div class="text-left my-2">
						<b><label for="name">Name</label></b>
						<input class="form-control" id="name" name="name" value="<?php echo $pizzaName; ?>" type="text" required>
					</div>
					<div class="text-left my-2 row">
						<div class="form-group col-md-6">
							<b><label for="price">Price</label></b>
							<input class="form-control" id="price" name="price" value="<?php echo $pizzaPrice; ?>" type="number" min="1" required>
						</div>
						<div class="form-group col-md-6">
							<b><label for="catId">Category Id</label></b>
							<input class="form-control" id="catId" name="catId" value="<?php echo $pizzaCategorieId; ?>" type="number" min="1" required>
						</div>
					</div>
					<div class="text-left my-2">
						<b><label for="desc">Description</label></b>
						<textarea class="form-control" id="desc" name="desc" rows="2" required minlength="6"><?php echo $pizzaDesc; ?></textarea>
					</div>
					<input type="hidden" id="pizzaId" name="pizzaId" value="<?php echo $pizzaId; ?>">
					<button type="submit" class="btn btn-success" name="updateItem">Update</button>
				</form>
			</div>
			</div>
		</div>
		</div>
		<?php	}	?>
	</body>
</html>
