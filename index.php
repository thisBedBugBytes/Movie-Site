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
            
            $movie_id = $row['movie_id'];         
           
            $image = $row['poster'];             
            $rating = $row['rating'];            
            echo '<div class="swiper-slide">';
            echo '<img src="'.$image.'"/>';
            echo'</div>';
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