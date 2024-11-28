<?php
session_start();

include('inc/db_config.php');
include('inc/essentials.php');
include('inc/links.php');
include('inc/scripts.php');

#adminLogin();
#$success = false;


if (isset($_POST['edit_done'])) {
    
    $conn = $GLOBALS['con'];
    $movie_id = $_SESSION['movieId']; 
    if($movie_id == null){
        echo "Id not found";
    }
    else echo "id FOUND";
    // Ensure you're passing the movie ID
    $query = "SELECT * FROM movies WHERE movie_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $movie_id);
    $stmt->execute();
    $data = $stmt->get_result();
    $result = $data->fetch_assoc();  

   
    $title = ($_POST['title'] != '' )? $_POST['title']: $result['title'];
    $director =($_POST['director'] != '' )? $_POST['director']: $result['director'];
    $description = ($_POST['description'] != '' )? $_POST['description']: $result['description'];
    $runtime =($_POST['runtime'] != null)? $_POST['runtime']: $result[['duration_min']];
    $genre = ($_POST['genre'] != '' )? $_POST['genre']: $result['genre'];
    $release_date = ($_POST['release_date'] != '' )? $_POST['release_date']: $result['release_date'];
    $poster =  isset($_POST['poster']) ? $_POST['poster']: $result['poster'];

    #$sql = "UPDATE `movies` set `title` = $title, `director` = $director, `description`, `release_date`, `duration_min`, `genre`, `poster`) VALUES ('$title','$director', '$description','$release_date', '$runtime', '$genre', '$poster')";
    #$sql_run = mysqli_query($con, $sql);
    $stmt = $con->prepare("UPDATE `movies` SET `title` = ?,  `director` = ?, `description` = ?, `release_date` = ?, `duration_min` = ?, `genre` = ?, `poster` = ? WHERE `movie_id` = ?;");
    mysqli_stmt_bind_param($stmt, "ssssissi", $title,$director, $description,$release_date, $runtime, $genre, $poster, $movie_id);
    if ($stmt->execute()) {
        $_SESSION['success'] = true;
        echo "<script>alert('Details Edited:D');</script>";
        redirect('movies.php');// Redirect to your movie list page
      
        session_destroy();
    }
    #if($stmt->execute()){
    #echo "<script>alert('Movie Inserted Successfully!');</script>";
    #}
    else {
        echo "<script>alert('Error,Server Down :(');</script>";
    }
    
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movies</title>
    
    <style>
        body {
            color: #F4CE14;
        }

        .card-header {
            background-color: #DAA520;
            color: #fff;
        }

        .card {
            margin-bottom: 20px;
            height: 100%;
        }

        .card-title {
            font-size: 1.5rem;
        }

        .card-text {
            font-size: 0.9rem;
            color: #000;
        }
        .custom-modal-width{
            max-width: 75%;
        }
    </style>
    
   

</head>

<body style="color:#F4CE14">
    <div class="container-fluid bg-dark text-light p-3 d-flex align-items-center justify-content-between sticky-top">
        <a class="mb-0 oswald-regular mb-1 fw-bold sticky-top fs-1" href="../index.php" style="color: white; text-decoration: none;">CineBox</a> 
        <a href="logout.php" class="btn btn-sm btn-outline-light outfit-regular rounded-0 fw-bold shadow-none oswald-regular my-2">Log Out</a>
    </div>

    <div class="col-lg-2 bg-light border-top border-3 border-secondary" id="dashboard-menu" style="min-height: 100vh;">
        <h5 class="text-dark text-center fw-bold fs-3 outfit-regular mt-2 p-2">Admin Panel</h5>
        <ul class="nav nav-pills flex-column">
            <li class="nav-item">
                <a class="nav-link outfit-regular fs-6 fw-bold" href="dashboard.php">Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active outfit-regular fs-6 fw-bold" href="movies.php">Movies</a>
            </li>
            <li class="nav-item">
                <a class="nav-link outfit-regular fs-6 fw-bold" href="users.php">Users</a>
            </li>
        </ul>
    </div>

    <div class="container-fluid">
        <?php
        if(isset($_GET['edit'])){
        
        ?> 
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                                     
                    <div class="modal-dialog custom-modal-width">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel" style="color: black;">Edit Movie</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form name="movie_form" method="POST" action="edit_movies.php">
                               
                            <?php
                            if(isset($_GET['movieId'])){
                            $movie_id = $_GET['movieId'];
                            $_SESSION['movieId'] = $movie_id;
                            echo $_SESSION['movieId'];
                            $sql = "SELECT * FROM `movies` WHERE `movie_id`=$movie_id;";
                            $data = mysqli_query($con, $sql);

                           $row = mysqli_fetch_assoc($data);
                           $description = htmlspecialchars($row['description']) ;
                                
                               if($movie_id != null){
                            
                            ?><input type="hidden" name="movieId" value="<?=$movie_id;?>">

                                <div class="modal-body" style="color: black;">
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Title</label>
                                        <input type="text" class="form-control" value="<?= htmlspecialchars($row['title']) ?>" name="title" >
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Director</label>
                                        <input type="text" class="form-control" value="<?= htmlspecialchars($row['director']) ?>" name="director" >
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Description</label>
                                        <textarea class="form-control"  name="description" required><?=$description?></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Runtime (minutes)</label>
                                        <input type="number" class="form-control" value="<?= htmlspecialchars($row['duration_min']) ?>" name="runtime" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Release Date</label>
                                        <input type="date" class="form-control" id="release-date" value="<?= htmlspecialchars($row['release_date']) ?>" name="release_date" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Genre</label>
                                        <select class="form-select" id="genre" name="genre" value="<?= htmlspecialchars($row['genre']) ?>" required>
                                            <option value="" disabled selected>Select Genre</option>
                                            <option value="Action">Action</option>
                                            <option value="Animation">Animation</option>
                                            <option value="Comedy">Comedy</option>
                                            <option value="Drama">Drama</option>
                                            <option value="Thriller">Thriller</option>
                                            <option value="Horror">Horror</option>
                                            <option value="Romance">Romance</option>
                                            <option value="Mystery">Mystery</option>
                                            <option value="Sci-Fi">Sci-Fi</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Poster URL</label>
                                        <input type="url" class="form-control" id="poster-url" name="poster-url" value="<?= htmlspecialchars($row['poster']) ?>" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" name="edit_done" class="btn btn-primary">Done</button>
                                </div>
                            </form>
                            <?php 
                        }
                    }
                }
                        ?>
                        </div>
                    </div>
             

               <!-- Modal Structure -->
         
            </div>
        </div>
    </div>

</body>

</html>