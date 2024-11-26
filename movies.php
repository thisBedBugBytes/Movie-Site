<?php
include("header.php");
include("navbar.php");
include('admin/inc/essentials.php');
include('admin/inc/db_config.php');
include('admin/inc/links.php');
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
        width: 180px;
        /* Set a fixed width */
        height: 300px;
        /* Set a fixed height */
        margin: auto;
        /* Center the card */
    }

    .card-img-top {
        height: 150px;
        /* Set a fixed height for the image */
        object-fit: cover;
        /* Ensure the image covers the area */
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
                        <li><a class="dropdown-item outfit-regular" href="movies.php?Year=2024&Runtime=<?php echo $_GET['Runtime'] ?? ''; ?>">2024</a></li>
                        <li><a class="dropdown-item outfit-regular" href="movies.php?Year=2023&Runtime=<?php echo $_GET['Runtime'] ?? ''; ?>">2023</a></li>
                        <li><a class="dropdown-item outfit-regular" href="movies.php?Year=2022&Runtime=<?php echo $_GET['Runtime'] ?? ''; ?>">2022</a></li>
                        <li><a class="dropdown-item outfit-regular" href="movies.php?Year=2021&Runtime=<?php echo $_GET['Runtime'] ?? ''; ?>">2021</a></li>
                        <li><a class="dropdown-item outfit-regular" href="movies.php?Year=2020&Runtime=<?php echo $_GET['Runtime'] ?? ''; ?>">2020</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle outfit-regular" href="#" id="runtimeDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color:#E5E4E2">
                        <u>Runtime</u>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="runtimeDropdown">
                        <li><a class="dropdown-item outfit-regular" href="movies.php?Runtime=0&Year=<?php echo $_GET['Year'] ?? ''; ?>">Under 90 minutes</a></li>
                        <li><a class="dropdown-item outfit-regular" href="movies.php?Runtime=90&Year=<?php echo $_GET['Year'] ?? ''; ?>">90 - 120 minutes</a></li>
                        <li><a class=" dropdown-item outfit-regular" href="movies.php?Runtime=120&Year=<?php echo $_GET['Year'] ?? ''; ?>">Over 120 minutes</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<?php
$sql = "SELECT * FROM `movies` WHERE 1";


$year = isset($_GET['Year']) ? $_GET['Year'] : null;
if($year != null){
    $year = $_GET['Year'];
    $sql .= " AND YEAR(`release_date`) = $year";
}
$runtime = isset($_GET['Runtime']) ? $_GET['Runtime'] : '';
 if(isset($_GET['Runtime'])){
    $runtime = $_GET['Runtime'];
    if ($runtime == 0) {
        $mintime = 0;
        $maxtime = 90;
    } elseif ($runtime == 90) {
        $mintime = 90;
        $maxtime = 120;
    } elseif ($runtime == 120) {
        $mintime = 120;
        $maxtime = 1200;
    }
    
    echo $maxtime;
    echo $mintime;
    
$sql .= " AND `duration_min` in (SELECT `duration_min` FROM `movies` WHERE `duration_min` > $mintime AND `duration_min` < $maxtime)";
}


$sql .= ";";
$result = mysqli_query($con, $sql);
?>

<div class="container">
    <div class="row">
        <?php
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
        ?>
                <div class="col-lg-2 col-md-4 my-2">
                    <div class="card border-0 shadow" style="width: 200px; margin:auto; height: 460px;">
                        <img src="<?php echo htmlspecialchars($row['poster']); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($row['title']); ?>" style="height: 150px; object-fit: cover;">
                        <div class="card-body bg-dark text-white outfit-regular" style="padding: 0.5rem;">
                            <h5 class="card-title" style="font-size: 1.2rem;"><?php echo htmlspecialchars($row['title']); ?></h5>
                            <h6 class="card-title" style="font-size: .8rem;">Directed By: <?php echo htmlspecialchars($row['director']); ?></h6>
                            <h6 class="card-title" style="font-size: .8rem;">
                                <i class="bi bi-clock" style="margin-right: 5px;"></i>
                                <?php echo htmlspecialchars($row['duration_min']); ?> minutes
                            </h6>
                        </div>
                        <ul class="list-group list-group-flush bg-dark text-white" style="padding: 0.2rem;">
                            <li class="list-group-item bg-dark text-white outfit-regular" style="padding: 0.3rem;">Release: <?php echo htmlspecialchars($row['release_date']); ?></li>
                            <li class="list-group-item bg-dark text-white outfit-regular" style="padding: 0.3rem;">Genre: <?php echo htmlspecialchars($row['genre']); ?></li>
                            <li class="list-group-item bg-dark text-white outfit-regular" style="padding: 0.3rem;">Rating: <?php echo htmlspecialchars($row['rating']); ?></li>
                            <span style="font-size: 0.8rem; margin-left: 5px;">
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
                        </ul>
                        <div class="card-body bg-dark text-white outfit-regular" style="padding: 0.5rem;">
                            <div class="d-flex justify-content-evenly">
                                <a href="#" class="btn btn-sm btn-outline-light outfit-regular rounded-0 fw-bold shadow-none d-flex justify-content-center align-items-center" style="height: 45px;">Add to Watchlist</a>
                                <a href="#" class="btn btn-sm btn-outline-light outfit-regular rounded-0 fw-bold shadow-none d-flex justify-content-center align-items-center" style="height: 45px;">Details</a>
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
    </div
</div>
    <?php
    include("footer.php");
    ?>