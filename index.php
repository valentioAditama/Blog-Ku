<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Welcome</title>
  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
  <!-- MDB -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.1.0/mdb.min.css" rel="stylesheet" />
  <!-- MDB -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.1.0/mdb.min.js"></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <link rel="icon" href="assets/blogging.png">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullPage.js/4.0.9/fullpage.css">
  <link rel="stylesheet" href="style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
  <script src="https://unpkg.com/typeit@8.6.0/dist/index.umd.js"></script>

</head>

<body>
  <div id="fullpage">
    <div class="section">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-6">
            <img data-aos="zoom-in-down" data-aos-duration="2000" src="assets/20860-person-on-laptop-working-on-laptop.gif" class="img-fluid" alt="" srcset="">
          </div>
          <div class="col-md-6" data-aos="zoom-in-left" data-aos-duration="2000">
            <h1 id="myElement"><span id="myElement"></span></h1>
            <p class="text1">Share yuk ide dan cerita kalian ke orang-orang! agar teman dan kerabatmu tau </p>
          </div>
        </div>
      </div>
    </div>
    <div class="section background2">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-6 text-end">
            <h1>Cari Ide!</h1>
            <p class="text1">Tuangkan ide-ide mu terbaik dalam perjalanan dan dimanapun anda berada </p>
          </div>
          <div class="col-md-6">
            <img src="assets/Blogging-bro.png" class="img-fluid" alt="">
          </div>
        </div>
      </div>
    </div>
    <div class="section">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-6">
            <img src="assets/74424-worker-have-an-idea.gif" class="img-fluid" alt="">
          </div>
          <div class="col-md-6">
            <h1>Tuangkan yuk ke Blog-ku</h1>
            <p class="text1">Implementasikan hasil ide mu dan raihlah pencapaian terbesarmu </p>
          </div>
        </div>
      </div>
    </div>
    <div class="section background2">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-6 text-end">
            <h1>Raihlah pencapaian!🎉</h1>
            <p class="text1">Raihlah pencapaian kamu sehingga kamu menjadi blogger handal di Blog-ku </p>
            <a href="login.php" class=" btn btn-success">Mulai Sekarang</a>
          </div>
          <div class="col-md-6">
            <img src="assets/Self confidence-bro.png" class="img-fluid" alt="">
          </div>
        </div>
      </div>
    </div>
    <!-- <div class="section">
      <div class="container">
        <div class="row aling-items-center">
          <div class="col-md-6 text-end">
            <h1>Raihlah pencapaian!🎉</h1>
            <p class="text1">Raihlah pencapaian kamu sehingga kamu menjadi blogger handal di Blog-ku </p>
            <button class="btn btn-primary">Mulai Sekarang</button>
          </div>
          <div class="col-md-6">
            <img src="assets/Self confidence-bro.png" class="img-fluid" alt="">
          </div>
        </div>
      </div>
    </div> -->
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullPage.js/3.1.2/fullpage.min.js"></script>
<script>
    new fullpage('#fullpage', {
      //options here
      autoScrolling: true,
      scrollHorizontally: true
    });

    AOS.init();

    //methods
    fullpage_api.setAllowScrolling(true);
    
    new TypeIt("#myElement", {
  strings: "Selamat Datang di Blog-ku!",
  speed: 100,
  loop: false,
})
.pause(5000)
.delete(30)
.type("Hi, Caon Bloer!")
.pause(2000)
.move(-3)
.type('g')
.type('g')
.type('g')
.delete(1)
.pause(2000)
.move(-8)
.type('l')
.move(12)
.go();

  </script>
</body>

</html>