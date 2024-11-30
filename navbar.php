<!--- Navigation Bar --->
<?php session_start(); ?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark px-lg-3 py-lg-3 shadow sm sticky top">
  <div class="container-fluid">
    <a class="navbar-brand me-10 fw-bold fs-1 oswald-regular " href="index.php">CineBox</a>
    <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <?php if (isset($_SESSION['userName'])): ?>
          <li class="nav-item">
            <a class="nav-link active me-2 outfit-regular fs-6" aria-current="page" href="index.php">Welcome <?php echo htmlspecialchars($_SESSION['userName']); ?></a>
          </li>
          <li class="nav-item">
            <a class="nav-link me-2 outfit-regular fs-6" href="logout.php">Logout</a>
          </li>
        <?php else: ?>
          <li class="nav-item">
            <a class="nav-link me-2 outfit-regular fs-6" data-bs-toggle="modal" data-bs-target="#create-account">Create Account</a>
          </li>
          <li class="nav-item">
            <a class="nav-link me-2 outfit-regular fs-6" href="login.php">Login</a>
          </li>
        <?php endif; ?>
        <li class="nav-item">
          <a class="nav-link me-2 outfit-regular fs-6" href="movies.php">Movies</a>
        </li>
        <?php if (isset($_SESSION['userLogin']) && $_SESSION['userLogin'] == true): ?>
          <li class="nav-item">
            <a class="nav-link me-2 outfit-regular fs-6" href="watchlist.php">Watchlist</a>
          </li>
          <li class="nav-item">
            <a class="nav-link me-2 outfit-regular fs-6" href="diary.php">Diary</a>
          </li>
        <?php else: ?>
          <li class="nav-item">
            <a class="nav-link me-2 outfit-regular fs-6" href="login.php">Watchlist</a>
          </li>
          <li class="nav-item">
            <a class="nav-link me-2 outfit-regular fs-6" href="login.php">Diary</a>
          </li>
        <?php endif; ?>

        <li class="nav-item">
          <a class="nav-link me-2 outfit-regular fs-6" href="admin/index.php">Admin</a>
        </li>
      </ul>
      <form class="d-flex" action="movies.php" method="GET">
        <input class="form-control me-2" type="text" name="search" placeholder="Search by movie name" aria-label="Search" style="width: 300px;">
        <button class="btn btn-outline-secondary shadow-none" type="submit">
          <i class="fas fa-search"></i>
        </button>
      </form>
    </div>
    <div class="modal fade" id="create-account" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel" style="color: black;">Create Account</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form id="create_account" method="POST" action="signup.php">
            <div class="modal-body" style="color: black;">
              <div class="mb-3">
                <label class="form-label fw-bold">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
              </div>
              <div class="mb-3">
                <label class="form-label fw-bold">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
              </div>
              <div class="mb-3">
                <label class="form-label fw-bold">Phone Number</label>
                <input type="tel" class="form-control" id="phone" name="phone" required>
              </div>
              <div class="mb-3">
                <label class="form-label fw-bold">Date of Birth</label>
                <input type="date" class="form-control" id="dob" name="dob" required>
              </div>
              <div class="mb-3">
                <label class="form-label fw-bold">Create Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
              </div>
              <div class="mb-3">
                <label class="form-label fw-bold">Gender</label>
                <select class="form-select" id="gender" name="gender" required>
                  <option value="" disabled selected>Select Gender</option>
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
                </select>
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" name="create_account" class="btn btn-primary">Create Account</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</nav>