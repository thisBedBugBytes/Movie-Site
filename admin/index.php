<?php
    include('inc/essentials.php');
    include('inc/db_config.php');
    include('inc/links.php');

    session_start();
    if((isset($_SESSION['adminLogin']))&&$_SESSION['adminLogin']==true){
        redirect('dashboard.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login Panel</title>


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
        background-color: #1f050a; 
        color: #ffffff; 
        padding: 10px; 
        margin: 0; 
    }
   
    .background-image {
        position: fixed; 
        top: 0; 
        left: 0; 
        width: 100%; 
        height: 100vh; 
        object-fit: cover; 
        z-index: 0;
    }

    </style>
</head>

<body class="bg-dark d-flex justify-content-center align-items-center vh-100 position-relative">

    <img src="https://wallpapercave.com/wp/wp10615910.jpg" alt="Background" class="background-image" />

    <div class="login-form text-center rounded shadow p-5" style="background-color: rgba(0, 0, 0, 1); max-width: 500px; position: center; z-index: 1;">
    <form class="login" method="POST">
        <h4 class="bg-black text-white fw-bold fs-4 oswald-regular p-3 rounded">ADMIN LOGIN PANEL</h4>
       
        <div class="mb-4">
            <input name="admin_name" required type="text" class="form-control shadow-none" placeholder="Admin Name">
        </div>

        <div class="mb-4">
            <input name="admin_pass" required type="password" class="form-control shadow-none" placeholder="Password">
        </div>

        <button name="login" type="submit" class="btn btn-outline-light w-100">Login</button> 
    </form>
</div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

<?php
    if(isset($_POST['login'])){
    $frm_data = filter($_POST);
  
    $query = "SELECT * FROM `admin` WHERE `admin_name`=? AND `admin_pass`=?";
    $values = [$frm_data['admin_name'], $frm_data['admin_pass']];
    $datatypes = "ss";
    
    $res = select($query, $values, $datatypes);
    if($res->num_rows==1){
      $row = mysqli_fetch_assoc($res);
      $_SESSION['adminLogin']  = true;
      $_SESSION['adminID'] = $row['admin_id'];
      redirect("dashboard.php");
    }
    else{
       alert('error', 'Login failed - invalid credentials!');
    }
    }
?>

    <?php include('inc/scripts.php'); ?>
</body>
</html>