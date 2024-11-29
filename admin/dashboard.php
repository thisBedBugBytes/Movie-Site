<?php

include('inc/essentials.php');
include('inc/db_config.php');
include('inc/links.php');



$totalUserQuery = "SELECT COUNT(*) as total_users FROM user";
$totalUserResult = $con->query($totalUserQuery);
$totalUserRow = mysqli_fetch_assoc($totalUserResult);
$totalUser = $totalUserRow['total_users'];

$movieCountQuery = "SELECT COUNT(*) as total_movies FROM movies";
$movieCountResult = $con->query($movieCountQuery);
$movieCountRow = mysqli_fetch_assoc($movieCountResult);
$movieCount = $movieCountRow['total_movies'];

$totalBanQuery = "SELECT COUNT(*) as total_banned FROM user where banned=1";
$totalBanResult = $con->query($totalBanQuery);
$totalBanRow = mysqli_fetch_assoc($totalBanResult);
$totalBan = $totalBanRow['total_banned'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
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
        <a class="mb-0 oswald-regular mb-1 fw-bold sticky-top fs-1" href="../index.php" style="color: white; text-decoration: none;">CineBox</a> <a href="logout.php" class="btn btn-sm btn-outline-light outfit-regular rounded-0 fw-bold shadow-none oswald-regular my-2">Log Out</a>
    </div>


    <div class="col-lg-2 bg-light border-top border-3 border-secondary" id="dashboard-menu" style="min-height: 100vh;">
        <h5 class="text-dark text-center fw-bold fs-3 outfit-regular mt-2 p-2">Admin Panel</h5>
        <ul class="nav nav-pills flex-column">
            <li class="nav-item">
                <a class="nav-link active outfit-regular fs-6 fw-bold" href="dashboard.php">Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link outfit-regular fs-6 fw-bold" href="movies.php">Movies</a>
            </li>
            <li class="nav-item">
                <a class="nav-link outfit-regular fs-6 fw-bold" href="users.php">Users</a>
            </li>
        </ul>
    </div>

    <div class="container-fluid">
        <div class="col-lg-10 ms-auto">
            <h4 class="p-3 oswald-regular fw-bold fs-3">Dashboard</h4>
            <div class="row">
                <div class="col-md-4 col-sm-6">
                    <div class="card">
                        <div class="card-header outfit-regular fw-bold">
                            Users
                        </div>
                        <div class="card-body">
                            <h5 class="card-title outfit-regular fw-bold" style="color: #000"><?php echo $totalUser; ?></h5>
                            <p class="card-text">Total number of registered users.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="card">
                        <div class="card-header outfit-regular fw-bold ">
                            Movies
                        </div>
                        <div class="card-body">
                            <h5 class="card-title outfit-regular fw-bold" style="color: #000"><?php echo $movieCount; ?></h5>
                            <p class="card-text">Total number of movies.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="card">
                        <div class="card-header outfit-regular fw-bold">
                            Banned Users
                        </div>
                        <div class="card-body">
                            <h5 class="card-title outfit-regular fw-bold" style="color: #000"><?php echo $totalBan; ?></h5>
                            <p class="card-text">Total number of banned users.</p>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header outfit-regular fw-bold">
                            Recent Activity
                        </div>
                        <div class="card-body">
                            <ul class="list-group">
                                <li class="list-group-item outfit-regular fw-bold" style="color: #000">User John Doe registered.</li>
                                <li class="list-group-item outfit-regular fw-bold" style="color: #000">Movie "Inception" added.</li>
                                <li class="list-group-item outfit-regular fw-bold" style="color: #000">User Jane Smith updated profile.</li>
                                <li class="list-group-item outfit-regular fw-bold" style="color: #000">Movie "The Matrix" removed.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <?php include('inc/scripts.php'); ?>
</body>

</html>