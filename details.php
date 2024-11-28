<?php
include("navbar.php");
include('admin/inc/essentials.php');
include('admin/inc/db_config.php');
include('admin/inc/links.php');
include('admin/inc/scripts.php');
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Details</title>
    <style>
        .profile-page {
            max-width: 900px;
            margin: auto;
            background: #444;
            /* Darker background for the profile card */
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
            color: white;
            /* White text color */
            display: flex;
            /* Use flexbox for layout */
        }

        .info {
            flex: 2;
            /* Allow info section to take more space */
            margin-right: 20px;
            /* Space between info and poster */
        }

        .movie-poster img {
            width: 250px;
            /* Set a larger width for the poster */
            height: auto;
            /* Maintain aspect ratio */
            border-radius: 8px;
        }

        h1 {
            font-size: 2em;
            margin-bottom: 10px;
        }

        .info strong {
            display: inline-block;
            width: 100px;
            /* Fixed width for labels */
        }

        .reviews {
            margin-top: 20px;
            /* Space above reviews */
            display: flex;
            /* Use flexbox for alignment */
            flex-direction: column;
            /* Stack review cards vertically */
            align-items: flex-end;
            /* Align cards to the right */
        }

        .review-card {
            background: linear-gradient(135deg, #7d7d7d, #f3e03b);
            /* Grey-yellow gradient */
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.5);
            color: black;
            /* Black text color for reviews */
            width: 300px;
            /* Fixed width for review cards */
        }

        .review-card h3 {
            margin: 0 0 10px 0;
            /* Margin for review title */
            font-size: 1.2em;
        }

        .review-card p {
            margin: 0;
            /* Remove margin for paragraph */
        }
    </style>
</head>

<?php
#session_start();

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $movie_id = $_GET['movie_id'];
    $user_id = $_SESSION['userID'];
    $sql = "SELECT * from movies where movie_id = '$movie_id';";
    $result = mysqli_query($con, $sql);
    $sql2 = "SELECT m.movie_id as movie_id, title, director, genre, poster, duration_min, description, review, m.rating as rating , release_date, user_id, genre  FROM movies as m LEFT JOIN diary as d on m.movie_id=d.movie_id where m.movie_id = '$movie_id';";
    $result2 = mysqli_query($con, $sql2);
}


?>
?>

<body>
    <div class="container-fluid">
        <div class="row">
            <?php
            if (mysqli_num_rows($result) > 0)
                $row = mysqli_fetch_assoc($result);
            $watchlistadd = false;

            ?>
            <div class="col-lg-12 ms-auto p-3 overflow-hidden">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div style="max-width: 850px; height:auto; margin: auto; background: rgba(255,255,255, 0.1); padding: 35px;  color: white; display: flex;">

                        <div style="flex: 2; margin-right: 20px;">
                            <h1 style="font-size: 3em; margin-bottom: 10px;"><?php echo htmlspecialchars($row['title']); ?></h1>
                            <div style="margin-bottom: 15px;">
                                <strong style="font-size: 1.0em; display: inline-block; width: 110px;">Release Date:</strong> <?php echo htmlspecialchars($row['release_date']); ?>
                            </div>
                            <div style="margin-bottom: 15px;">
                                <strong style="display: inline-block; width: 110px;">Genre:</strong><?php echo htmlspecialchars($row['genre']); ?>
                            </div>
                            <div style="margin-bottom: 15px;">
                                <strong style="display: inline-block; width: 110px;">Runtime:</strong><?php echo htmlspecialchars($row['duration_min']); ?> min
                            </div>
                            <div style="margin-bottom: 15px;">
                                <strong style="display: inline-block; width: 110px;">Director:</strong><?php echo htmlspecialchars($row['director']); ?>
                            </div>
                            <div style="margin-bottom: 15px;">
                                <strong style="display: inline-block; width: 110px;">Rating:</strong><span style="font-size: 0.8rem; margin-left: 0px;">
                                    <?php
                                    $movie_id = $row['movie_id'];
                                    $rating = $row['rating'];
                                    $fullStars = floor($rating);
                                    $halfStar = ($rating - $fullStars) >= 0.5;

                                    for ($i = 0; $i < $fullStars; $i++) {
                                        echo '<i class="bi bi-star-fill"></i>';
                                    }

                                    if ($halfStar) {
                                        echo '<i class="bi bi-star-half"></i>';
                                    }

                                    for ($i = $fullStars + ($halfStar ? 1 : 0); $i < 5; $i++) {
                                        echo '<i class="bi bi-star"></i>';
                                    }
                                    ?>
                                </span>
                            </div>
                            <div style="margin-bottom: 15px;">
                                <strong style="display: inline-block; width: 100px;">Description:</strong>
                                <p style="margin: 0;"><?php echo htmlspecialchars($row['description']); ?></p>
                            </div>
                            <form action="movies.php" method="POST">
                                <button type="submit" name="movie_id" value="<?php echo $movie_id; ?>"
                                    class="btn btn-sm d-flex justify-content-center align-items-center"
                                    style="background-color:#F4CE14; height: 40px; color: black; border-radius: 5px; padding: 20px 20px; font-weight: bold; text-align: center; display: inline-block;"
                                    onmouseover="this.style.backgroundColor='#BA4323'; this.style.color='white';"
                                    onmouseout="this.style.backgroundColor='#F4CE14'; this.style.color='black';">
                                    Add to Diary
                                </button>
                            </form>
                        </div>

                        <div>
                            <img src=<?php echo htmlspecialchars($row['poster']); ?> alt="<?php echo htmlspecialchars($row['title']); ?>" style="width: 250px; height: auto; border-radius: 8px;">
                        </div>
                    </div>

                    <div class="oswald-regular" style="max-width: 900px; margin: auto; margin-top: 20px; color: white; display: flex; flex-direction: column;">
                        <h2 class="oswald-regular">Reviews</h2>
                        <ul class="list-group list-group-flush" style="width: 500px;">
                            <?php
                            if (mysqli_num_rows($result2) > 0) {
                                while ($row2 = mysqli_fetch_assoc($result2)) {
                            ?>
                                    <li class="list-group-item" style="background-color: #151517; color: white; border-color: white;">
                                        <blockquote style="font-style: italic; margin: 0;">
                                            &ldquo;<?php echo htmlspecialchars($row2['review']); ?>&rdquo;
                                        </blockquote>
                                    </li> 
                                    <?php
                                        }
                                    }
                                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>

</html>