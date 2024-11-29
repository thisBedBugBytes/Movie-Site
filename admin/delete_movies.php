<?php
include('inc/db_config.php');
include('inc/essentials.php');
include('inc/links.php');

if(isset($_POST['deleteData'])){
    $movie_id = $_POST['delete'];
    if($movie_id != null){
    $query = "DELETE FROM `movies` WHERE `movie_id` = $movie_id";
    $result = mysqli_query($con, $query);
    if($result){
        echo '<script> alert("Movie has been deleted"); </script>';
        redirect("movies.php");
    }
}
else {
    echo "No movie_id detected";
}
}
?>
