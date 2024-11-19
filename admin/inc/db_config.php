<!--For CRUD ops-->
<?php
    #arguments for connection
    $host_name = 'localhost';
    $user_name = 'root';
    $pass = '';
    $db = 'CineBox';

    #php object for db connedction
    $con = mysqli_connect($host_name, $user_name, $pass, $db);

    #if $con doesn't connect, script exec stops
        if(!$con) {
            die("Cannot connect tp Database".mysqli_connect_error());
        }

        function filter($data){
            #extracts the values 
            #from the data in POST in index.php
            foreach($data as $key => $value){
                $data[$key] = trim($value); #stores trimmed data
                $data[$key] = stripslashes($value); #rmvs slashes
                $data[$key] = htmlspecialchars($value); 
                $data[$key] = strip_tags($value); #   
            }
            #send back the cleaned up data
            return $data;

            #removes whitespaces at the beg and end
            # trim();
            #rmv extra slashses
            # stripslashes();
            #converts spc html chars (> or ==)to entities
            # htmlspecialchars();
            #rmv html tags
            # strip_tags();
        }

        function select($sql, $values, $datatypes){
            $con = $GLOBALS['con']; #the $con is out of scope here, so another var is being created
            if($stmt = mysqli_prepare($con, $sql)){
                mysqli_stmt_bind_param($stmt, $datatypes, ...$values); #... is the splat operator; allows user to pass an arbitrary amount of data
               if(mysqli_stmt_execute($stmt)){
                $res = mysqli_stmt_get_result($stmt);
                mysqli_stmt_close($stmt);
                return $res;
               }
               else{
                mysqli_stmt_close($stmt);
                die("Query cannot be prepared-Select");
               }
              
            }
            else{
                die("Query cannot be executed-Select");
            }
        }
?>