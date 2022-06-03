<?php 
require_once("logic.php");
ConnectDB();
session_start();
if(!isset($_SESSION["user"])) header("Location: login.php");

if (isset($_POST["update_profile"])) {
    $fullname = filter_input(INPUT_POST, 'fullname', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $bio = filter_input(INPUT_POST, 'bio', FILTER_SANITIZE_STRING);
    $profile_images = filter_input(INPUT_POST, 'profile_images', FILTER_SANITIZE_STRING);
    
    $sql = "UPDATE users SET fullname = :fullname, email = :email , username = :username, password = :password, bio = :bio, profile_images = :profile_images";

    global $db;
    $stmt = $db->prepare($sql);

    $params = array(
        ":fullname" => $fullname, 
        ":email" => $email, 
        ":username" => $username, 
        ":password" => $password,
        ":bio" => $bio,
        ":profile_images" => $profile_images
    );

    $stmt->execute($params);
    
    if($stmt){
        echo "<script>alert('Update Profile Berhasil')</script>";
    }else{
        echo "<script>alert('Update Profile Gagal')</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Explore</title>
    <link rel="icon" href="assets/blogging.png">
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.1.0/mdb.min.css" rel="stylesheet" />
    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.1.0/mdb.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <!-- Container wrapper -->
        <div class="container-fluid">
            <!-- Toggle button -->
            <button class="navbar-toggler" type="button" data-mdb-toggle="collapse"
                data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>

            <!-- Collapsible wrapper -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Navbar brand -->
                <a class="navbar-brand mt-2 mt-lg-0" href="home.php">
                    <img src="assets/blogging.png" height="30" alt="Blog-ku" />
                </a>
                <!-- Left links -->
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="home.html">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="explore.html">Explore</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">MyBlog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="https://valentioaditama.github.io/ValentioAditama/">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="feedback.html">Feedback</a>
                    </li>
                </ul>
                <!-- Left links -->
            </div>
            <!-- Collapsible wrapper -->

            <!-- Right elements -->
            <div class="d-flex align-items-center">

                <!-- Notifications -->
                <div class="dropdown">
                    <a class="text-reset me-3 dropdown-toggle hidden-arrow" href="#" id="navbarDropdownMenuLink"
                        role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-bell"></i>
                        <span class="badge rounded-pill badge-notification bg-danger">1</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                        <li>
                            <a class="dropdown-item" href="#">Some news</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">Another news</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </li>
                    </ul>
                </div>
                <!-- Avatar -->
                <div class="dropdown">
                    <a class="dropdown-toggle d-flex align-items-center hidden-arrow" href="#"
                        id="navbarDropdownMenuAvatar" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                        <img src="assets/profile.png" class="rounded-circle" height="25"
                            alt="Black and White Portrait of a Man" loading="lazy" />
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuAvatar">
                        <li>
                            <a class="dropdown-item" href="#">My profile</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">Settings</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">Logout</a>
                        </li>
                    </ul>
                </div>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Welcome, <?= $_SESSION["user"]["fullname"] ?></a>
                    </li>
                </ul>
            </div>
            <!-- Right elements -->
        </div>
        <!-- Container wrapper -->
    </nav>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <div class="container-fluid">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="Myblog.html">Profile /</a></li>
                    </ol>
                </nav>
            </div>
        </div>
    </nav>
    <!-- Navbar -->

    <div class="mt-4">
        <div class="container p-3 shadow-5 rounded-lg">
            <div class="mt-3">
                <div class="row align-items-center">
                    <div class="col-md-6 text-center">
                        <div class="mt-3 mb-3">
                            <h3>Edit Profile</h3>
                            <p3>Yuk edit profile kamu agar supaya profile-mu makin kece dan keren...</p3>
                        </div>
                        <img src="assets/profile.png" height="200" alt="">
                        <div class="mt-3 mb-3">
                            <input type="file" class="form-control">
                            <div class="mt-3">
                                <button class="btn btn-primary container">Ganti Photo</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <form action="" method="POST">
                            <div class="mb-3">
                                <label for="fullname">Fullname</label>
                                <input type="text" id="fullname" name="fullname" class="form-control" placeholder="Fullname" value="<?= $_SESSION["user"]["fullname"] ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="fullname">Email</label>
                                <input type="email" id="email" name="email" class="form-control" placeholder="Email" value="<?= $_SESSION["user"]["email"] ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="fullname">Username</label>
                                <input type="text" id="username" name="username" class="form-control" placeholder="Username" value="<?= $_SESSION["user"]["username"] ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="fullname">Ganti Password</label>
                                <input type="password" id="password" name="password" class="form-control" placeholder="Ganti password">
                            </div>
                            <button class="btn btn-primary" name="update_profile" type="submit">Save Profile</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        AOS.init();
    </script>
</body>

</html>