<?php
session_start();
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />

        <?php include 'template/title.php'; ?>

        <link rel="stylesheet" href="assets/css/styles.css">
        <link rel="stylesheet" href="assets/css/login.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    </head>

    <body id="particles-js" class="focused-form animated-content animated fadeInUp">
        <div class="container">

            <div class="row">
                <div class="col-md-4 col-md-offset-4 center-login">
                    <a class="login-logo">Manpower <br> Transfer System</a>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h2>Login</h2>
                        </div>

                        <form name="form" id="form" class="form-horizontal" action="service/check_login.php" method="POST">
                            <div class="panel-body">

                                <?php if (isset($_SESSION["error"])) : ?>
                                <div class="error">
                                    <?php
                                    echo $_SESSION["error"];
                                    unset($_SESSION["error"]);
                                    ?>
                                </div>
                                <?php endif ?>

                                <div class="form-group mb-md">
                                    <div class="col-xs-12">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                            <i class="ti-lock"></i>
                                        </span>
                                            <input class="form-control" name="Username" id="Username" type="text" placeholder="รหัสพนักงาน" required/>
                                        </div>
                                    </div>
                                </div>


                            </div>

                            <div class="panel-footer">
                                <!-- Button -->
                                <div class="d-grid gap-2 col-6 mx-auto">
                                    <button type="submit"  class="btn btn-danger"><i class="glyphicon glyphicon-log-in"></i>Log in</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
       
        <script src="assets/plugin/particles/particles.js"></script>
        <script src="assets/plugin/particles/app.js"></script>
        <script src="assets/js/jquery-3.6.0.min.js"></script>
        <script src="assets/js/bootstrap.bundle.min.js"></script>
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

        
    </body>

    </html>