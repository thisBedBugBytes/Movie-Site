<?php
include('navbar.php');
include('admin/inc/db_config.php');
include('admin/inc/essentials.php');
include('admin/inc/links.php');
include('admin/inc/scripts.php');

session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movies</title>

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
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-12 p-4 overflow-hidden">
                <div class="mb-2">
                    <h3 class="oswald-regular fw-bold fs-2">My Diary</h3>
                </div>
                <div class="table-responsive-md" style="height: auto; overflow: auto;">
                    <table class="table table-hover table-dark table-striped" style="min-width: 600px;">
                        <thead class="sticky-top">
                            <tr>
                                <th scope="col" width="5%">Year</th>
                                <th scope="col" width="5%">Month</th>
                                <th scope="col" width="7%">Day</th>
                                <th scope="col" width="1%">Film</th>
                                <th scope="col" width="15%"></th>
                                <th scope="col" width="10%">Released</th>
                                <th scope="col" width="10%">Rating</th>
                                <th scope="col" width="25%">Review</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $user_id = $_SESSION['userID'];
                            $sql = "SELECT d.movie_id as movie_id, m.title,YEAR(m.release_date) as released,m.poster,DAY(d.log_time) as log_day,MONTH(d.log_time) as log_month,YEAR(d.log_time) as log_year,d.log_time, d.rating as rating, d.review FROM movies as m JOIN diary as d ON m.movie_id = d.movie_id where user_id = '$user_id' ORDER BY d.log_time desc ";
                            $data = mysqli_query($con, $sql);
                            $lastYear = null;
                            $lastMonth = null;


                            while ($row = mysqli_fetch_assoc($data)) {
                                

                                if ($row['log_year'] == $lastYear) {
                                    $yearCell = '';
                                } else {
                                    $yearCell = $row['log_year']; 
                                    $lastYear = $row['log_year']; 
                                }
                                if ($row['log_month'] == $lastMonth) {
                                    $monthCell = '';
                                } else {
                                    $monthCell = $row['log_month']; 
                                    $lastMonth = $row['log_month']; 
                                }


                                $rating = $row['rating'];
                                $fullStars = floor($rating);
                                $halfStar = ($rating - $fullStars) >= 0.5;
                                $starOutput = '';
                                for ($i = 0; $i < $fullStars; $i++) {
                                    $starOutput .= '★'; 
                                }
                                if ($halfStar) {
                                    $starOutput .= '☆'; 
                                }
                                for ($i = 0; $i < (5 - ceil($rating)); $i++) {
                                    $starOutput .= '☆';
                                }
                                
                                echo <<<query
                                <tr>
                                <td>$yearCell</td>
                                <td>$monthCell</td>
                                <td>$row[log_day]</td>
                                <td><img src="{$row['poster']}" alt="Poster" style="width: 50px; height: auto;"></td>
                                <td>$row[title]</td>
                                <td>$row[released]</td>
                                <td>$starOutput</td>
                                <td>$row[review]</td>
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
</body>

</html>