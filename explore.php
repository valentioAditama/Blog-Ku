<?php 
session_start();
if(!isset($_SESSION["user"])) header("Location: login.php");
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
            <a class="nav-link" href="home.html">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="explore.html">Explore</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Myblog.html">MyBlog</a>
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
            <img src="https://mdbcdn.b-cdn.net/img/new/avatars/2.webp" class="rounded-circle" height="25"
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
            <a class="nav-link" href="#">Welcome, Valentio Aditama</a>
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
            <li class="breadcrumb-item"><a href="#">Explore /</a></li>
          </ol>
        </nav>
      </div>
    </div>
  </nav>

  <!-- Navbar -->

  <div class="mt-4">
    <div class="container">
      <div class="mt-3 mb-3">
        <h3>Blog Topics Teknologi Terbaru</h3>
        <p3>Mengenai Seputar Teknologi pada minggu ini</p3>
      </div>
      <div class="row">
        <div class="col-md-3">
          <div class="card">
            <img src="https://mdbcdn.b-cdn.net/img/new/standard/nature/184.webp" class="card-img-top"
              alt="Fissure in Sandstone" />
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
                content.</p>
              <a href="#!" class="btn btn-primary">Button</a>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card">
            <img src="https://mdbcdn.b-cdn.net/img/new/standard/nature/184.webp" class="card-img-top"
              alt="Fissure in Sandstone" />
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
                content.</p>
              <a href="#!" class="btn btn-primary">Button</a>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card">
            <img src="https://mdbcdn.b-cdn.net/img/new/standard/nature/184.webp" class="card-img-top"
              alt="Fissure in Sandstone" />
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
                content.</p>
              <a href="#!" class="btn btn-primary">Button</a>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card">
            <img src="https://mdbcdn.b-cdn.net/img/new/standard/nature/184.webp" class="card-img-top"
              alt="Fissure in Sandstone" />
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
                content.</p>
              <a href="#!" class="btn btn-primary">Button</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="mt-4">
    <div class="container">
      <div class="mt-3 mb-3">
        <h3>Blog Topics Fashion</h3>
        <p3>Mengenai Seputar Fashion Show  pada minggu ini</p3>
      </div>
      <div class="row">
        <div class="col-md-3">
          <div class="card">
            <img src="https://mdbcdn.b-cdn.net/img/new/standard/nature/184.webp" class="card-img-top"
              alt="Fissure in Sandstone" />
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
                content.</p>
              <a href="#!" class="btn btn-primary">Button</a>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card">
            <img src="https://mdbcdn.b-cdn.net/img/new/standard/nature/184.webp" class="card-img-top"
              alt="Fissure in Sandstone" />
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
                content.</p>
              <a href="#!" class="btn btn-primary">Button</a>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card">
            <img src="https://mdbcdn.b-cdn.net/img/new/standard/nature/184.webp" class="card-img-top"
              alt="Fissure in Sandstone" />
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
                content.</p>
              <a href="#!" class="btn btn-primary">Button</a>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card">
            <img src="https://mdbcdn.b-cdn.net/img/new/standard/nature/184.webp" class="card-img-top"
              alt="Fissure in Sandstone" />
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
                content.</p>
              <a href="#!" class="btn btn-primary">Button</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="mt-4">
    <div class="container">
      <div class="mt-3 mb-3">
        <h3>Blog Topics Coding Challange</h3>
        <p3>Mengenai Seputar Coding Challange pada minggu ini</p3>
      </div>
      <div class="row">
        <div class="col-md-3">
          <div class="card">
            <img src="https://mdbcdn.b-cdn.net/img/new/standard/nature/184.webp" class="card-img-top"
              alt="Fissure in Sandstone" />
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
                content.</p>
              <a href="#!" class="btn btn-primary">Button</a>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card">
            <img src="https://mdbcdn.b-cdn.net/img/new/standard/nature/184.webp" class="card-img-top"
              alt="Fissure in Sandstone" />
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
                content.</p>
              <a href="#!" class="btn btn-primary">Button</a>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card">
            <img src="https://mdbcdn.b-cdn.net/img/new/standard/nature/184.webp" class="card-img-top"
              alt="Fissure in Sandstone" />
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
                content.</p>
              <a href="#!" class="btn btn-primary">Button</a>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card">
            <img src="https://mdbcdn.b-cdn.net/img/new/standard/nature/184.webp" class="card-img-top"
              alt="Fissure in Sandstone" />
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
                content.</p>
              <a href="#!" class="btn btn-primary">Button</a>
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