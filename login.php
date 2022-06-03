<?php 

$server = "localhost";
$username = "root"; 
$password = ""; 
$db_name = "Blog-ku";

try {
    global $db;
    $db = new PDO("mysql:host=$server;dbname=$db_name", $username, $password);
} catch (PDOException $e) {
    die ("Error Database".$e->getMessage());
}

if(isset($_POST['login'])){
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

    $sql = "SELECT * FROM users WHERE email = :email or username = :username";
    global $db;
    $stmt = $db->prepare($sql);

    $params = array(
        ":username" => $username,
        ":email" => $email
    );

    $stmt->execute($params);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if($user) {
        if(password_verify($password, $user["password"])){
            echo "<script>alert('Berhasil Login')</script>";
            session_start();
            $_SESSION["user"] = $user;
            header("Location: home.php");
        }else{
            echo "<script>alert('Invalid Email dan password')</script>";
        }
    }else{
        echo "<script>alert('Invalid Email dan password')</script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
        <div class="row align-items-center">
            <div class="col-md-6">
                <form action="" method="POST">
                    <div class="mb-3">
                        <h3>Selamat Datang di, <b>Blog-ku</b></h2>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Masukan Email" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="exampleInputPassword"
                            placeholder="Masukan Password" required>
                    </div>
                    <div class="mb-3">
                        <div class="row">
                            <div class="col-md-6">
                                <a href="forgotPassword.html" class="">Forgot Password?</a>
                            </div>
                            <div class="col-md-6 text-end">
                                <a href="register.php">Register Account</a>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <button class="container btn btn-primary" type="submit" name="login">Login</button>
                    </div>
                </form>
            </div>
            <div class="col-md-6">
                <img src="assets/63787-secure-login.gif" class="img-fluid" alt="">
            </div>
        </div>
    </div>

    <script>
        AOS.init();
    </script>
</body>

</html>