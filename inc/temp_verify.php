<?php 
session_start();

include("db_config_gen.php");

$username = filter_input(INPUT_POST, "username");
$password = filter_input(INPUT_POST, "password");
$email = filter_input(INPUT_POST, "email");

$table_name = 'users';
$query = "select * from $table_name where username = '$username' and password = '$password'";
$result = mysqli_query($con, $query);

if($result->num_rows > 0){
    echo "Successfully logged in";
}
else{
    echo "Wrong username or Password";
}

?>