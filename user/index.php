
<?php 
   include("header.php");
   include("navbar.php");
   ?>



<!--- Carousel --->

<div class="container-fluid">
    <h2 class="text-left me-10 py-2 px-3 fw-bold fs-1 oswald-regular" style= "color:#F4CE14">Most Watched This Week</h2>
    <div class="swiper swiper-container">
        <div class="swiper-wrapper">
    
        <div class="swiper-slide">
            <img src="imgsrc/joker.jpg" />
        </div>
        <div class="swiper-slide">
            <img src="imgsrc/stree2.jpg"  />
        </div>
        <div class="swiper-slide">
            <img src="imgsrc/smile.jpg"  />
        </div>
        <div class="swiper-slide">
            <img src="imgsrc/jawan.jpg" />
        </div>
        <div class="swiper-slide">
            <img src="imgsrc/everythingeverywhere.webp"  />
        </div>
        <div class="swiper-slide">
            <img src="imgsrc/endgame.jpg"  />
        </div>
        <div class="swiper-slide">
            <img src="imgsrc/barbie.jpg"  />
        </div>
        <div class="swiper-slide">
            <img src="imgsrc/insideout.jpg"  />
        </div>

        </div>
        <div class="swiper-pagination"></div>
    </div>
</div>

<h1 class="text-center me-10 py-4 px-3 fw-bold fs-1 oswald-regular" style="color:#3bb6d5; margin-bottom: 20px;">Catalog your cine journey!!!</h1>
<div class="container">
    <div style="display: flex; justify-content: center; margin-top: 20px;"> 
        <form action="signup.php" method="get">
            <button 
                class="btn btn-outline-secondary shadow-none text-center outfit-regular" 
                type="submit" 
                style="font-size: 20px; padding: 12px 30px; ">
                Get Started Now
            </button>
        </form>
    </div>
</div>

   <?php 
   include("footer.php");
   ?>