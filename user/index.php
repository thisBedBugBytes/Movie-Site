<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CineBox</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Oswald&family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@500&display=swap" rel="stylesheet">
/>
<style>

    .oswald-regular {
    font-family: "Oswald", sans-serif;
    font-optical-sizing: auto;
    font-weight: 400;
    font-style: normal;
    }
    .poppins-regular {
    font-family: "Poppins", serif;
    font-weight: 400;
    font-style: normal;
    }
   

    .outfit-regular{
    font-family: "Outfit", sans-serif;
    font-optical-sizing: auto;
    font-weight: 500;
    font-style: normal;
    }
    html,
        body {
        position: relative;
        height: 100%;
        }

        body {
        background: #151517;
        font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
        font-size: 14px;
        color: #000000;
        margin: 0;
        padding: 0;
        }

        .swiper {
        width: 100%;
        height: 100%;
        }

        .swiper-slide {
        text-align: center;
        font-size: 18px;
        background: #000000;
        display: flex;
        justify-content: center;
        align-items: center;
        width: 200px; 
        height: 300px; 
        }

        .swiper-slide img {
        display: block;
        width: 100%;
        height: 100%;
        object-fit: contain;
        }

</style>
</head>
<body>

<!--- Navigation Bar --->

<nav class="navbar navbar-expand-lg navbar-dark bg-dark px-lg-3 py-lg-3 shadow sm sticky top">
  <div class="container-fluid">
    <a class="navbar-brand me-10 fw-bold fs-1 oswald-regular " href="index.php">CineBox</a>
    <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active me-2" aria-current="page" href="signup.php">Create Account</a>
        </li>
        <li class="nav-item">
          <a class="nav-link me-2" href="login.php">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link me-2" href="#">Movies</a>
        </li>
        <li class="nav-item">
          <a class="nav-link me-2" href="#">Watchlist</a>
        </li>
        <li class="nav-item">
          <a class="nav-link me-2" href="#">About Us</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
        </li>
      </ul>
      <form class="d-flex">
  <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
  <button class="btn btn-outline-secondary shadow-none" type="submit">
    <i class="fas fa-search"></i> 
  </button>
</form>
    </div>
  </div>
</nav>


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
            <img src="imgsrc/lalaland.jpg" />
        </div>
        <div class="swiper-slide">
            <img src="imgsrc/smile.jpg"  />
        </div><div class="swiper-slide">
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script>
    var swiper = new Swiper(".swiper-container", {
      slidesPerView: 4,
      spaceBetween: 10,
      loop : true,
      autoplay:{
        delay : 2500,
        disableoninteraction : false,
      },
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
    });
</script>
</body>

</html>