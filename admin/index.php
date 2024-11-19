
<!--require function to link db_config.php-->
<?php
    include('inc/essentials.php');
    include('inc/db_config.php');
    include('inc/links.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login Panel</title>

<!--connects to links.php for frontend links-->


    <style> 
    .login-form{
        position: absolute;
        top:50%;
        left:50%;
        transform:translate(-50%, -50%);
        width:400px;
        background-color: #000000;
    }
   h4 {
        background-color: #1f050a; /* Darker gray for a less harsh contrast */
        color: #ffffff; /* White text for contrast */
        padding: 10px; /* Optional: adds some padding for aesthetics */
        margin: 0; /* Optional: removes any default margin */
    }
    </style>
</head>

<body class="bg-dark d-flex justify-content-center align-items-center vh-100">

    <div class="login-form text-center rounded shadow p-4" style="background-color: rgba(0, 0, 0, 0.8); max-width: 400px;">
        <form class="login" method="POST">
            <h4 class="bg-black text-white fw-bold fs-4 oswald-regular p-3 rounded">ADMIN LOGIN PANEL</h4>
           
            <div class="mb-3">
                <input name="admin_name" required type="text" class="form-control shadow-none" placeholder="Admin Name">
            </div>

            <div class="mb-4">
                <input name="admin_pass" required type="password" class="form-control shadow-none" placeholder="Password">
            </div>

            <button name="login" type="submit" class="btn btn-outline-light w-100">Login</button> 
        </form>
    </div>

   
</body>

<?php
    #checks if POST in form returns a name='login' value
    #activated when login button is pressed
    if(isset($_POST['login'])){
    #stores the filtered data
    $frm_data = filter($_POST);
  
    #sql query
    #table and col names always within ``"
    $query = "SELECT * FROM `admin` WHERE `admin_name`=? AND `admin_pass`=?";
    $values = [$frm_data['admin_name'], $frm_data['admin_pass']];
    $datatypes = "ss";
    
    #select function from db_config.php
    $res = select($query, $values, $datatypes);
    if($res->num_rows==1){
      $row = mysqli_fetch_assoc($res); //stores the row value in $row
      session_start();
      $_SESSION['adminLogin']  = true;
      $_SESSION['adminID'] = $row['admin_id'];
      redirect("dashboard.php");
    }
    else{
       alert('error', 'Login failed - invalid credentials!');
    }
    }
?>


<!--Has the scripts needed for the frontend-->
    <?php include('inc/scripts.php'); ?>
</body>
</html>