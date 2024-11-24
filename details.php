<?php
include("navbar.php");
include('admin/inc/essentials.php');
include('admin/inc/db_config.php');
include('admin/inc/links.php');
include('admin/inc/scripts.php');
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Details</title>
    <style>
        .profile-page {
            max-width: 900px;
            margin: auto;
            background: #444;
            /* Darker background for the profile card */
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
            color: white;
            /* White text color */
            display: flex;
            /* Use flexbox for layout */
        }

        .info {
            flex: 2;
            /* Allow info section to take more space */
            margin-right: 20px;
            /* Space between info and poster */
        }

        .movie-poster img {
            width: 250px;
            /* Set a larger width for the poster */
            height: auto;
            /* Maintain aspect ratio */
            border-radius: 8px;
        }

        h1 {
            font-size: 2em;
            margin-bottom: 10px;
        }

        .info strong {
            display: inline-block;
            width: 100px;
            /* Fixed width for labels */
        }

        .reviews {
            margin-top: 20px;
            /* Space above reviews */
            display: flex;
            /* Use flexbox for alignment */
            flex-direction: column;
            /* Stack review cards vertically */
            align-items: flex-end;
            /* Align cards to the right */
        }

        .review-card {
            background: linear-gradient(135deg, #7d7d7d, #f3e03b);
            /* Grey-yellow gradient */
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.5);
            color: black;
            /* Black text color for reviews */
            width: 300px;
            /* Fixed width for review cards */
        }

        .review-card h3 {
            margin: 0 0 10px 0;
            /* Margin for review title */
            font-size: 1.2em;
        }

        .review-card p {
            margin: 0;
            /* Remove margin for paragraph */
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 ms-auto p-3 overflow-hidden">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div style="max-width: 850px; height:auto; margin: auto; background: rgba(255,255,255, 0.1); padding: 35px;  color: white; display: flex;">

                        <div style="flex: 2; margin-right: 20px;">
                            <h1 style="font-size: 3.5em; margin-bottom: 10px;">Movie Title</h1>
                            <div style="margin-bottom: 15px;">
                                <strong style="font-size: 1.0em; display: inline-block; width: 110px;">Release Date:</strong>  YYYY-MM-DD
                            </div>
                            <div style="margin-bottom: 15px;">
                                <strong style="display: inline-block; width: 110px;">Genre:</strong> Action, Drama
                            </div>
                            <div style="margin-bottom: 15px;">
                                <strong style="display: inline-block; width: 110px;">Runtime:</strong> 120 minutes
                            </div>
                            <div style="margin-bottom: 15px;">
                                <strong style="display: inline-block; width: 110px;">Director:</strong> Director Name
                            </div>
                            <div style="margin-bottom: 15px;">
                                <strong style="display: inline-block; width: 110px;">Rating:</strong> 8.5/10
                            </div>
                            <div style="margin-bottom: 15px;">
                                <strong style="display: inline-block; width: 100px;">Description:</strong>
                                <p style="margin: 0;">A brief summary of the movie's plot goes here. This should provide an overview without revealing spoilers.</p>
                            </div>
                        </div>

                        <div>
                            <img src="https://m.media-amazon.com/images/M/MV5BMzUzNDM2NzM2MV5BMl5BanBnXkFtZTgwNTM3NTg4OTE@._V1_.jpg" alt="Movie Title" style="width: 250px; height: auto; border-radius: 8px;">
                        </div>
                    </div>

                    <div style="max-width: 900px; margin: auto; margin-top: 20px; color: white; display: flex; flex-direction: column;">

                        <h2>Reviews</h2>
                        <div style="display: flex; flex-direction: column;">

                            <div style="background: linear-gradient(135deg, #7d7d7d, #f3e03b); border-radius: 8px; padding: 15px; margin-bottom: 15px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.5); color: black;">
                                <h3 style="margin: 0 0 10px 0;">User 1</h3>
                                <p style="margin: 0;"><strong>Rating:</strong> 9/10</p>
                                <p style="margin: 0;">Great movie! The plot was engaging and the acting was top-notch.</p>
                            </div>

                            <div style="background: linear-gradient(135deg, #7d7d7d, #f3e03b); border-radius: 8px; padding: 15px; margin-bottom: 15px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.5); color: black;">
                                <h3 style="margin: 0 0 10px 0;">User 2</h3>
                                <p style="margin: 0;"><strong>Rating:</strong> 7/10</p>
                                <p style="margin: 0;">Good film, but it felt a bit long in some parts.</p>
                            </div>

                            <div style="background: linear-gradient(135deg, #7d7d7d, #f3e03b); border-radius: 8px; padding: 15px; margin-bottom: 15px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.5); color: black;">
                                <h3 style="margin: 0 0 10px 0;">User 3</h3>
                                <p style="margin: 0;"><strong>Rating:</strong> 8/10</p>
                                <p style="margin: 0;">Enjoyed the cinematography and the soundtrack!</p>
                            </div>

                            <div style="background: linear-gradient(135deg, #7d7d7d, #f3e03b); border-radius: 8px; padding: 15px; margin-bottom: 15px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.5); color: black;">
                                <h3 style="margin: 0 0 10px 0;">User 4</h3>
                                <p style="margin: 0;"><strong>Rating:</strong> 10/10</p>
                                <p style="margin: 0;">A masterpiece! I would watch it again.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>

</html>