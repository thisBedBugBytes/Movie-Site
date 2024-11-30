<?php
include('inc/db_config.php');
include('inc/essentials.php');
include('inc/links.php');

if(isset($_POST['deleteReview'])){

    $user_id = $_POST['delete_review'];
    $movie_id =  $_POST['deleteReview'];
    echo $user_id;
    echo $movie_id;
    if($user_id != null){
    $query = "DELETE FROM `diary` WHERE `user_id` = $user_id and `movie_id` = $movie_id";
    $result = mysqli_query($con, $query);
    if($result){
        echo '<script> alert("Movie has been deleted"); </script>';
        redirect("reviews.php");
    }
}
else {
    echo "No movie_id detected";
}
}
?>
