<?php
include("header.php");
include("navbar.php");
include('admin/inc/essentials.php');
include('admin/inc/db_config.php');
include('admin/inc/links.php');

session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_SESSION['userLogin']) && $_SESSION['userLogin'] == true) {
        $movie_id = $_POST['movie_id'];
        $user_id = $_SESSION['userID'];
        $sql = "INSERT INTO `watchlist` (`movie_id`, `user_id`) VALUES ('$movie_id','$user_id')";
        $sql_run = mysqli_query($con, $sql);
        if ($sql_run) {
            redirect('movies.php');
        }
    } else redirect("login.php");
}

?>
<style>
    .navbar {
        padding: 200rem 7rem;
    }

    .navbar-nav .nav-item .nav-link {
        padding: 0.5rem .8rem;
    }

    .dropdown-menu {
        min-width: 120px;
        background-color: rgba(200, 200, 200, 0.9);
        border: none;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    .dropdown-item {
        padding: 0.5rem 1rem;
    }

    .dropdown-item:hover {
        background-color: #f0f0f0;
    }

    .card {
        width: 200px;
        height: 300px;
        margin: auto;
    }

    .card-img-top {
        height: 150px;
        object-fit: cover;
    }
</style>

<nav class="navbar navbar-expand-lg navbar-light py-2">
    <div class="container-fluid">
        <a class="navbar-brand outfit-regular" style="color:#E5E4E2" href="movies.php">Movies</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle outfit-regular" href="#" id="genreDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color:#E5E4E2">
                        <u>Genre</u>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="genreDropdown">
                        <li><a class="dropdown-item outfit-regular" href="#">Action</a></li>
                        <li><a class="dropdown-item outfit-regular" href="#">Animation</a></li>
                        <li><a class="dropdown-item outfit-regular" href="#">Comedy</a></li>
                        <li><a class="dropdown-item outfit-regular" href="#">Drama</a></li>
                        <li><a class="dropdown-item outfit-regular" href="#">Horror</a></li>
                        <li><a class="dropdown-item outfit-regular" href="#">Mystery</a></li>
                        <li><a class="dropdown-item outfit-regular" href="#">Romance</a></li>
                        <li><a class="dropdown-item outfit-regular" href="#">Sci-Fi</a></li>
                        <li><a class="dropdown-item outfit-regular" href="#">Thriller</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle outfit-regular" href="#" id="yearDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color:#E5E4E2">
                        <u>Year</u>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="yearDropdown">
                        <li><a class="dropdown-item outfit-regular" href="#">2024</a></li>
                        <li><a class="dropdown-item outfit-regular" href="#">2023</a></li>
                        <li><a class="dropdown-item outfit-regular" href="#">2022</a></li>
                        <li><a class="dropdown-item outfit-regular" href="#">2021</a></li>
                        <li><a class="dropdown-item outfit-regular" href="#">2020</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle outfit-regular" href="#" id="runtimeDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color:#E5E4E2">
                        <u>Runtime</u>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="runtimeDropdown">
                        <li><a class="dropdown-item outfit-regular" href="#">Under 90 minutes</a></li>
                        <li><a class="dropdown-item outfit-regular" href="#">90 - 120 minutes</a></li>
                        <li><a class=" dropdown-item outfit-regular" href="#">Over 120 minutes</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<?php
$user_id = $_SESSION['userID'];
$sql = "SELECT m.movie_id as movie_id, title, director, genre, poster, duration_min, release_date, user_id, genre , rating FROM movies as m LEFT JOIN watchlist as w on m.movie_id=w.movie_id;";
$result = mysqli_query($con, $sql);

?>

<div class="container">
    <div class="row">
        <?php
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $watchlistadd = false;

        ?>
                <div class="col-lg-3 col-md-4 my-2 ">
                    <div class="card border-0 shadow" style="width:107%; margin:auto; height: 430px;">
                        <img src="<?php echo htmlspecialchars($row['poster']); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($row['title']); ?>" style="height: 150px; object-fit: cover;">
                        <div class="card-body bg-dark text-white outfit-regular" style="padding: 0.5rem;">
                            <h5 class="card-title" style="font-size: 1.2rem;"><?php echo htmlspecialchars($row['title']); ?></h5>
                            <h6 class="card-title" style="font-size: .8rem;">Directed By: <?php echo htmlspecialchars($row['director']); ?></h6>
                            <h6 class="card-title" style="font-size: .8rem;">
                                <i class="bi bi-clock" style="margin-right: 5px;"></i>
                                <?php echo htmlspecialchars($row['duration_min']); ?> minutes
                            </h6>
                            <ul class="list-group list-group-flush bg-dark text-white" style="padding: 0.2rem;">
                            <li class="list-group-item bg-dark text-white outfit-regular" style="padding: 0.3rem;">Release: <?php echo htmlspecialchars($row['release_date']); ?></li>
                            <li class="list-group-item bg-dark text-white outfit-regular" style="padding: 0.3rem;">Genre: <?php echo htmlspecialchars($row['genre']); ?></li>
                            <li class="list-group-item bg-dark text-white outfit-regular" style="padding: 0.3rem;">Rating: <?php echo htmlspecialchars($row['rating']); ?></li>
                            <span style="font-size: 0.8rem; margin-left: 5px;">
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
                        </ul>
                        <div class="mt-auto d-flex justify-content-evenly">
                            <?php if ($row['user_id'] == $user_id && $user_id != NULL): ?>
                                <a href="#" class="btn btn-sm d-flex justify-content-center align-items-center" style="background-color: white; height: 40px ; color: black; border-radius: 5px; padding: 2px 2px; font-weight: bold; text-align: center; margin-top : 10px; display: inline-block;">Already Added</a>
                                <form action="details.php" method="GET">
                                    <button type="submit" name="movie_id" value="<?php echo $movie_id; ?>"
                                        class="btn btn-sm d-flex justify-content-center align-items-center"
                                        style="background-color:#F4CE14; height: 40px; color: black; border-radius: 5px; padding: 5px 5px; font-weight: bold; text-align: center; margin-top : 10px; margin-left: 8px;"
                                        onmouseover="this.style.backgroundColor='#BA4323'; this.style.color='white';"
                                        onmouseout="this.style.backgroundColor='#F4CE14'; this.style.color='black';">
                                        Details
                                    </button>
                                </form>
                            <?php else: ?>
                                <form action="movies.php" method="POST">
                                    <button type="submit" name="movie_id" value="<?php echo $movie_id; ?>"
                                        class="btn btn-sm d-flex justify-content-center align-items-center"
                                        style="background-color:#F4CE14; height: 40px; color: black; border-radius: 5px; padding: 2px 2px; font-weight: bold; text-align: center;margin-top : 10px; display: inline-block;"
                                        onmouseover="this.style.backgroundColor='#BA4323'; this.style.color='white';"
                                        onmouseout="this.style.backgroundColor='#F4CE14'; this.style.color='black';">
                                        Add to Watchlist
                                    </button>
                                </form>
                                <form action="details.php" method="GET">
                                    <button type="submit" name="movie_id" value="<?php echo $movie_id; ?>"
                                        class="btn btn-sm d-flex justify-content-center align-items-center"
                                        style="background-color:#F4CE14; height: 40px; color: black; border-radius: 5px; padding: 5px 5px; font-weight: bold; text-align: center; margin-top : 10px; margin-left: 8px;"
                                        onmouseover="this.style.backgroundColor='#BA4323'; this.style.color='white';"
                                        onmouseout="this.style.backgroundColor='#F4CE14'; this.style.color='black';">
                                        Details
                                    </button>
                                </form>
                            <?php endif; ?>
                        </div>
                        </div>
                        

                    </div>
                </div>
        <?php
            }
        } else {
            echo "<p>No movies found.</p>";
        }
        ?>
    </div>
</div>

<?php include("footer.php"); ?>