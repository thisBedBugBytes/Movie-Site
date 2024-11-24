<?php 
    include("inc/essentials.php");

    session_start();
    session_destroy();
    echo "<script>alert('Logged Out');</script>";
    header('Location:../index.php');
    exit();


?>