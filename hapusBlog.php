<?php
session_start();
include("auth.php");
include("database.php");
include("logic.php");

$id_blog = $_GET['hapus'];
$sql = "DELETE FROM blog WHERE id_blog = '$id_blog'";
$result = mysqli_query($db, $sql);
if($result){
    echo "<script>alert('Berhasil di Hapus')</script>";
    header("Location: Myblog.php");
}else{
    echo "<script>alert('Gagal di Hapus')</script>";
    header("Location: Myblog.php");    
}
?>