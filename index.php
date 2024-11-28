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

<?php
include("footer.php");
?>