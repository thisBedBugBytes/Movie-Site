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