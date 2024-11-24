<?php
include("header.php");
include("navbar.php");
include('admin/inc/essentials.php');
include('admin/inc/db_config.php');
include('admin/inc/links.php');
include('admin/inc/scripts.php');
?>

<?php
session_start();
$id = $_SESSION['userID'];
$sql = "SELECT * FROM `watchlist` as w join `movies` as m on w.movie_id=m.movie_id WHERE `user_id` = '$id'";
$result = mysqli_query($con, $sql);
?>

<div class="container">
    <div class="row">
        <?php
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
        ?>
                <div class="col-lg-2 col-md-4 mt-5 my-2">
                    <div class="card border-0 shadow" style="width: 200px; margin:auto; height: 300px;">
                        <a href="details.php?id=<?php echo htmlspecialchars($row['movie_id']); ?>">
                            <img src="<?php echo htmlspecialchars($row['poster']); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($row['title']); ?>" style="width: 100%; height: auto; object-fit: cover;">
                        </a>
                    </div>
                </div>
        <?php
            }
        } else {
            echo "<h1 style='color: white;'>No movies found.</h1>";
        }
        ?>
    </div>
</div>
<?php
include("footer.php");
?>