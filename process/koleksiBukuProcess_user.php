<?php
session_start();
require("../db.php");
$id=$_GET['id'];
$user_id=$_SESSION['user']['id'];
$query=mysqli_query($con,"INSERT INTO koleksi (UserID, BukuID)VALUES('$user_id','$id')");
if($query){
    header("location:../user/userkoleksipribadi.php");
}
?>