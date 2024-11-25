<?php
include('db_config.php');
include('links.php');
include('scripts.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
if(isset($_POST['movie_id'])){
    $movie_id = (int)$_POST['movie_id'];
    $query = "SELECT * FROM `movies` WHERE `movie_id` = $movie_id";
    $data = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($data);
    echo $row['title'];

}
?>
<div class="modal fade"  data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                          
                            <form id="movie_form" method="POST" action="">
                          
                                <div class="modal-body" style="color: black;">
                                        <div class="mb-3">
                                            <label class="form-label fw-bold">Title</label>
                                            <input type="text" class="form-control" id="title" name="title" value="<?php$data['title'];?>" >
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label fw-bold">Director</label>
                                            <input type="text" class="form-control" id="director" name="director" value="<?=$data['director'];?>">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label fw-bold">Description</label>
                                            <textarea class="form-control" id="description" name="description" required><?php $data['description']; ?></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label fw-bold">Runtime (minutes)</label>
                                            <input type="number" class="form-control" id="runtime" name="runtime" value="<?=$data['duration_min'];?>">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label fw-bold">Release Date</label>
                                            <input type="date" class="form-control" id="release-date" name="release_date" value="<?=$data['release_date'];?>">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label fw-bold">Genre</label>
                                            <select class="form-select" id="genre" name="genre" value="<?=$data['genre'];?>">
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
                                            <input type="text" class="form-control" id="poster-url" name="poster-url" value="<?=$data['poster'];?>">
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
</body>
</html>
