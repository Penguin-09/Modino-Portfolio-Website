<?php

// Get the data from the JSON file
$allProjectData = json_decode(file_get_contents('projectData.json'), true);
$projectID = $_GET['id'];

foreach ($allProjectData as $category) {
    foreach ($category['projects'] as $project) {
        if ($project['id'] == $projectID) {
            $projectData = $project;
            break 2;
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
        crossorigin="anonymous"
    />
    <link rel="icon" type="image/x-icon" href="/images/favicon.ico">
    <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
        />
    <style>
        .cBackground {
            background-color:rgb(40, 44, 48);
        }
        .img-hover-zoom {
            transition: transform 0.3s ease;
        }
        .img-hover-zoom:hover {
            transform: scale(2);
        }
    </style>
</head>
<body class="bg-dark text-light">
    <!-- NAVIGATION BAR -->
    <nav class="navbar navbar-expand-lg text-light border-bottom sticky-top p-2 m-0 cBackground">
            <div class="container-fluid d-flex justify-content-between">
                <!-- Title -->
                <p class="navbar-brand text-light p-0 m-0"><span class="fs-1 pe-2">Modino</span> Bart van der Burg</p>

                <button class="navbar-toggler text-light border border-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"><i class="bi bi-list" style="font-size: larger"></i></span>
                </button>

                <!-- Navigation -->
                <div class="d-flex">
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto d-flex flex-row flex-wrap">
                            <li class="nav-item">
                                <a class="btn btn-outline-light fs-6 me-3" href="index.php">Home</a>
                            </li>

                            <?php
                            foreach ($allProjectData as $category) {
                                echo '<li class="nav-item me-4 mb-1"><a href="index.php#' . $category['category'] . '" class="btn btn-outline-light fs-6">' . $category['category'] . '</a></li>';
                            }
                            ?>

                            <li class="nav-item">
                                <a class="btn btn-outline-light fs-6" href="index.php#contact">Contact</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>

    <!-- MAIN CONTENT -->
    <div class="container">
        <!-- TITLE -->
        <div class="row text-center">
            <h1 class="mt-5" style="font-size: 70px"><?= $projectData['name'] ?></h1>
        </div>

        <div class="row d-flex justify-content-center">
            <!-- DESCRIPTION -->
            <div class="col-lg-8 m-3 p-3 border rounded text-center cBackground">
                <h2><?= $projectData['headerLine'] ?></h2>

                <p class="col-lg-6 d-flex text-start"><?= $projectData['description'] ?></p> 
            </div>
        </div>

        <!-- IMAGES -->
        <div class="row mt-5 d-flex justify-content-center">
            <div class="col-lg-8 border rounded d-flex justify-content-center flex-wrap cBackground">
            <!-- MAIN IMAGE -->
            <div class="col-lg-3 d-flex align-items-center m-3"><img src=<?= $projectData['mainPicture'] ?> alt="Main Picture" class="img-fluid rounded m-3 img-hover-zoom"></div>

            <?php foreach ($projectData['pictures'] as $picture) { ?>
                <div class="col-lg-3 d-flex align-items-center m-3"><img src=<?= $picture ?> alt="Picture" class="img-fluid rounded m-3 img-hover-zoom"></div>
            <?php } ?>
            </div>
        </div>
    </div>

    <!-- FOOTER -->
    <div class="border-top m-0 mt-5 p-5 text-center cBackground">
        <p class="m-0 p-0">© Copyright, Modino, All rights reserved, 2025</p>
    </div>

    <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"
    ></script>
</body>
</html>
