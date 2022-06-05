<?php 
require_once("logic.php");
require_once("auth.php");
// include("database.php");
ConnectDB();
session_start();
if(!isset($_SESSION["user"])) header("Location: login.php");

if (isset($_POST["Buat_blog"])) {
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

    $id_users = filter_input(INPUT_POST, 'id_users', FILTER_SANITIZE_STRING);
    $judul = filter_input(INPUT_POST, 'judul', FILTER_SANITIZE_STRING);
    $category = filter_input(INPUT_POST, 'kategori', FILTER_SANITIZE_STRING);
    $isi = filter_input(INPUT_POST, 'isi', FILTER_SANITIZE_STRING);
    $date = filter_input(INPUT_POST, 'date', FILTER_SANITIZE_STRING);

    $img_name = $_FILES['thumbnails']['name'];
    $tmp_img_name = $_FILES['thumbnails']['tmp_name'];
    $folder = 'upload/'.$img_name;
    move_uploaded_file($tmp_img_name, $folder);

    $sql = "INSERT INTO blog (id_users, judul, category, isi, thumbnails, Created_at) VALUES (:id_users, :judul, :category, :isi, :thumbnails, :Created_at)";
    global $db;
    $stmt = $db->prepare($sql);

    $params = array(
      ":id_users" => $id_users,
      ":judul" => $judul,
      ":category" => $category, 
      ":isi" => $isi,
      ":thumbnails" => $folder,
      ":Created_at" => $date
    );

     $stmt->execute($params);

     if($stmt){
       echo "<script>alert('Blog Berhasil di buat')</script>";
       header("Location: Myblog.php");
     } else {
       echo "<script>alert('Blog Gagal di Buat')</script>";
     }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Blog</title>
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
                        <li class="breadcrumb-item"><a href="Myblog.html">MyBlog</a></li>
                        <li class="breadcrumb-item"><a href="buatBlog.html">Buat Blog</a></li>
                    </ol>
                </nav>
            </div>
        </div>
    </nav>
    <!-- Navbar -->

    <div class="mt-4">
        <div class="container p-3 shadow-5 rounded-lg">
            <div class="mt-3 mb-3">
                <h3>Kembangkan ide kamu di bawah ini</h3>
                <p3>Hasilkan ide terbaik-mu dengan versimu disini!</p3>
            </div>
            <div class="row align-items-center">
                <div class="col-md-6">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="mt-3 mb-3">
                            <label for="" class="mb-1">Judul</label>
                            <input type="text" class=form-control name="date" value="<?= date("l"). " " . date("y-m-d") ?>" readonly>
                            <input type="hidden" class=form-control name="id_users" value="<?= $_SESSION["user"]["id"] ?>" readonly>
                            <input type="text" name="judul" class=form-control
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
                            <label for="">Thumbnails</label>
                            <input type="file" name="thumbnails" class="form-control" required>
                        </div>
                </div>
                <div class="col-md-6">
                    <label for="">Isi Blog-mu</label>
                    <textarea name="isi" class="form-control" cols="10" rows="10"
                        placeholder="Tuliskan Ide Blog kamu disini yaa " required></textarea>
                </div>
            </div>
            <div class="mb-3">
                <button class="btn btn-success" type="submit" name="Buat_blog">Upload Sekarang</button>
            </div>
            </form>
        </div>
    </div>

    <script>
        AOS.init();
    </script>
</body>

</html>