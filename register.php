<?php
require_once "logic.php"; 
    ConnectDB();
    StoreRegister()
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="icon" href="assets/blogging.png">
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.1.0/mdb.min.css" rel="stylesheet" />
    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.1.0/mdb.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <div class="container">
        <div class="row align-items-end">
            <div class="col-md-6">
                <img src="assets/9710-registration-of-animated-illustrations.gif" class="img-fluid" alt="">
            </div>
            <div class="col-md-6">
                <form action="" method="POST">
                    <div class="mb-3">
                        <h3>Register</h2>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Fullname</label>
                        <input type="text" name="fullname" class="form-control" id="exampleInputEmail1" placeholder="Masukan Fullname">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" id="exampleInputPassword" placeholder="Masukan email">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword" class="form-label">Username</label>
                        <input type="text" name="username" class="form-control" id="exampleInputPassword" placeholder="Masukan Username">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="exampleInputPassword" placeholder="Masukan Password">
                    </div>
                    <div class="mb-3">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-check">
                                    <label for="exampleCheckbox">Show Password</label>
                                    <input type="checkbox" class="form-check-input" id="exampleCheckbox">
                                </div>
                            </div>
                            <div class="col-md-6 text-end">
                                <a href="login.html">Punya Akun?</a>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <button class="container btn btn-primary" type="submit" name="register">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        AOS.init();
    </script>
</body>

</html>