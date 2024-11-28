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

<div class="container fluid">
    <div class="row">
        <?php
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
        ?>
                <div class="col-lg-2 col-md-4 mt-5 my-2">
                    <form action="details.php" method="get" style="border: none; margin: auto; height: 300px;">
                        <input type="hidden" name="movie_id" value="<?php echo htmlspecialchars($row['movie_id']); ?>">
                        <div class="card border-0 shadow" style="width: 200px; height: 300px; cursor: pointer;" onclick="this.closest('form').submit();">
                        <img src="<?php echo htmlspecialchars($row['poster']); ?>" class="card-img-top img-fluid" alt="<?php echo htmlspecialchars($row['title']); ?>" style="object-fit: cover;">                        </div>
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
<?php
include("footer.php");
?>