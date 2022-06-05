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


if(isset($_POST["feedback"])){
  $id_users = filter_input(INPUT_POST, 'id_users', FILTER_SANITIZE_STRING);
  $fullname = filter_input(INPUT_POST, 'fullname', FILTER_SANITIZE_STRING);
  $category = filter_input(INPUT_POST, 'category', FILTER_SANITIZE_STRING);
  $isi = filter_input(INPUT_POST, 'isi', FILTER_SANITIZE_STRING);

  $sql = "INSERT INTO feedback (id_users, fullname, category, isi) VALUES (:id_users, :fullname, :category, :isi)";
  global $db;
  $stmt = $db->prepare($sql);

  $params = array(
    ":id_users" => $id_users,
    ":fullname" => $fullname,
    ":category" => $category, 
    ":isi" => $isi
  );

    $stmt->execute($params);

    if($stmt){
      echo "<script>alert('Feedback Berhasil Dikirim')</script>";
    } else {
      echo "<script>alert('Feedback Gagal dikirimkan')</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FeedBack</title>
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
            <a class="nav-link" href="Myblog.php">MyBlog</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="https://valentioaditama.github.io/ValentioAditama/">About Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="feedback.php">Feedback</a>
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
                        ?>" class="rounded-circle" height="25"
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
            <a class="nav-link" href="#">Welcome, <?php echo $_SESSION["user"]["fullname"] ?></a>
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
            <li class="breadcrumb-item"><a href="#">FeedBack /</a></li>
          </ol>
        </nav>
      </div>
    </div>
  </nav>
  <!-- Navbar -->

  <div class="mt-3">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-6">
          <h3>Feedback</h3>
          <p class="text3">Yuk berikan feedback terbaik mu kepada Developer agar supaya Blog-ku makin keren di mata
            orang-orang</p>
          <form action="" method="POST">
            <div class="mb-3">
              <label for="username">Fullname</label>
              <input type="text" name="id_users" class="form-control" readonly value="<?= $_SESSION["user"]["id"] ?>" hidden>
              <input type="text" name="fullname" class="form-control" readonly value="<?= $_SESSION["user"]["fullname"] ?>">
            </div>
            <div class="mb-3">
              <label for="Category">Category</label>
              <select id="Category" name="category" class="form-select" aria-label="Default select example">
                <option value="Bugs">Bugs</option>
                <option value="Comment">Comment</option>
                <option value="Other">Other</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="describe">Isi</label>
              <textarea name="isi" class="form-control" id="" cols="10" rows="5" placeholder="Masukan ide atau lainnya kamu disini yuk"></textarea>
            </div>
            <div class="mb-3">
              <button class="btn btn-success container" type="submit" name="feedback">Submit</button>
            </div>
          </form>
        </div>
        <div class="col-md-6">
          <img src="assets/77107-feedback.gif" class="img-fluid" alt="">
        </div>
      </div>
    </div>
  </div>
  <script>
    AOS.init();
  </script>
</body>

</html>