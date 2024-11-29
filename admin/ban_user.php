<?php
include('inc/essentials.php');
include('inc/db_config.php');


if(isset($_POST['banbtn'])){
    $con = $GLOBALS['con'];
    $banid = intval($_POST['banId']); // Ensure banid is an integer
    $banbtn = ($_POST['banbtn'])? 1:0; // Ensure banbtn is either 0 or 1


    $query = "UPDATE`user` 
     SET `Banned`= $banbtn
     WHERE `user_id`=$banid;";
   
    $result = mysqli_query($con, $query);
    if($result){
        echo '<script>alert("it worked");</script>;';
    }
}

//else{
//    echo "no id found";
//}


?>