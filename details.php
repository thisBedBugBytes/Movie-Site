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
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
            color: white;
            display: flex;
        }

        .info {
            flex: 2;
            margin-right: 20px;
        }

        .movie-poster img {
            width: 250px;
            height: auto;
            border-radius: 8px;
        }

        h1 {
            font-size: 2em;
            margin-bottom: 10px;
        }

        .info strong {
            display: inline-block;
            width: 100px;
        }

        .reviews {
            margin-top: 20px;
            display: flex;
            flex-direction: column;
            align-items: flex-end;
        }

        .review-card {
            background: linear-gradient(135deg, #7d7d7d, #f3e03b);
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.5);
            color: black;
            width: 300px;
        }

        .review-card h3 {
            margin: 0 0 10px 0;
            font-size: 1.2em;
        }

        .review-card p {
            margin: 0;
        }

        .modal-content {
            background-color: #343a40;
        }

        .rating {
            display: flex;
            justify-content: space-between;
            width: 100%;
        }

        .rating input {
            display: none;
        }

        .rating input+label {
            cursor: pointer;
            color: #FFD700;
            font-size: 2rem;
        }

        .rating input:checked+label~label {
            color: white;
        }

        .rating label :active {
            transform: scale(0.8);
        }

        .rating label:hover {
            content: '\2605';
        }

        .rating label:hover~label:before {
            content: '\2606';
        }
    </style>
</head>

<?php
session_start();
if (isset($_GET['movie_id'])) {
    $_SESSION['movie_id'] = $_GET['movie_id'];
}

if (isset($_POST['add_diary'])) {
    if (isset($_SESSION['userLogin']) && $_SESSION['userLogin'] == true) {
        $review = $_POST['review'];
        $rating = $_POST['rating'];
        $user_id = $_SESSION['userID'];
        $movie_id = $_SESSION['movie_id'];

        $sql = "INSERT INTO  `diary` (`movie_id`, `user_id`, `review`, `rating`) VALUES ('$movie_id', '$user_id', '$review', $rating)";
        $sql_run = mysqli_query($con, $sql);
        if ($sql_run) {
            echo "<script>alert('Added to your diary:D');</script>";
            redirect('details.php');
        }
    } else {
        redirect('login.php');
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'GET' || isset($_SESSION['movie_id'])) {
    $movie_id = $_SESSION['movie_id'];
    $_SESSION['movie_id'] = $movie_id;
    $user_id = $_SESSION['userID'];
    $sql = "SELECT * from movies where movie_id = '$movie_id';";
    $result = mysqli_query($con, $sql);
    $sql2 = "SELECT m.movie_id as movie_id, title, director, genre, poster, duration_min, description, review, m.rating as rating , release_date, user_id, genre  FROM movies as m LEFT JOIN diary as d on m.movie_id=d.movie_id where m.movie_id = '$movie_id' and user_id = '$user_id';";
    $result2 = mysqli_query($con, $sql2);
    $isInDiary = mysqli_num_rows($result2) > 0;
}


?>
?>

<body>
    <div class="container-fluid">
        <div class="row">
            <?php
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
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
                                <?php if ($isInDiary): ?>
                                    <a href="#" class="btn btn-sm d-flex justify-content-center align-items-center" style="background-color: white; height: 40px; color: black; border-radius: 5px; padding: 5px 10px; font-weight: bold; text-align: center; margin-top: 10px; display: inline-block;">Already Added to Diary</a>
                                <?php else: ?>
                                    <button type="button"
                                        data-bs-toggle="modal" data-bs-target="#add-diary"
                                        class="btn btn-sm d-flex justify-content-center align-items-center" style="background-color: #F4CE14; height: 40px; color: black; border-radius: 5px; padding: 5px 10px; font-weight: bold; text-align: center; margin-top: 10px; display: inline-block;"
                                        onmouseover="this.style.backgroundColor='#BA4323'; this.style.color='white';"
                                        onmouseout="this.style.backgroundColor='#F4CE14'; this.style.color='black';">
                                        Add to Diary
                                    </button>
                                <?php endif; ?>

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
                </div> <?php } ?>
            <div class="modal fade" id="add-diary" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel" style="color: white;">Add to Diary</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form id="add_diary" method="POST" action="details.php">
                            <div class="modal-body" style="color: white;">
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Review</label>
                                    <input type="text" class="form-control" id="review" name="review" required>
                                </div>

                                <label class="form-label fw-bold">Rating</label>
                                <div class="mb-3 rating">
                                    <div class="star-icon">
                                        <input type="radio" id="star1" name="rating" value="1" required />
                                        <label for="star1" title="1 stars" class="fa fa-star"></label>

                                        <input type="radio" id="star2" name="rating" value="2" />
                                        <label for="star2" title="2 stars" class="fa fa-star"></label>

                                        <input type="radio" id="star3" name="rating" value="3" />
                                        <label for="star3" title="3 stars" class="fa fa-star"></label>

                                        <input type="radio" id="star4" name="rating" value="4" />
                                        <label for="star4" title="4 stars" class="fa fa-star"></label>

                                        <input type="radio" id="star5" name="rating" value="5" />
                                        <label for="star5" title="5 star" class="fa fa-star"></label>
                                    </div>
                                </div>
                                <input type="hidden" name="movie_id" value=<?php echo htmlspecialchars($row['movie_id']); ?>>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" name="add_diary" class="btn btn-primary fw-bold" style="background-color: #F4CE14;" onmouseover="this.style.backgroundColor='#BA4323'; this.style.color='white';"
                                    onmouseout="this.style.backgroundColor='#F4CE14'; this.style.color='black';">Add</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>