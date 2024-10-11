<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php require('../inc/links.php');?>
    <style>

.image-container {
    position: relative;
    width: 100%;
    height: 100%;
    justify: centre;
    overflow: hidden;
}

.image-container img {
    width: 50%;
    display: block;
    margin-left: auto;
    margin-right: auto;
    object-fit: cover;
}

.image-container::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(to right, rgba(0, 0, 0, 0.5), transparent),
                linear-gradient(to top, rgba(0, 0, 0, 0.5), transparent);
    z-index: 1;
}

.grad1 img {
    -webkit-mask-image:-webkit-gradient(linear, left top, left bottom, from(rgba(0,0,0,1)), to(rgba(0,0,0,0)))
  }

  .card-body{
    background: black;
    flex: 1 1 auto; /* Let the card body take available space */
  }
  @media (max-width:571.9px){
    .poster {
                width: 100%; /* Ensure the image scales to the full width */
                
            }
    
    .poster img {
        /* Make sure the image covers its parent */
        width: 100%;
        height: auto; /* Maintain aspect ratio */
    }
}
   /* Center the entire card in md mode */
   @media (max-width: 991.98px) and (min-width: 574px){ /* md and below */
            .image-container {
                height: 50vh; /* Use full viewport height */
            }
            .card-body p {
                font-size: 9px; /* Reduce the font size */
            }
            .card-body h5{
                font-size:16px;
            }
            .poster {
                width: 100%; /* Ensure the image scales to the full width */
            }
            .card {
                position: absolute; /* Position card absolutely */
                top: 50%; /* Center vertically */
                left: 50%; /* Center horizontally */
                transform: translate(25%, -75%); /* Adjust for its own size */
                max-width: 100%; /* Max width for the card */
                width: 100%; /* Set width to keep it centered */
                z-index: 2; /* Ensure it’s above the background */
                border: 0;
                box-shadow: none;
                background-color: black;
              }
            
        }

        @media (min-width: 992px) { /* lg and above */
            .card {
                position: relative; /* Reset position */
                margin: 0; /* Reset margin for lg mode */
            }
        }
    </style>
</head>
<body>
    <?php require('C:\xampp\htdocs\hotelsys\inc\header.php')?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
     <div class="image-container grad1">
        <img src="../images/Avengers.jpg" alt="Fading Image" class="fade-img">
         </div>
     </div>
    <div class="col-lg-12 col-md-5 d-flex justify-content-center mt-4">
     <div class="card border-0 box-shadow-none col-md-8 col-sm-9" style="max-width: 540px;">
  <div class="row g-0 ">
    <div class="poster col-lg-4">
      <img src="../images/Avengers_post2.jpg" class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-lg-8">
      <div class="card-body" >
        <h5 class="card-title">The Avengers</h5>
        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
      </div>
     </div>
     </div>
    </div>
  </div>
  <div class="row" style =" height-20px;">

  </div>
        <br><br><br><br>
</div>
    </div>

    <?php require('C:\xampp\htdocs\hotelsys\inc\footer.php');?>
</body>

</html>