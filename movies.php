<?php
include("header.php");
include("navbar.php");
?>
<style>
    .navbar {
        padding: 200rem 7rem;
    }

    .navbar-nav .nav-item .nav-link {
        padding: 0.5rem .8rem;
    }

    .dropdown-menu {
        min-width: 120px;
        background-color: rgba(200, 200, 200, 0.9);
        border: none;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    .dropdown-item {
        padding: 0.5rem 1rem;
    }

    .dropdown-item:hover {
        background-color: #f0f0f0;
    }
</style>

<nav class="navbar navbar-expand-lg navbar-light py-2">
    <div class="container-fluid">
        <a class="navbar-brand outfit-regular" style="color:#E5E4E2" href="movies.php">Movies</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle outfit-regular" href="#" id="genreDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color:#E5E4E2">
                        <u>Genre</u>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="genreDropdown">
                        <li><a class="dropdown-item outfit-regular" href="#">Action</a></li>
                        <li><a class="dropdown-item outfit-regular" href="#">Animation</a></li>
                        <li><a class="dropdown-item outfit-regular" href="#">Comedy</a></li>
                        <li><a class="dropdown-item outfit-regular" href="#">Drama</a></li>
                        <li><a class="dropdown-item outfit-regular" href="#">Horror</a></li>
                        <li><a class="dropdown-item outfit-regular" href="#">Mystery</a></li>
                        <li><a class="dropdown-item outfit-regular" href="#">Romance</a></li>
                        <li><a class="dropdown-item outfit-regular" href="#">Sci-Fi</a></li>
                        <li><a class="dropdown-item outfit-regular" href="#">Thriller</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle outfit-regular" href="#" id="yearDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color:#E5E4E2">
                        <u>Year</u>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="yearDropdown">
                        <li><a class="dropdown-item outfit-regular" href="#">2024</a></li>
                        <li><a class="dropdown-item outfit-regular" href="#">2023</a></li>
                        <li><a class="dropdown-item outfit-regular" href="#">2022</a></li>
                        <li><a class="dropdown-item outfit-regular" href="#">2021</a></li>
                        <li><a class="dropdown-item outfit-regular" href="#">2020</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle outfit-regular" href="#" id="runtimeDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color:#E5E4E2">
                        <u>Runtime</u>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="runtimeDropdown">
                        <li><a class="dropdown-item outfit-regular" href="#">Under 90 minutes</a></li>
                        <li><a class="dropdown-item outfit-regular" href="#">90 - 120 minutes</a></li>
                        <li><a class=" dropdown-item outfit-regular" href="#">Over 120 minutes</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">
    <div class="row">
        <div class="col-lg-2 col-md-4 my-2">
            <div class="card border-0 shadow" style="max-width: 180px; margin:auto; height: 300px;">
                <img src="imgsrc/stree2.jpg" class="card-img-top" alt="..." style="height: 150px; object-fit: cover;">
                <div class="card-body bg-dark text-white outfit-regular" style="padding: 0.5rem;">
                    <h5 class="card-title" style="font-size: 1rem;">Stree 2</h5>
                    <h6 class="card-title" style="font-size: .8rem;">Directed By : Amar Kaushik</h6>
                </div>
                <ul class="list-group list-group-flush bg-dark text-white" style="padding: 0.2rem;">
                    <li class="list-group-item bg-dark text-white outfit-regular" style="padding: 0.3rem;">Release Date : </li>
                    <li class="list-group-item bg-dark text-white outfit-regular" style="padding: 0.3rem;">Genre : </li>
                    <li class="list-group-item bg-dark text-white outfit-regular" style="padding: 0.3rem;">Rating : </li>
                    <span style="font-size: 0.8rem; margin-left: 5px;">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                    </span>
                </ul>
                <div class="card-body bg-dark text-white outfit-regular" style="padding: 0.5rem;">
                    <div class="d-flex justify-content-evenly">
                        <a href="#" class="btn btn-sm btn-outline-light outfit-regular rounded-0 fw-bold shadow-none">Watchlist</a>
                        <a href="#" class="btn btn-sm btn-outline-light outfit-regular rounded-0 fw-bold shadow-none">Details</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-md-4 my-2">
            <div class="card border-0 shadow" style="max-width: 180px; margin:auto; height: 300px;">
                <img src="imgsrc/stree2.jpg" class="card-img-top" alt="..." style="height: 150px; object-fit: cover;">
                <div class="card-body bg-dark text-white outfit-regular" style="padding: 0.5rem;">
                    <h5 class="card-title" style="font-size: 1rem;">Stree 2</h5>
                    <h6 class="card-title" style="font-size: .8rem;">Directed By : Amar Kaushik</h6>
                </div>
                <ul class="list-group list-group-flush bg-dark text-white" style="padding: 0.2rem;">
                    <li class="list-group-item bg-dark text-white outfit-regular" style="padding: 0.3rem;">Release Date : </li>
                    <li class="list-group-item bg-dark text-white outfit-regular" style="padding: 0.3rem;">Genre : </li>
                    <li class="list-group-item bg-dark text-white outfit-regular" style="padding: 0.3rem;">Rating : </li>
                    <span style="font-size: 0.8rem; margin-left: 5px;">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                    </span>
                </ul>
                <div class="card-body bg-dark text-white outfit-regular" style="padding: 0.5rem;">
                    <div class="d-flex justify-content-evenly">
                        <a href="#" class="btn btn-sm btn-outline-light outfit-regular rounded-0 fw-bold shadow-none">Watchlist</a>
                        <a href="#" class="btn btn-sm btn-outline-light outfit-regular rounded-0 fw-bold shadow-none">Details</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-md-4 my-2">
            <div class="card border-0 shadow" style="max-width: 180px; margin:auto; height: 300px;">
                <img src="imgsrc/stree2.jpg" class="card-img-top" alt="..." style="height: 150px; object-fit: cover;">
                <div class="card-body bg-dark text-white outfit-regular" style="padding: 0.5rem;">
                    <h5 class="card-title" style="font-size: 1rem;">Stree 2</h5>
                    <h6 class="card-title" style="font-size: .8rem;">Directed By : Amar Kaushik</h6>
                </div>
                <ul class="list-group list-group-flush bg-dark text-white" style="padding: 0.2rem;">
                    <li class="list-group-item bg-dark text-white outfit-regular" style="padding: 0.3rem;">Release Date : </li>
                    <li class="list-group-item bg-dark text-white outfit-regular" style="padding: 0.3rem;">Genre : </li>
                    <li class="list-group-item bg-dark text-white outfit-regular" style="padding: 0.3rem;">Rating : </li>
                    <span style="font-size: 0.8rem; margin-left: 5px;">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                    </span>
                </ul>
                <div class="card-body bg-dark text-white outfit-regular" style="padding: 0.5rem;">
                    <div class="d-flex justify-content-evenly">
                        <a href="#" class="btn btn-sm btn-outline-light outfit-regular rounded-0 fw-bold shadow-none">Watchlist</a>
                        <a href="#" class="btn btn-sm btn-outline-light outfit-regular rounded-0 fw-bold shadow-none">Details</a>
                    </div>
                </div>
            </div>
        </div>
        <!---<div class="col-lg-12 text-center mt-3"> 
        <a href="#" class="btn btn-sm btn-outline-light outfit-regular rounded-0 fw-bold shadow-none">See more...</a>
        </div>--->
    </div>
</div>





<?php
include("footer.php");
?>