<?php
include('inc/essentials.php');
include('inc/db_config.php');
include('inc/links.php');

adminLogin();

$totalUserQuery = "SELECT COUNT(*) as total_users FROM user";
$totalUserResult = $con->query($totalUserQuery);
$totalUserRow = mysqli_fetch_assoc($totalUserResult);
$totalUser = $totalUserRow['total_users'];

$movieCountQuery = "SELECT COUNT(*) as total_movies FROM movies";
$movieCountResult = $con->query($movieCountQuery);
$movieCountRow = mysqli_fetch_assoc($movieCountResult);
$movieCount = $movieCountRow['total_movies'];

$totalBanQuery = "SELECT COUNT(*) as total_banned FROM user where Banned=0";
$totalBanResult = $con->query($totalBanQuery);
$totalBanRow = mysqli_fetch_assoc($totalBanResult);
$totalBan = $totalBanRow['total_banned'];

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    header("Refresh: 3;"); // Refresh the page after 3 seconds
    exit(); 
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Users</title>
    <style>
        body {
            color: #F4CE14;
        }

        .card-header {
            background-color: #DAA520;
            color: #fff;
        }

        .card {
            margin-bottom: 20px;
            height: 100%;
        }

        .card-title {
            font-size: 1.5rem;
        }

        .card-text {
            font-size: 0.9rem;
            color: #000;
        }
        
    </style>

</head>

<body style="color:#F4CE14">
<div class="container-fluid bg-dark text-light p-3 d-flex align-items-center justify-content-between sticky-top">
    <div class="d-flex align-items-center">
        <a class="mb-0 oswald-regular mb-1 fw-bold fs-1" href="../index.php" style="color: white; text-decoration: none;">CineBox</a>
        <a href="logout.php" class="btn btn-sm btn-outline-light outfit-regular rounded-0 fw-bold shadow-none oswald-regular my-3 ms-2">Log Out</a>
    </div>
</div>


    <div class="col-lg-2 bg-light border-top border-3 border-secondary" id="dashboard-menu" style="min-height: 100vh;">
        <h5 class="text-dark text-center fw-bold fs-3 outfit-regular mt-2 p-2">Admin Panel</h5>
        <ul class="nav nav-pills flex-column">
            <li class="nav-item">
                <a class="nav-link outfit-regular fs-6 fw-bold" href="dashboard.php">Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link outfit-regular fs-6 fw-bold" href="movies.php">Movies</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active outfit-regular fs-6 fw-bold" href="users.php">Users</a>
            </li>
            <li class="nav-item">
                <a class="nav-link outfit-regular fs-6 fw-bold" href="reviews.php">Reviews</a>
            </li>
        </ul>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h3 class="oswald-regular fw-bold fs-2">Users</h3>
                </div>
                <div class="table-responsive-md" style="height: 570px; overflow: auto;">
                    <table class="table table-hover table-dark table-striped " style="min-width: 600px;">
                        <thead class="sticky-top">
                            <tr>
                                <th scope="col" width="10%">ID</th>
                                <th scope="col" width="12%">Name</th>
                                <th scope="col" width="10%">Contact</th>
                                <th scope="col" width="13%">Email</th>
                                <th scope="col" width="5%">Password</th>
                                <th scope="col" width="10%">Date of Birth</th>
                                <th scope="col" width="10%">Gender</th>
                                <th scope="col" width="10%">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $con = $GLOBALS['con'];
                            $sql = "SELECT * FROM `user` ORDER BY user_id;";
                            $data = mysqli_query($con, $sql);
                            if(!$data ) echo "quesry failed";
                            while ($row = mysqli_fetch_assoc($data)) {
                                $check = ($row['Banned'] == 1)? "checked" : "";
                                $on = "Unban";
                                $off = "Ban";
                                
                                echo <<<query
                                    <tr>
                                    <td>$row[user_id]</td>
                                    <td>$row[name]</td>
                                    <td>$row[phone_number]</td>
                                    <td>$row[email]</td>
                                    <td>$row[password]</td>
                                    <td>$row[dob]</td>
                                    <td>$row[gender]</td>
                                    <td>
                                       <input type="checkbox" class="banbtn" id="bann" name="banBtn" data-user-id="{$row['user_id']}" data-banned="{$row['Banned'] }"  $check data-toggle="toggle" data-onstyle="outline-danger" data-offstyle="outline-warning" data-on=$on data-off=$off>
                                    
                                       </tr>
                                    
                                   query;
                                  
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
               
            </div>
        </div>
    </div>

    <?php include('inc/scripts.php'); ?>
    <script>
        
        $(document).ready(function(){
            console.log('Document ready');
            

            $('.banbtn').change( 'click', function(){
                console.log('function ready');
                console.log(document.getElementById('bann').checked);
              
                  
      
            var isBanned = !($(this).data('banned'));
            console.log(isBanned);
            var banid = $(this).data('user-id');
            var banbtn= (isBanned)? 1 : 0;

            console.log(banid);
            console.log(isBanned);
            $.ajax({
                type:"POST",
                url: "ban_user.php",
                data: {banbtn: banbtn, banId: banid },
                success: function(data){
                    console.log(data);
                   
                    
                }
            });
       
        
        });
       
    });
   
 
    </script>
   
</body>

</html>