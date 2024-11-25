<?php 

    $host_name = "localhost";
    $user_name = "root";
    $pass = "04042018";
    $db = "311_project";

    $con = new mysqli($host_name, $user_name, $pass, $db);

    #if connection fails
    if(!$con){
        die("Failed to establish a connection to the database".mysqli_connect_error());
    }
    else{
        echo "Connection Successful";
    
    function display_img($id){
        $con = $GLOBALS['con'];
        $query = "Select poster from movies where movie_id=$id";
        $result = mysqli_query($con, $query);
        if($result->num_rows > 0){
            $images = [];
            while($rows = mysqli_fetch_assoc($result)){
            $images[]= $rows;
            }
            #echo $images;
            return $images;
        }
        else {
            return "";
        }
        }
        function return_values($id_type, $id){
            $con = $GLOBALS['con']; // Access the global connection
            $query = "Select * from movies WHERE movie_id=$id";
            $result = mysqli_query($con, $query);
            if($result->num_rows > 0){
                $data = [];
            while($row = mysqli_fetch_assoc($result)){
                    
                if($row[$id_type] == $id){
                    $data[] = $row;
                }
            }
            return $data[0];
        }  else{
            echo "Failed to get data";
        }
    }    

    
    }
?>