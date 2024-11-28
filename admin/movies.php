<?php

include('inc/db_config.php');
include('inc/essentials.php');
include('inc/links.php');

#adminLogin();
#$success = false;
session_start();


if (isset($_POST['done'])) {

    $title = $_POST['title'];
    $director = $_POST['director'];
    $description = $_POST['description'];
    $runtime = $_POST['runtime'];
    $genre = $_POST['genre'];
    $release_date = $_POST['release_date'];
    $poster = $_POST['poster-url'];


    $sql = "INSERT INTO `movies` (`title`, `director`, `description`, `release_date`, `duration_min`, `genre`, `poster`) VALUES ('$title','$director', '$description','$release_date', '$runtime', '$genre', '$poster')";
    $sql_run = mysqli_query($con, $sql);
    #$stmt = $con->prepare("INSERT INTO `movies` (`title`, `director`, `description`, `release_date`, `duration_min`, `genre`, `poster`) VALUES ( ?, ?, ?, ?, ?, ?, ?);");
    #mysqli_stmt_bind_param($stmt, "ssssiss", $title,$director, $description,$release_date, $runtime, $genre, $poster);
    if ($sql_run) {
        $_SESSION['success'] = true;
        echo "<script>alert('New Movie Added:D');</script>";
        redirect('movies.php');
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
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h3 class="oswald-regular fw-bold fs-2">Movies</h3>
                    <button type="button" class="btn btn-sm btn-outline-light outfit-regular rounded-0 fw-bold shadow-none" data-bs-toggle="modal" data-bs-target="#add-movie">
                        <i class="bi bi-plus-square"></i> Add
                    </button>
                </div>
                <div class="table-responsive-md" style="height: 570px; overflow: auto;">
                    <table class="table table-hover table-dark table-striped" style="min-width: 600px;">
                        <thead class="sticky-top">
                            <tr>
                                <th scope="col" width="5%">ID</th>
                                <th scope="col" width="15%">Title</th>
                                <th scope="col" width="10%">Director</th>
                                <th scope="col" width="7%">Runtime</th>
                                <th scope="col" width="10%">Release Date</th>
                                <th scope="col" width="7%">Genre</th>
                                <th scope="col" width="7%">Rating</th>
                                <th scope="col" width="7%">Poster</th>
                                <th scope="col" width="50%">Description</th>
                                <th scope="col" width="30%">        </th>  
                                <th scope="col" width="30%"> Action   </th>
                                <th scope="col" width="30%">          </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT * FROM `movies` ORDER BY movie_id;";
                            $data = mysqli_query($con, $sql);

                            while ($row = mysqli_fetch_assoc($data)) {
                                $description = htmlspecialchars($row['description']);
                                echo $row['movie_id'];
                                echo <<<query
                                    <tr>
                                    <td>$row[movie_id]</td>
                                    <td>$row[title]</td>
                                    <td>$row[director]</td>
                                    <td>$row[duration_min]</td>
                                    <td>$row[release_date]</td>
                                    <td>$row[genre]</td>
                                    <td>$row[rating]</td>
                                    <td><img src="{$row['poster']}" alt="Poster" style="width: 50px; height: auto;"></td>
                                    <td>
                                        <div class="description-container">
                                            <div class="description" style="max-height: 4.5em; overflow: hidden; transition: max-height 0.3s ease;">
                                                $description
                                            </div>
                                            <button class="btn btn-link expand-btn" style="color: #ffffe6; font-size: 0.6rem">Show More</button>
                                        </div>
                                    </td>
                                    <td>
                                       
                                    
                                           <div class="btn-group" role="group" aria-label="Action Buttons">
                                        <td>     
                                           <a type="button" class="btn btn-warning" id ="edit" href="edit_movies.php?button='edit'&movieId={$row['movie_id']}">
                                                       Edit
                                                </a>
                                        </td>
                                        <td> 
                                             <button type="button" class="btn btn-danger deletebtn">Delete</button>
                                        
                                            </div>
                                   
                                    </td>
                                    </tr>
                                   query;
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="modal fade" id="add-movie" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel" style="color: black;">Add Movie</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form id="movie_form" method="POST" action="movies.php">
                                <div class="modal-body" style="color: black;">
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Title</label>
                                        <input type="text" class="form-control" id="title" name="title" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Director</label>
                                        <input type="text" class="form-control" id="director" name="director" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Description</label>
                                        <textarea class="form-control" id="description" name="description" required></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Runtime (minutes)</label>
                                        <input type="number" class="form-control" id="runtime" name="runtime" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Release Date</label>
                                        <input type="date" class="form-control" id="release-date" name="release_date" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Genre</label>
                                        <select class="form-select" id="genre" name="genre" required>
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
                                        <input type="url" class="form-control" id="poster-url" name="poster-url" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" name="done" class="btn btn-primary">Done</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

               <!-- Modal Structure -->
 <div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h4 id="staticBackdropLabel" style="color: black;">Do you want to delete this movie from the database?</h4>
        </div>
            <form id="movie_form" method="POST" action="delete_movies.php">
              
                <input type="hidden" id="delete_id" name="deleteId">
                <div class="modal-footer">
                   
                    <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="deleteData" class="btn btn-primary">Confirm</button>
                </div>
            </form>
        <!-- here i need to use php to fetch the comments using post id -->
        </div>
   </div>
</div>

            </div>
        </div>
    </div>
    <?php


include('inc/scripts.php');
?>
    <script>
        
        $(document).ready(function(){
            $('.deletebtn').on('click', function(){
            $('#delete-modal').modal('show');

            $tr = $(this).closest('tr');
            var data = $tr.children("td").map(function(){
                return $(this).text();
            }).get();
            console.log(data);

            $('#delete_id').val(data[0]);
        });
    });
    </script>

</body>

</html>