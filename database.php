<?php 
$server = "localhost"; 
$username = "root";
$password = "";
$DatabaseName = "Blog-ku";

$db = mysqli_connect($server, $username, $password, $DatabaseName);
if(!$db){
    echo "Gagal terhubung pada database";
}

// echo "Sukses terhubung pada database";
?>