
<head>
<?php require('links.php');?>
<style> 


   

  .modal-content {
  background-color: black; /* Sets the background color of the modal */
  color: white; /* Sets the text color inside the modal */
}
.modal-header {
  background-color: #333; /* Sets the background color of the modal */
  color: white; /* Sets the text color inside the modal */
}
.modal-body {
  background-color: black; /* Sets the background color of the modal */
  color: white; /* Sets the text color inside the modal */
}
.modal-footer {
  background-color: #333; /* Sets the background color of the modal */
  color: white; /* Sets the text color inside the modal */
}
.btn-close{
  filter.invert(1);
}
</style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-white bg-dark px-lg-3 py-lg-2 shadow-sm sticky-top <?php echo (basename($_SERVER['PHP_SELF']) == 'C:\xampp\htdocs\hotelsys\movie\movie.php') ? 'transparent' : ''; ?>">

    <div class="container-fluid">
        <a class="navbar-brand me-5 fw-bold fs-3 h-font" href="index.php">Movies</a>
        <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
            <a class="nav-link active active me-2" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item dropdown">
        <a class="nav-link" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Movies</a>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Comedy</a></li>
            <li><a class="dropdown-item" href="#">Horror/Thriller</a></li>
            <li><a class="dropdown-item" href="#">Drama</a></li>
            <li><hr class="dropdown-divider"></li>
            <!--  <li><a class="dropdown-item" href="#">Separated link</a></li>-->
        </ul>
        </li>
        <li class="nav-item dropdown">
        <a class="nav-link" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">TV Shows</a>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Comedy</a></li>
            <li><a class="dropdown-item" href="#">Horror/Thriller</a></li>
            <li><a class="dropdown-item" href="#">Docuseries</a></li>
            <li><hr class="dropdown-divider"></li>
        <!--  <li><a class="dropdown-item" href="#">Separated link</a></li>-->
        </ul>
        </li>
            <li class="nav-item">
            <a class="nav-link active me-2" href="#">Contact us</a>
            </li>
            <li class="nav-item">
            <a class="nav-link active me-2" href="#">About us</a>
            </li>
        </ul>

        <form class="d-flex">
            <input class="form-control me-2 " type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-light me-5 pe-2" type="submit"><i class="bi bi-search-heart"></i></button>
        </form>

        <div class="d-flex">
        
        <button type="button" class="btn btn-outline-light shadow-none mt-md-3 me-lg-3 me-2" data-bs-toggle="modal" data-bs-target="#loginModal">
        Login
    </button>
    <button type="button" class="btn btn-outline-light shadow-none mt-md-3 me-lg-3 me-2" data-bs-toggle="modal" data-bs-target="#registerModal">
        Register
    </button>
        </div>
        </div>
    </div>
    </nav>
    

    <div class="modal fade" id="loginModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form actions="">
            <div class="modal-header">
                <h5 class="modal-title d-flex align-items-center"><i class="bi bi-person-circle fs-3 me-2"></i>
                User Login</h5>
                <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label  class="form-label">Email address</label>
                    <input type="email" class="form-control shadow-none" aria-describedby="emailHelp">
                </div>

                <div class="mb-4">
                    <label  class="form-label">Password</label>
                    <input type="password" class="form-control shadow-none">
                </div>
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <button type="submit" class="btn btn-outline-dark shadow-none">LOGIN</button>
                    <a href="javascript: void(0)" class="text-secondary text-decoration-none">Forgot Password</a>
                </div>
            </div>
            </form>
            </div>
        </div>
        </div>


        <div class="modal fade" id="registerModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog  modal-lg">
            <div class="modal-content">
            <form actions="">
            <div class="modal-header">
                    <h5 class="modal-title d-flex align-items-center"><i class="bi bi-person-lines-fill fs-3 me-2"></i>
                    User Registration</h5>
                    <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <span class="badge rounded-pill bg-light text-dark mb-3 text-wrap lh-base">
                Note: Your details must match with your ID(NID card, Passport, Driving Liscense etc.)
                that will be required during check-in
                </span>
            <div class="container-fluid">
                <div class="row">
                <div class="col-md-6 ps-0 mb-3">
                <label  class="form-label">Name</label>
                    <input type="text" class="form-control shadow-none" >
                </div>
                <div class="col-md-6 p-0">
                    <label  class="form-label">Email address</label>
                    <input type="email" class="form-control shadow-none" aria-describedby="emailHelp">
                </div>
                <div class="col-md-6 ps-0 mb-3">
                    <label  class="form-label">Phone Number</label>
                    <input type="number" class="form-control shadow-none" >
                </div>
                <div class="col-md-6 p-0 mb-3">
                    <label  class="form-label">Picture</label>
                    <input type="file" class="form-control shadow-none" aria-describedby="emailHelp">
                </div>
                <div class="col-md-12 p-0 mb-3">
                    <label  class="form-label">Address</label>
                    <textarea class="form-control shadow-none"  rows="1"></textarea>
                </div>
                    <div class="col-md-6 ps-0 mb-3">
                <label  class="form-label">Phone Pincode</label>
                <input type="number" class="form-control shadow-none" >
                </div>
                <div class="col-md-6 p-0 mb-3">
                    <label  class="form-label">Date of Birth</label>
                    <input type="date" class="form-control shadow-none" aria-describedby="emailHelp">
                </div>
                <div class="col-md-6 ps-0 mb-3">
                <label  class="form-label">Password</label>
                <input type="password" class="form-control shadow-none" >
                </div>
                <div class="col-md-6 p-0 mb-3">
                    <label  class="form-label">Confirm Password</label>
                    <input type="password" class="form-control shadow-none" aria-describedby="emailHelp">
                </div>
                
            </div>
            <!-- <div class="mb-3">
                    <label  class="form-label">Email address</label>
                    <input type="email" class="form-control shadow-none" aria-describedby="emailHelp">
                </div>

                <div class="mb-4">
                    <label  class="form-label">Password</label>
                    <input type="password" class="form-control shadow-none">
                </div>
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <button type="submit" class="btn btn-outline-dark shadow-none">REGISTER</button>
                    <a href="javascript: void(0)" class="text-secondary text-decoration-none">Forgot Password</a>
                </div>-->
            </div>
        </div>
            </form>
            </div>
        </div>
        </div>

      
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    </body>