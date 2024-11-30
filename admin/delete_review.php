<?php
include('inc/db_config.php');
include('inc/essentials.php');
include('inc/links.php');

if(isset($_POST['deleteReview'])){

    $user_id = $_POST['deleteReview'];
    echo $user_id;
    if($user_id != null){
    $query = "DELETE FROM `diary` WHERE `user_id` = $user_id";
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
