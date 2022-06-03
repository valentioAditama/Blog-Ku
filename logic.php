<?php 
function ConnectDB(){
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
}

function StoreRegister(){
    if (isset($_POST['register'])){
        $fullname = filter_input(INPUT_POST, 'fullname', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
        $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (fullname, email, username, password) VALUES (:fullname, :email, :username, :password)";
        global $db;
        $stmt = $db->prepare($sql);

        $params = array(
            ":fullname" => $fullname, 
            ":email" => $email, 
            ":username" => $username, 
            ":password" => $password,
        );

        $stmt->execute($params);
        
        if($stmt){
            header("Location: login.php");
            echo "<script>alert('Register Berhasil')</script>";
        }else{
            echo "<script>alert('Register Gagal')</script>";
        }
    }
}

function StoreLogin(){
    if(isset($_POST['login'])){
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

        $sql = "SELECT * FROM users WHERE email = :email or username = :username";
        global $db;
        $stmt = $db->prepare($sql);

        $params = array(
            ":email" => $email
        );

        $stmt->execute($params);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            if(password_verify($password, $user["password"])){
                echo "<script>alert('Berhasil Login')</script>";
                session_start();
                $_SESSION["user"] = $user;
                header("Location: regitser.php");
            }else{
                echo "<script>alert('Invalid Email dan password')</script>";
            }
        }else{
            echo "<script>alert('Invalid Email dan password')</script>";
        }
    }
}

?>