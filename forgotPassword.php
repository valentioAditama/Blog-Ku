<?php 
include "database.php";

use PHPMailer\PHPMailer\PHPMailer;

use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';

require 'PHPMailer/src/PHPMailer.php';

require 'PHPMailer/src/SMTP.php';

if(isset($_POST["resetPassword"])){
    $emailTo = $_POST["email"];
    $code = uniqid(true);
    $query = mysqli_query($db, "INSERT INTO password_reset_temp VALUES('','$emailTo', '$code')");
    if(!$query){
        $mail = new PHPMailer(true);
        try {
              //Server settings

        $mail->SMTPDebug = 2;                                 // Enable verbose debug output

        $mail->isSMTP();                                      // Set mailer to use SMTP

        $mail->Host = 'smtp.gmail.com';                     // Specify main and backup SMTP servers

        $mail->SMTPAuth = true;                               // Enable SMTP authentication

        $mail->Username = "shelliripati.dumet@gmail.com";     // SMTP username

        $mail->Password = 'xxxxxxxx';                         // SMTP password

        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted

        $mail->Port = 587;                                    // TCP port to connect to

        //Recipients

        $mail->setFrom("shelliripati.dumet@gmail.com", "Shelli Ripati"); //email pengirim

        $mail->addAddress($emailTo); // Email penerima

        $mail->addReplyTo("no-reply@gmail.com");

        //Content

        $url = "http://" . $_SERVER["HTTP_HOST"] .dirname($_SERVER["PHP_SELF"]). "/reset?reset_pass=$code"; //sesuaikan berdasarkan link server dan nama file

        $mail->isHTML(true);                                  // Set email format to HTML

        $mail->Subject = "Link reset password";

        $mail->Body    = "<h1>Permintaan reset password</h1><p> Klik <a href='$url'>link ini</a> untuk mereset password</p>" ;

        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();

        echo 'Link reset password berhasil dikirimkan ke email.';
        } catch (\Throwable $th) {
            echo 'Message could not be sent.';

            echo 'Mailer Error: ' . $mail->ErrorInfo;
        
        }
        exit();
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link rel="icon" href="assets/blogging.png">
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.1.0/mdb.min.css" rel="stylesheet" />
    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.1.0/mdb.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <form action="">
                    <div class="mb-3">
                        <h2>Forgot Password </h2>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                            placeholder="Masukan Email">
                    </div>
                    <div class="mb-3">
                        <div class="row">
                            <div class="col-md-6">
                                <a href="login.php">Back To Login</a>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <button name="resetPassword" type="submit" class="container btn btn-primary">Verify
                            Email</button>
                    </div>
                </form>
            </div>
            <div class="col-md-6">
                <img src="assets/75988-forgot-password.gif" class="img-fluid" alt="">
            </div>
        </div>
    </div>

    <script>
        AOS.init();
    </script>
</body>

</html>