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
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
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
      <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-bars"></i>
      </button>

      <!-- Collapsible wrapper -->
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- Navbar brand -->
        <a class="navbar-brand mt-2 mt-lg-0" href="#">
          <img src="assets/blogging.png" height="30" alt="Blog-ku" />
        </a>
        <!-- Left links -->
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" href="home.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="explore.php">Explore</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Myblog.php">MyBlog</a>
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
          <a class="text-reset me-3 dropdown-toggle hidden-arrow" href="#" id="navbarDropdownMenuLink" role="button"
            data-mdb-toggle="dropdown" aria-expanded="false">
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
          <a class="dropdown-toggle d-flex align-items-center hidden-arrow" href="#" id="navbarDropdownMenuAvatar"
            role="button" data-mdb-toggle="dropdown" aria-expanded="false">
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
              <a class="dropdown-item" href="profile.php?id=<?php echo $_SESSION["user"]["id"] ?>">My profile</a>
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
            <li class="breadcrumb-item"><a href="#">Home /</a></li>
          </ol>
        </nav>
      </div>
    </div>
  </nav>
  <!-- Navbar -->


  <div class="container">
    <div class="row justify-content-center align-items-center mt-3">
      <div class="col-md-8">
        <!-- Carousel wrapper -->
        <div id="carouselMaterialStyle" class="carousel slide carousel-fade" data-mdb-ride="carousel">
          <!-- Indicators -->
          <div class="carousel-indicators">
            <button type="button" data-mdb-target="#carouselMaterialStyle" data-mdb-slide-to="0" class="active"
              aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-mdb-target="#carouselMaterialStyle" data-mdb-slide-to="1"
              aria-label="Slide 2"></button>
            <button type="button" data-mdb-target="#carouselMaterialStyle" data-mdb-slide-to="2"
              aria-label="Slide 3"></button>
          </div>

          <!-- Inner -->
          <div class="carousel-inner rounded-5 shadow-4-strong">
            <!-- Single item -->
            <div class="carousel-item active">
              <img src="assets/berita6.jpg" class="d-block w-100" height="400" alt="Sunset Over the City" />
              <div class="carousel-caption d-none d-md-block">
                <h5>Blog Trending Hari ini!</h5>
                <p>FaceBook resmi mengganti namanya menjadi META</p>
              </div>
            </div>

            <!-- Single item -->
            <div class="carousel-item">
              <img src="assets/malware.jpg" class="d-block w-100" height="400" alt="Canyon at Nigh" />
              <div class="carousel-caption d-none d-md-block">
                <h5>Blog Trending Hari ini!</h5>
                <p>Virus malware terbaru merusak sistem komputer</p>
              </div>
            </div>

            <!-- Single item -->
            <div class="carousel-item">
              <img src="assets/linus-torvalds--tedcom.jpg" class="d-block w-100" height="400" alt="Cliff Above a Stormy Sea" />
              <div class="carousel-caption d-none d-md-block">
                <h5>Blog Trending Hari ini!</h5>
                <p>Linus Tolrvalds adalah pendiri linux pertama kali</p>
              </div>
            </div>
          </div>
          <!-- Inner -->
          <!-- Controls -->
          <button class="carousel-control-prev" type="button" data-mdb-target="#carouselMaterialStyle"
            data-mdb-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-mdb-target="#carouselMaterialStyle"
            data-mdb-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>
      <div class="col-md-4">
        <h4>Trending Topics</h4>
        <p class="text3">Trending topics Pada Minggu Ini</p>
        <div class="mb-3">
          <div class="row align-items-center shadow-4-strong p-1 rounded">
            <div class="col-md-6">
              <img src="assets/berita.jpeg" class="img-fluid rounded" alt="">
            </div>
            <div class="col-md-6">
              <h6>Facebook Resmi ganti nama menjadi Meta</h4>
                <p class="text3">Facebook resmi menggantikan...</p>
            </div>
          </div>
        </div>
        <div class="mb-3">
          <div class="row align-items-center shadow-4-strong p-1 rounded">
            <div class="col-md-6">
              <img src="assets/berita.jpeg" class="img-fluid rounded" alt="">
            </div>
            <div class="col-md-6">
              <h6>Facebook Resmi ganti nama menjadi Meta</h4>
                <p class="text3">Facebook resmi menggantikan...</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Carousel wrapper -->

  <div class="mt-4">
    <div class="container">
      <div class="mt-3 mb-3">
        <h3>Blog Topics Tutorial</h3>
        <p3>Mengenai Seputar Tutorial Show pada minggu ini</p3>
      </div>
      <div class="row">
      <?php 
        $showBlog = $db->query("SELECT * FROM blog WHERE category = 'Tutorial' ORDER BY id_blog DESC");
        while ($data2 = mysqli_fetch_assoc($showBlog)) {
        ?>
       <div class="col-md-3">
          <div class="card">
            <a href="reviewBlog.php?id=<?php echo $data2['id_blog'] ?>">
              <img src="<?php echo $data2['thumbnails'] ?>" class="card-img-top" height="145"
                alt="Fissure in Sandstone" />
            </a>
            <div class="card-body">
              <h5 class="card-title"><?php echo substr($data2['judul'], 0, 35) ?>...</h5>
              <p class="card-text"><?php echo substr($data2['isi'], 0, 30); ?>...</p>
              <a href="reviewBlog.php?id=<?php echo $data2['id_blog'] ?>" class="btn btn-primary">Lihat Blog</a>
            </div>
          </div>
        </div>
        <?php } ?>
      </div>
    </div>
  </div>

  <div class="mt-4">
    <div class="container">
      <div class="mt-3 mb-3">
        <h3>Blog Topics Teknologi Terbaru</h3>
        <p3>Mengenai Seputar Teknologi pada minggu ini</p3>
      </div>
      <div class="row mb-4">
        <?php 
        $showBlog = $db->query("SELECT * FROM blog WHERE category = 'Teknologi' ORDER BY id_blog DESC LIMIT 4");
        while ($data = mysqli_fetch_assoc($showBlog)) {
        ?>
        <div class="col-md-3">
          <div class="card">
            <a href="reviewBlog.php?id=<?php echo $data['id_blog'] ?>">
              <img src="<?php echo $data['thumbnails'] ?>" class="card-img-top" height="145"
                alt="Fissure in Sandstone" />
            </a>
            <div class="card-body">
              <h5 class="card-title"><?php echo substr($data['judul'], 0, 35) ?>...</h5>
              <p class="card-text"><?php echo substr($data['isi'], 0, 30); ?>...</p>
              <a href="reviewBlog.php?id=<?php echo $data['id_blog'] ?>" class="btn btn-primary">Lihat Blog</a>
            </div>
          </div>
        </div>
        <?php } ?>
      </div>
      <div class="mt-5 mb-3">
        <h3>Blog Topics Coding Terbaru</h3>
        <p3>Mengenai Seputar Coding pada minggu ini</p3>
      </div>
      <div class="row mb-4">
        <?php 
        $showBlog = $db->query("SELECT * FROM blog WHERE category = 'Coding' ORDER BY id_blog DESC LIMIT 4");
        while ($data2 = mysqli_fetch_assoc($showBlog)) {
        ?>
        <div class="col-md-3">
          <div class="card">
            <a href="reviewBlog.php?id=<?php echo $data2['id_blog'] ?>">
              <img src="<?php echo $data2['thumbnails'] ?>" class="card-img-top" height="145"
                alt="Fissure in Sandstone" />
            </a>
            <div class="card-body">
              <h5 class="card-title"><?php echo substr($data2['judul'], 0, 35) ?>...</h5>
              <p class="card-text"><?php echo substr($data2['isi'], 0, 30); ?>...</p>
              <a href="reviewBlog.php?id=<?php echo $data2['id_blog'] ?>" class="btn btn-primary">Lihat Blog</a>
            </div>
          </div>
        </div>
        <?php } ?>
      </div>
    </div>
  </div>

  <script>
    AOS.init();
  </script>
</body>

</html>