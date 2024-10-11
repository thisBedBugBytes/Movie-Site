<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
   <?php require('C:\xampp\htdocs\hotelsys\inc\links.php');?>
</head>
<style>
     .footer-social{
    justify-content: center;
    align-items: center;
  }
    *{
    font-family: 'Poppins', sans-serif;
    font-color:white;
    
}
.h-font{
    font-family: 'Merienda', cursive;
    color: white;
}
      /* Chrome, Safari, Edge, Opera */
  input::-webkit-outer-spin-button,
  input::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
  }

  /* Firefox */
  input[type=number] {
    -moz-appearance: textfield;
  }

  body{
    background-color: black;
    color: white;
    justify-content: center;
  }
 

  
  .navbar:hover{
    color:pink;
  }
  .navbar-nav .nav-link{
    color:#fff;
  }
  .navbar-nav .nav-link:hover{
    color:pink;
  }
  .navbar-toggler-icon{
     background-image: url('data:image/svg+xml;charset=utf8,<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" stroke="white" stroke-width="2" class="bi bi-list" viewBox="0 0 16 16"><path d="M2 3.5A.5.5 0 0 1 2.5 3h11a.5.5 0 0 1 0 1H2.5A.5.5 0 0 1 2 3.5zm0 4a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1H2.5a.5.5 0 0 1-.5-.5zm0 4a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1H2.5a.5.5 0 0 1-.5-.5z"/></svg>');
      background-size: 1em 1em;
      background-color: black;
      border: 2px solid white; /* Outline color */
      border-radius: 4px; /* Optional */
  }
   
  
  /* Dropdown menu */
 
  .dropdown-menu {
      background-color: black;
  }

  .dropdown-item {
      color: white;
  }

  .dropdown-item:hover {
      background-color: #333; /* Darker shade for hover */
      color: white;
  }
/* Footer-social*/
  a .s-icon{
    color:white;
  }
  a .bi-facebook:hover{
    color: #1877F2;
  }
  a .bi-instagram:hover{
    background: linear-gradient(90deg,	#C13584, #ffff00); /* Gradient from pink to yellow */
  -webkit-background-clip: text; /* Ensures background gradient is applied only to text */
  -webkit-text-fill-color: transparent; /* Makes the icon itself transparent so gradient is visible */
  }
  a .bi-twitter:hover{
    color: gray;
  }
  /*Foot-subscribe*/
  .footer-newsletter .mail{

border-radius: 10px;
background: white;
padding: 10px;

}
.footer-newsletter .btn{

  border-radius: 25px;
  background: white;
  padding: 10px;
  width: 120px;
  height: 35px;
  text-align: center;
  line-height:17px;
}

</style>
<body>  
    <br><br><br><br>
    <br><br><br><br>
    <br><br><br><br>
<div class="container-fluid footer pt-5 pb-5">
  <div class="row">
    <div class="col-4">
    <div class="footer-social">
      <div class="row"> <h5>Follow Us</h5>
      </div> 
      <div class="row">
        <div class="col-md-2">
        <a href="#"><i class="bi bi-facebook s-icon"></i></a>
    </div>
    <div class="col-md-2">
    <a href="#"><i class="bi bi-instagram s-icon"></i></a>
    </div>
    <div class="col-md-2">
    <a href="#"><i class="bi bi-twitter s-icon"></i></a>
    </div>
    </div>
    </div>
    </div>
    <div class="col-4">
    <div class="footer-newsletter">
  <h5>Subscribe to our Newsletter</h5>
  <form>
    <input class="mail" type="email" class="me-lg-3 me-2" placeholder="Enter your email">
    <button class="btn mt-2 me-lg-3 me-2 shadow-none" type="submit">Subscribe</button>
  </form>
</div>
    </div>
 
  </div>
</div>
 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>