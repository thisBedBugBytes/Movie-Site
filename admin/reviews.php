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



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reviews</title>
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
                <a class="nav-link outfit-regular fs-6 fw-bold" href="users.php">Users</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active outfit-regular fs-6 fw-bold" href="reviews.php">Reviews</a>
            </li>
        </ul>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h3 class="oswald-regular fw-bold fs-2">Reviews</h3>
                </div>
                <?php 
                $con = $GLOBALS['con'];
                $sql = "SELECT * FROM `diary` as d, `user` as u, movies as m WHERE d.`user_id` = u.`user_id` and d.`movie_id` = m.`movie_id` ORDER BY u.`user_id`;";
                $data = mysqli_query($con, $sql);
                if (!$data) echo "query failed";
                if (mysqli_num_rows($data) > 0) {
                ?>
                    <div class="table-responsive-md" style="height: 570px; overflow: auto;">
                        <table class="table table-hover table-dark table-striped" style="min-width: 600px;">
                            <thead class="sticky-top">
                                <tr>
                                    <th scope="col" width="7%">User ID</th>
                                    <th scope="col" width="15%">User Name</th>
                                    <th scope="col" width="1%">Film</th>
                                    <th scope="col" width="15%"></th>
                                    <th scope="col" width="25%">Review</th>
                                    <th scope="col" width="10%">Date</th>
                                    <th scope="col" width="5%">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php

                            while ($row = mysqli_fetch_assoc($data)) {
                                echo <<<query
                                    <tr>
                                    <td>$row[user_id]</td>
                                    <td>$row[name]</td>
                                    <td><img src="{$row['poster']}" alt="Poster" style="width: 50px; height: auto;"></td>
                                    <td>$row[title]</td>
                                    <td>$row[review]</td>
                                    <td>$row[log_time]</td>
                                    <td><button type="button" class="btn btn-danger deleteBtn">Delete</button></td>
                                    </tr>
                                    
                                   query;
                            }
                        } else {
                            echo '<h4 id="staticBackdropLabel" style="color: white;"> There are no reviews</h4>';
                        }
                            ?>
                            </tbody>
                        </table>
                    </div>

            </div>
            <div class="modal fade" id="delete-review" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 id="staticBackdropLabel" style="color: black;">Do you want to delete diary entry from the database?</h4>
                        </div>
                        <form id="review_form" method="POST" action="delete_review.php">

                            <input type="hidden" id="delete_review" name="deleteReview">

                            <div class="modal-footer">

                                <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="deleteData" class="btn btn-primary">Confirm</button>
                            </div>
                        </form>
                        <!-- here i need to use php to fetch the comments using post id -->
                    </div>
                </div>
            </div>

        </div>

        <?php include('inc/scripts.php'); ?>
        <script>
            $(document).ready(function() {
                $('.deleteBtn').on('click', function() {
                    $('#delete-review').modal('show');

                    $tr = $(this).closest('tr');
                    var data = $tr.children("td").map(function() {
                        return $(this).text();
                    }).get();
                    console.log(data);

                    $('#delete_review').val(data[0]);
                });
            });
        </script>
</body>

</html>