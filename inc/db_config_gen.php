<?php 

    $host_name = 'localhost';
    $user_name = 'root';
    $pass = '04042018'
    $db = '311_project';

    $con = mysqli_connect($host_name, $user_name, $pass, $db);

    #if connection fails
    if(!$con){
        die("Failed to establish a connection to the database".mysqli_connect_error());
    }

    

?>