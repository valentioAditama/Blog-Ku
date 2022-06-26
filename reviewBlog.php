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

$id_blog = $_GET["id"];
$show_blog = $db->query("SELECT * FROM blog WHERE id_blog='$id_blog' ");
if (mysqli_num_rows($show_blog) == 0) {
}else{
    $row2 = mysqli_fetch_assoc($show_blog);
}

if(isset($_GET['id'])){
    $showBlog = $db->query("SELECT * FROM blog INNER JOIN users ON users.id=blog.id_users WHERE id_blog = '$id_blog'");
    while ($data = mysqli_fetch_assoc($showBlog)) {
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Review Blog - <?php echo substr($data['judul'], 0, 50) ?>....</title>
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
                        <a class="nav-link" href="explore.php">Explore</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">MyBlog</a>
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
                        ?>" class="rounded-circle" height="25" alt="Black and White Portrait of a Man"
                            loading="lazy" />
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuAvatar">
                        <li>
                            <a class="dropdown-item" href="profile.php?id=<?php echo $row['id']?>">My profile</a>
                        </li>
                        <!-- <li>
                            <a class="dropdown-item" href="#">Settings</a>
                        </li> -->
                        <li>
                            <a class="dropdown-item" href="logout.php">Logout</a>
                        </li>
                    </ul>
                </div>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="profile.php?id=<?php echo $row['id']?>">Welcome,
                            <?php echo $row['fullname']; ?></a>
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
                        <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                        <li class="breadcrumb-item"><a href="reviewBlog.php?id=<?php echo $data['id'] ?>">Review
                                Blog</a></li>
                    </ol>
                </nav>
            </div>
        </div>
    </nav>
    <!-- Navbar -->

    <div class="mt-4 shadow-4">
        <div class="container rounded-5">
            <div class="row">
                <div class="col-md-8">
                    <div class="mt-3 mb-3">
                        <div class="row align-items-center">
                            <div class="mb-2 row align-items-center">
                                <small><img src="<?php
                        $photo = $data['profile_images'];
                        $photo2 = 'uploadProfile/'.$row['profile_images'];
                        if (file_exists($photo) == FALSE){
                            echo 'uploadProfile/profile.gif';
                        }else{
                            echo $data['profile_images'];
                        }
                        ?>" class="rounded-circle" height="25" alt="Black and White Portrait of a Man"
                                        loading="lazy" /> Author: <?php echo $data['fullname'] ?></small>
                            </div>
                            <div class="col-md-8">
                                <h4><?php echo $data['judul']; ?></h4>
                                <p class="text3">Dibuat Pada Tanggal : <?php echo $row2['Created_at'] ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <img src="<?php echo $data['thumbnails'] ?>" class="img-fluid" height="200" alt="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3">
                            <p class="text4"><b>Blog-ku</b>- <?php echo $data['isi']; ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 shadow-4 rounded">
                    <div class="align-items-center mb-5">
                        <h4>Trending Topics</h4>
                        <p class="text3">
                            Trending topics Hari ini pada kategori Teknologi
                        </p>
                        <div class="row align-items-center shadow-4-strong p-1 rounded mb-3">
                            <div class="col-md-6">
                                <img src="assets/berita.jpeg" class="img-fluid rounded" alt="">
                            </div>
                            <div class="col-md-6">
                                <h6>Facebook Resmi ganti nama menjadi Meta</h4>
                                    <p class="text3">Facebook resmi menggantikan...</p>
                            </div>
                        </div>
                        <div class="row align-items-center shadow-4-strong p-1 rounded mb-3">
                            <div class="col-md-6">
                                <img src="assets/berita7.jpg" class="img-fluid rounded" alt="">
                            </div>
                            <div class="col-md-6">
                                <h6>Kelompok Hacker Klaim Bobol Sistem Keamanan PS5</h4>
                                    <p class="text3">Facebook resmi menggantikan...</p>
                            </div>
                        </div>
                        <div class="row align-items-center shadow-4-strong p-1 rounded mb-3">
                            <div class="col-md-6">
                                <img src="assets/berita2.jpeg" class="img-fluid rounded" alt="">
                            </div>
                            <div class="col-md-6">
                                <h6>Facebook Resmi ganti nama menjadi Meta</h4>
                                    <p class="text3">Facebook resmi menggantikan...</p>
                            </div>
                        </div>
                    </div>
                    <div class="align-items-center">
                        <h4>Teknologi Topics</h4>
                        <p class="text3">
                            Trending topics Hari ini pada kategori Teknologi
                        </p>
                        <div class="row align-items-center shadow-4-strong p-1 rounded mb-3">
                            <div class="col-md-6">
                                <img src="assets/berita.jpeg" class="img-fluid rounded" alt="">
                            </div>
                            <div class="col-md-6">
                                <h6>Facebook Resmi ganti nama menjadi Meta</h4>
                                    <p class="text3">Facebook resmi menggantikan...</p>
                            </div>
                        </div>
                        <div class="row align-items-center shadow-4-strong p-1 rounded mb-3">
                            <div class="col-md-6">
                                <img src="assets/berita7.jpg" class="img-fluid rounded" alt="">
                            </div>
                            <div class="col-md-6">
                                <h6>Kelompok Hacker Klaim Bobol Sistem Keamanan PS5</h4>
                                    <p class="text3">Facebook resmi menggantikan...</p>
                            </div>
                        </div>
                        <div class="row align-items-center shadow-4-strong p-1 rounded mb-3">
                            <div class="col-md-6">
                                <img src="assets/berita2.jpeg" class="img-fluid rounded" alt="">
                            </div>
                            <div class="col-md-6">
                                <h6>Facebook Resmi ganti nama menjadi Meta</h4>
                                    <p class="text3">Facebook resmi menggantikan...</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="mt-3 mb-3">
                    <h3>Komentar</h3>
                    <p class="text4">Tulisakan Komentarmu disini </p>
                    <textarea name="" class="form-control" id="" cols="10" rows="5"
                        placeholder="Masukan Komentarmu yuk disini"></textarea>
                    <div class="mt-3">
                        <button class="btn btn-primary container">Kirim Komentar</button>
                    </div>
                </div>
                <div class="mt-3 mb-3">
                    <div class="row shadow-4-strong rounded p-3">
                        <div class="row">
                            <div class="col-md-6">
                                <h5>Valentio Aditama</h5>
                            </div>
                            <div class="col-md-6 text-end">
                                <h5>Senin, 20 Juni 2020</h5>
                            </div>
                            <p class="text3">
                                Postingan ini keren tingkatkan yaa lagi ya, udah bagus banget share"nya ini keren...
                            </p>
                        </div>
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
<?php } } ?>