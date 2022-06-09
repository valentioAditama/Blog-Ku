<?php
session_start();
include("auth.php");
include("database.php");
include("logic.php");

if(!isset($_SESSION["user"])) header("Location: login.php");

if(isset($_POST["ganti_thumbnails"])){
    $img_name = $_FILES['thumbnails']['name'];
    $tmp_img_name = $_FILES['thumbnails']['tmp_name'];
    $folder = 'upload/'.$img_name;
    move_uploaded_file($tmp_img_name, $folder);

    $id_blog = $_POST["id_blog"];
    $sql = "UPDATE blog SET thumbnails='$folder' WHERE id_blog='$id_blog'";
    $result = mysqli_query($db, $sql);
    if($result){
        echo "<script>alert('Update Thumbnails berhasil di Ubah!');</script>";
        echo "<script>window.location.href = window.location.href;</script>";
    } else { 
        echo "<script>alert('Thumbnails gagal di ubah')</script>";
    }
}

if (isset($_POST["Edit_blog"])) {
        // $title = $_POST['title'];
        // $author = $_POST['author'];
        // $category = $_POST['category'];
        // $date = $_POST['date']; 
        
        // $video = $_POST['video'];

        // if (!empty($_FILES["thumbnails"]["tmp_name"])) {
        //     echo "<script>alert('Pilih Gambar dahulu')</script>";
        // }else if (in_array($imageExt, $ekstensionFIle)) {
        //     echo "<script>alert('error! Ekstensi yang di Izinkan image .jpg, .jpeg, .png')</script>";
        // }else if ($_FILES["thumbnails"]["size"] > 10097152) {
        //     echo "<script>alert('Error, Size gambar terlalu besar!')</script>";
        // } else{
        //     if (move_uploaded_file($image, $targetdir.$target_file)) {
        //             echo "<script>alert('Upload Gambar berhasil')</script>";
        //         // $sql = "INSERT INTO video (title, author, category, date, thumbnails, video) VALUES ('$title', '$author', '$category', '$date', '$target_file', '$target_filevideo')";
        //         // global $conn2;
        //         // $stmt = $conn2->prepare($sql);
        //         // if ($stmt->execute()) {
        //         //     echo "<script>alert('Upload Gambar berhasil')</script>";
        //         // }
        //     }else{
        //         echo "<script>alert('Upload Gambar Gagal!!')</script>";
        //     }
        // }

    $id_users = $_POST["id_user"];;
    $id_blog = $_POST["id_blog"];
    $judul = $_POST["judul"];
    $category = $_POST["kategori"];
    $isi = $_POST["isi"];
    $date = $_POST["date"];

    $sql = "UPDATE blog SET id_users='$id_users', judul='$judul', category='$category', isi='$isi', Created_at='$date' WHERE id_blog='$id_blog'";
    $result = mysqli_query($db, $sql);
    if($result){
        echo "<script>alert('Update Blog berhasil di Ubah!');</script>";
        echo "<script>window.location.href = window.location.href;</script>";
    } else { 
        echo "<script>alert('Blog anda sudah paling Update')</script>";
    }
}

$id_blog = $_GET['id_edit'];
if(isset($_GET['id_edit'])){
    $showBlog = $db->query("SELECT * FROM blog INNER JOIN users ON users.id=blog.id_users WHERE id_blog = '$id_blog'");
    while ($data = mysqli_fetch_assoc($showBlog)) {
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Blog</title>
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
                        <img src="assets/profile.png" class="rounded-circle" height="25"
                            alt="Black and White Portrait of a Man" loading="lazy" />
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuAvatar">
                        <li>
                            <a class="dropdown-item" href="profile.php?id=<?php echo $_SESSION["user"]["id"] ?>">My
                                profile</a>
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
                        <a class="nav-link" href="profile.php?id=<?php echo $_SESSION["user"]["id"] ?>">Welcome,
                            <?php echo $_SESSION["user"]["fullname"] ?></a>
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
                        <li class="breadcrumb-item"><a href="Myblog.php">MyBlog</a></li>
                        <li class="breadcrumb-item"><a href="editBlog.php?id_edit=<?php echo $data['id_blog'] ?>">Edit
                                Blog</a></li>
                    </ol>
                </nav>
            </div>
        </div>
    </nav>
    <!-- Navbar -->

    <div class="mt-4">
        <div class="container p-3 shadow-5 rounded-lg">
            <div class="mt-3 mb-3">
                <h3>Edit Blog-mu yuk, Agar terlihat fresh</h3>
                <p3>Hasilkan ide terbaik-mu dengan versimu disini!</p3>
            </div>
            <div class="row align-items-center">
                <div class="col-md-6">
                    <form action="" method="POST">
                        <div class="mt-3 mb-3">
                            <label for="" class="mb-1">Judul</label>
                            <input type="hidden" class=form-control name="date"
                                value="<?= date("l"). " " . date("y-m-d") ?>" readonly>
                            <input type="hidden" class="form-control" name="id_blog"
                                value="<?php echo $data["id_blog"] ?>" readonly>
                            <input type="hidden" class=form-control name="id_user" value="<?= $data["id_users"] ?>"
                                readonly>
                            <input type="text" name="judul" class=form-control value="<?php echo $data["judul"] ?>"
                                placeholder="Masukan Judul blog kamu disini" required>
                        </div>
                        <div class="mb-3">
                            <label for="" class="mb-1">Kategori</label>
                            <select class="form-select" name="kategori" aria-label="Default select example" required>
                                <option value="Teknologi">Teknologi</option>
                                <option value="Fashion">Fashion</option>
                                <option value="Coding">Coding</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="" class="mb-1">Isi Blog-mu</label>
                            <textarea name="isi" class="form-control" cols="10" rows="10"
                                placeholder="Tuliskan Ide Blog kamu disini yaa "
                                required><?php echo $data['isi']; ?></textarea>
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-success" type="submit" name="Edit_blog">Edit Blog</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-6">
                    <div class="mb-2">Thumbnails</div>
                    <form action="" method="POST" enctype="multipart/form-data">
                        <center>
                            <div class="mb-2">
                            <input type="hidden" class=form-control name="id_blog" value="<?= $data["id_blog"] ?>" readonly>
                                <img src="<?php echo $data['thumbnails'] ?>" class="img-fluid" alt="">
                            </div>
                        </center>
                        <input type="file" name="thumbnails" class="form-control" required>
                        <div class="mt-3 mb-3">
                            <button type="submit" class="btn btn-primary container" name="ganti_thumbnails">Ganti thumbnails</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        AOS.init();
    </script>
</body>

</html>

<?php }}?>