<?php
include("header.php");
include("navbar.php");
include('admin/inc/links.php');
include('admin/inc/db_config.php');
?>

<!--- Carousel --->

<div class="container-fluid">
    <h2 class="text-left me-10 py-2 px-3 fw-bold fs-1 oswald-regular" style="color:#F4CE14">Most Watched This Week</h2>
    <div class="swiper swiper-container">
        <div class="swiper-wrapper">
            <?php
            $query = "SELECT * FROM `movies`  ORDER BY movie_id";

            $data = mysqli_query($con, $query);
            while ($row = mysqli_fetch_assoc($data)) {
            ?>
                <div class="swiper-slide">
                    <form action="details.php" method="get" style="border: none; margin: auto; height: 300px;">
                        <input type="hidden" name="movie_id" value="<?php echo htmlspecialchars($row['movie_id']); ?>">
                        <div class="card border-0 shadow" style="width: 200px; height: 300px; cursor: pointer;" onclick="this.closest('form').submit();">
                            <img src="<?php echo htmlspecialchars($row['poster']); ?>" class="card-img-top img-fluid" alt="<?php echo htmlspecialchars($row['title']); ?>" style="object-fit: cover;">
                        </div>
                    </form>
                </div>
            <?php
            }
            ?>
        </div>
        <div class="swiper-pagination"></div>
    </div>
</div>



<?php if (isset($_SESSION['userLogin']) && $_SESSION['userLogin'] == true): ?>
    <?php
    session_start();
    $id = $_SESSION['userID'];
    $sql = "SELECT * FROM `watchlist` as w join `movies` as m on w.movie_id=m.movie_id WHERE `user_id` = '$id'";
    $result = mysqli_query($con, $sql);
    ?>

    <div class="container fluid">
        <div class="row">
            <h4 class="outfit-regular mt-5 mb-1" style="color: white; font-style: italic;">Your Watchlist</h4>
            <?php
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
            ?>
                    <div class="col-lg-1 col-md-4 my-2">
                        <form action="details.php" method="get" style="border: none; margin: auto; height: 200px;">
                            <input type="hidden" name="movie_id" value="<?php echo htmlspecialchars($row['movie_id']); ?>">
                            <div class="card border-0 shadow" style="width: 100px; height: 150px; cursor: pointer;" onclick="this.closest('form').submit();">
                                <img src="<?php echo htmlspecialchars($row['poster']); ?>" class="card-img-top img-fluid" alt="<?php echo htmlspecialchars($row['title']); ?>" style="object-fit: cover; height: 100%; width: auto;">
                            </div>
                        </form>
                    </div>
            <?php
                }
            } else {
                echo "<h1 style='color: white;'>No movies found.</h1>";
            }
            ?>
        </div>
    </div>
<?php else: ?>
    <h1 class="text-center me-10 py-4 px-3 fw-bold fs-1 oswald-regular" style="color:#3bb6d5; margin-bottom: 20px;">Catalog your cine journey!!!</h1>
    <div class="container">
        <div style="display: flex; justify-content: center; margin-top: 20px;">
            <form>
                <button
                    class="btn btn-outline-secondary shadow-none text-center outfit-regular "
                    type="button"
                    data-bs-toggle="modal" data-bs-target="#create-account"
                    style="font-size: 20px; padding: 12px 30px; ">
                    Get Started Now
                </button>
            </form>
        </div>
    </div>
<?php endif; ?>



<?php
include("footer.php");
?>