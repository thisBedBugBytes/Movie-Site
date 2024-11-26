<?php
include("header.php");
include("navbar.php");
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
          
            $description = htmlspecialchars($row['description']);
            
            $movie_id = $row['movie_id'];         // Primary key, integer
           
            $image = $row['poster'];             // Poster image URL, varchar(255)
            $rating = $row['rating'];             // Rating, decimal(2,1)
            echo '<div class="swiper-slide">';
            echo '<img src="'.$image.'"/>';
            echo'</div>';
           }
            ?>
            <!--
            <div class="swiper-slide">
                <img src="https://m.media-amazon.com/images/M/MV5BNTc0YmQxMjEtODI5MC00NjFiLTlkMWUtOGQ5NjFmYWUyZGJhXkEyXkFqcGc@._V1_.jpg" />
            </div>
            <div class="swiper-slide">
                <img src="https://m.media-amazon.com/images/M/MV5BODI0OGRjYmEtNzFlNi00NTRlLTg3YTItM2ZkOGYyYTVhYjlkXkEyXkFqcGc@._V1_.jpg" />
            </div>
            <div class="swiper-slide">
                <img src="https://m.media-amazon.com/images/M/MV5BMzUzNDM2NzM2MV5BMl5BanBnXkFtZTgwNTM3NTg4OTE@._V1_.jpg" />
            </div>
            <div class="swiper-slide">
                <img src="https://upload.wikimedia.org/wikipedia/en/1/1e/Everything_Everywhere_All_at_Once.jpg" />
            </div>
            <div class="swiper-slide">
                <img src="https://upload.wikimedia.org/wikipedia/en/thumb/3/39/Jawan_film_poster.jpg/220px-Jawan_film_poster.jpg" />
            </div>
            <div class="swiper-slide">
                <img src="https://m.media-amazon.com/images/M/MV5BYjI3NDU0ZGYtYjA2YS00Y2RlLTgwZDAtYTE2YTM5ZjE1M2JlXkEyXkFqcGc@._V1_.jpg" />
            </div>
            <div class="swiper-slide">
                <img src="https://m.media-amazon.com/images/M/MV5BNDRjZmZhZTEtMzdlYi00MmE0LTgyZGMtZDc5ZWI0MjcxZTliXkEyXkFqcGc@._V1_.jpg" />
            </div>
        -->
        </div>
        <div class="swiper-pagination"></div>
    </div>
</div>

<h1 class="text-center me-10 py-4 px-3 fw-bold fs-1 oswald-regular" style="color:#3bb6d5; margin-bottom: 20px;">Catalog your cine journey!!!</h1>
<div class="container">
    <div style="display: flex; justify-content: center; margin-top: 20px;">
        <form action="user/signup.php" method="get">
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