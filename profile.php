<?php 
session_start();
include("auth.php");
include("database.php");
include("logic.php");

$id = $_SESSION["user"]["id"];
$showData = $db->query("SELECT * FROM users WHERE id='$id'");

if  (mysqli_num_rows($showData) == 0){ 
}else{
    $row = mysqli_fetch_assoc($showData);
}

if (isset($_POST["UpdateProfile"])) {
    $id_Profile = $_POST["id"];
    $fullname = $_POST["fullname"];
    $email = $_POST["email"];
    $username = $_POST["username"];
    $bio = $_POST["bio"];

    $query = "UPDATE users SET fullname='$fullname', email='$email', username='$username', bio='$bio' where id='$id_Profile'";
    $result = mysqli_query($db, $query);
    if($result){
        echo "<script>alert('Update Profile berhasil di tambahkan');</script>";
        echo "<script>window.location.href = window.location.href;</script>";
    } else { 
        echo "<script>alert('Update Profile Gagal di tambahkan')</script>";
    }
}

if (isset($_POST["ganti_photo"])){
    $id_Profile2 = $_POST["id_users"];
    $img_name = $_FILES['thumbnails']['name'];
    $tmp_img_name = $_FILES['thumbnails']['tmp_name'];
    $folder = 'uploadProfile/'.$img_name;
    move_uploaded_file($tmp_img_name, $folder);

    $query2 = "UPDATE users SET profile_images='$folder' where id='$id_Profile2'";
    $result2 = mysqli_query($db, $query2);

    if ($result2) {
        echo "<script>alert('Photo Profile Berhasil Di ubah')</script>";
        echo "<script>window.location.href = window.location.href;</script>";
    } else { 
        echo "<script>alert('Photo Profile Gagal di ubah')</script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
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
                        <a class="nav-link" href="home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="explore.html">Explore</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="Myblog.php">MyBlog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="https://valentioaditama.github.io/ValentioAditama/">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="feedback.php">Feedback</a>
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
                        <img src="<?php
                        $photo = $row['profile_images'];
                        $photo2 = 'uploadProfile/'.$row['profile_images'];
                        if (file_exists($photo) == FALSE){
                            echo 'uploadProfile/profile.gif';
                        }else{
                            echo $row['profile_images'];
                        }
                        ?>" class="rounded-circle" height="25"
                            alt="Black and White Portrait of a Man" loading="lazy" />
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuAvatar">
                        <li>
                            <a class="dropdown-item" href="profile.php?id=<?= $_SESSION["user"]["id"]?>">My profile</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">Settings</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="logout.php">Logout</a>
                        </li>
                    </ul>
                </div>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Welcome, <?php echo $row['fullname']; ?></a>
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
                        <!-- <img src="assets/profile.png" alt=""> -->
                        <img src="<?php
                        $photo = $row['profile_images'];
                        $photo2 = 'uploadProfile/'.$row['profile_images'];
                        if (file_exists($photo) == FALSE){
                            echo 'uploadProfile/profile.gif';
                        }else{
                            echo $row['profile_images'];
                        }
                        ?>" height="200" alt="">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="mt-3 mb-3">
                                <input type="hidden" name="id_users" value="<?php echo $_SESSION['user']['id'] ?>" >
                                <input type="file" name="thumbnails" class="form-control">
                                <div class="mt-3">
                                    <button class="btn btn-primary container" name="ganti_photo" type="submit">Ganti Photo</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <form action="" method="POST">
                            <div class="mb-3">
                                <label for="fullname">Fullname</label>
                                <input type="hidden" id="id" name="id" class="form-control" placeholder="Fullname"
                                    value="<?php echo $row['id'] ?>" readonly>
                                <input type="text" id="fullname" name="fullname" class="form-control"
                                    placeholder="Fullname" value="<?php echo $row['fullname'] ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="fullname">Email</label>
                                <input type="email" id="email" name="email" class="form-control" placeholder="Email"
                                    value="<?php echo $row['email'] ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="fullname">Username</label>
                                <input type="text" id="username" name="username" class="form-control"
                                    placeholder="Username" value="<?php echo $row['username'] ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="fullname">Bio</label>
                                <textarea name="bio" class="form-control" id="" cols="10" rows="5"
                                    placeholder="Bio-mu ada disini"><?php echo $row['bio'] ?></textarea>
                            </div>
                            <!-- <div class="mb-3">
                                <label for="fullname">Ganti Password</label>
                                <input type="password" id="password" name="password" class="form-control" placeholder="Ganti password">
                            </div> -->
                            <button class="btn btn-primary" name="UpdateProfile" type="submit">Save Profile</button>
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