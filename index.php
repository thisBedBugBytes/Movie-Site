<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel</title>
  
    <?php require('./inc/links.php');?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
  

<style>
  

/* Carousal */

.swiper-slide img {
      display: block;
      width: 100%;
      height: %;
      object-fit: cover;
    }


</style>
</head>
<body>
    <?php require('inc/header.php');?>

    <!--carousel-->
    <div class="container-fluid px-lg-4 mt-4 mb-3">
        <h2 class="mb-lg-3 mb-2">Movies we've liked</h2>
        <div class="swiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <img src="images/it.jpg" class="w-100 d-block">
                </div>
                <div class="swiper-slide">
                    <img src="images/Avengers.jpg" class="w-100 d-block">
                </div>
                <div class="swiper-slide">
                    <img src="images/TLB.jpg" class="w-100 d-block">
                </div>
                <div class="swiper-slide">
                    <img src="images/IML.jpg" class="w-100 d-block">
                </div>
                <div class="swiper-slide">
                    <img src="images/freshjpg.jpg" class="w-100 d-block">
                </div>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>

    <div class="container-fluid px-lg-4 mt-4">
        <h2 class="mb-lg-3 mb-2">Shows we've liked</h2>
        <div class="swiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <img src="images/GOT.jpg" class="w-100 d-block">
                </div>
                <div class="swiper-slide">
                    <img src="images/frdns.jpg" class="w-100 d-block">
                </div>
                <div class="swiper-slide">
                    <img src="images/BB.jpg" class="w-100 d-block">
                </div>
                <div class="swiper-slide">
                    <img src="images/YS.jpg" class="w-100 d-block">
                </div>
                <div class="swiper-slide">
                    <img src="images/succession.jpg" class="w-100 d-block">
                </div>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>

    <!-- Initialize Swiper -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper(".swiper", {
            slidesPerView: 3,
            spaceBetween: 30,
            freeMode: true,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
        });
    </script>
  
    <?php require('inc/footer.php')?>
</body>
</html>