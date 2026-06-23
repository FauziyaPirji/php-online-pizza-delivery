<!doctype html>
<html lang="en">
    <head>
        <title>Login</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel = "icon" href ="Images/logo.jpg" type = "image/x-icon">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <style>
            body{
                width: 100%;
                height: calc(100%);
            }
            main#main{
                width:100%;
                height: calc(100%);
                background:white;
            }
            #login-right{
                position: absolute;
                right:0;
                width:40%;
                height: calc(100%);
                background:white;
                display: flex;
                align-items: center;
            }
            #login-left{
                position: absolute;
                left:0;
                width:50%;
                height: calc(100%);
                background:#00000061;
                display: flex;
                align-items: center;
                background-image:url(Images/bg_1.jpg);
            }
            .logo {
                margin-left: 30%;
                font-size: 8rem;
                height: 29vh;
                width: 13vw;
                display: flex;
                align-items: center;
            }
            .logo img{
                height: 150%;
                width: 150%;
            }
        </style>
    </head>
    <body>
        <main id="main" class=" bg-dark">
            <div id="login-left"><div class="logo"><img src="Images/admin_logo.gif" alt=""></div></div>
            <div id="login-right">
                <div class="card col-md-8">
                    <div class="card-body">
                        <form action="_handleLogin.php" method="post">
                            <div class="form-group">
                                <label for="username" class="control-label"><b>Username</b></label>
                                <input type="text" id="username" name="username" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="password" class="control-label"><b>Password</b></label>
                                <input type="password" id="password" name="password" class="form-control" required>
                            </div>
                            <center><button type="submit" name="submit" class="btn-sm btn-block btn-wave col-md-4 btn-primary">Login</button></center>
                        </form>
                    </div>
                </div>
            </div>
        </main>  
    </body>
</html>