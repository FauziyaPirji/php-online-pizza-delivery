<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Category List</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel = "icon" href ="Images/logo.jpg" type = "image/x-icon">
        <link rel="stylesheet" href="css/bootstrap.min.css">
    </head>
    <body>
        <?php require 'admin_navbar.php' ?>
        <div class="container-fluid" style="margin-top:98px">
            <div class="col-lg-12">
                <div class="row">
                <!-- FORM Panel -->
                    <div class="col-md-4">
                        <form action="admin_category_list_2.php" method="post" enctype="multipart/form-data">
                            <div class="card text-dark">
                                <div class="card-header" style="background-color: rgb(111 202 203);">
                                    Create New Category
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label class="control-label">Category Name: </label>
                                        <input type="text" class="form-control" name="cname" id="cname" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Category Desc: </label>
                                        <input type="text" class="form-control" name="details" id="details" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="image" class="control-label">Image:</label>
                                        <input type="file" name="image" id="image" accept=".jpg" class="form-control" required style="border:none;">
                                        <small id="Info" class="form-text text-muted mx-3">Please .jpg file upload.</small>
                                    </div>  
                                </div>  
                                <button type="submit" name="submit" id="submit" class="btn btn-lg btn-primary btn-block"> Create </button>
                            </div>
                        </form>
                    </div>
                <!-- FORM Panel -->
                <!-- Table Panel -->
                    <div class="col-md-8 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <table class="table table-bordered table-hover mb-0">
                                    <thead style="background-color: rgb(111 202 203);">
                                        <tr>
                                            <th class="text-center" style="width:7%;">Id</th>
                                            <th class="text-center">Img</th>
                                            <th class="text-center" style="width:58%;">Category Detail</th>
                                            <th class="text-center" style="width:18%;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        require_once("connect.php");
                                            $sql = "SELECT * FROM `categories`"; 
                                            $result = mysqli_query($conn, $sql);
                                            
                                            while($row=mysqli_fetch_assoc($result)) {
                                                $categorieId = $row['categorieId'];
                                                $categorieName = $row['categorieName'];
                                                $categorieDesc = $row['categorieDesc'];
                                                $categoriePhoto = $row['categoriePhoto'];
                                                echo '<tr>
                                                    <td>' .$categorieId. '</td>
                                                    <td><img src="Images/' .$categoriePhoto. '" alt="image for this user" width="100px" height="100px"></td>
                                                    <td>
                                                        <p>Name : <b>' .$categorieName. '</b></p>
                                                        <p>Description : <b>' .$categorieDesc. '</b></p>
                                                    </td>
                                                    <td>
                                                    <button class="btn btn-sm btn-primary edit_cat" style="margin-left:35px;" type="button" data-toggle="modal" data-target="#updateCat' .$categorieId. '">Edit</button>
                                                    <form action="_categoryManage.php" method="POST">
                                                        <button name="removeCategory" class="btn btn-sm btn-danger" style="margin-left:35px;margin-top:4px;">Delete</button>
                                                        <input type="hidden" name="catId" value="'.$categorieId. '">
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
                </div>
            </div>
        </div>
        <?php 
            $sql = "SELECT * FROM `categories`"; 
            $result = mysqli_query($conn, $sql);
            while($row=mysqli_fetch_assoc($result)) {
                $categorieId = $row['categorieId'];
                $categorieName = $row['categorieName'];
                $categorieDesc = $row['categorieDesc'];
                $categoriePhoto = $row['categoriePhoto'];
        ?>
        <!-- Modal -->
        <div class="modal fade text-dark" id="updateCat<?php echo $categorieId; ?>" tabindex="-1" role="dialog" aria-labelledby="updateCat<?php echo $categorieId; ?>" aria-hidden="true" style="width: -webkit-fill-available;">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header" style="background-color: rgb(111 202 203);">
                <h5 class="modal-title" id="updateCat<?php echo $categorieId; ?>">Category Id: <b><?php echo $categorieId; ?></b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="_categoryManage.php" method="post">
                    <div class="text-left my-2">
                        <b><label for="name">Name</label></b>
                        <input class="form-control" id="name" name="name" value="<?php echo $categorieName; ?>" type="text" required>
                    </div>
                    <div class="text-left my-2">
                        <b><label for="desc">Description</label></b>
                        <textarea class="form-control" id="desc" name="desc" rows="2" required minlength="6"><?php echo $categorieDesc; ?></textarea>
                    </div>
                    <input type="hidden" id="catId" name="catId" value="<?php echo $categorieId; ?>">
                    <button type="submit" class="btn btn-success" name="updateCategory">Update</button>
                </form>
            </div>
            </div>
        </div>
        </div>
        <?php
            }
        ?>
    </body>
</html>