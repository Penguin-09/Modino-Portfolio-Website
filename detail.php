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
    <style>
        .cBackground {
            background-color:rgb(40, 44, 48);
        }
    </style>
</head>
<body class="bg-dark text-light">
    <!-- NAVIGATION BAR -->
    <nav class="navbar navbar-expand-lg text-light bg-dark border-bottom sticky-top p-0 m-0">
        <div class="container-fluid d-flex justify-content-between cBackground">
            <!-- Title -->
            <p class="navbar-brand text-light p-0 m-0"><span class="fs-1 pe-2">Modino</span> Bart van der Burg</p>

            <!-- Navigation -->
            <div class="d-flex flex-row">
                <a class="btn btn-outline-light fs-6" href="index.php">Home</a>
            </div>
        </div>
    </nav>

    <!-- MAIN CONTENT -->
    <div class="container">
        <!-- TITLE -->
        <div class="row text-center">
            <h1 class="mt-5" style="font-size: 70px"><?= $projectData['name'] ?></h1>
            <h2><?= $projectData['headerLine'] ?></h2>
        </div>

        <div class="row d-flex justify-content-center">
            <!-- DESCRIPTION -->
            <div class="col-lg-8 m-3 p-3 border rounded d-flex justify-content-between flex-row cBackground">
                <p class="col-lg-6"><?= $projectData['description'] ?></p> 

                <!-- MAIN IMAGE -->
                <img src=<?= $projectData['mainPicture'] ?> alt="Main Picture" class="col-lg-6 img-fluid rounded">
            </div>
        </div>

        <!-- IMAGES -->
        <div class="row mt-5 d-flex justify-content-center">
            <div class="col-lg-8 border rounded d-flex justify-content-center flex-wrap cBackground">
            <?php foreach ($projectData['pictures'] as $picture) { ?>
                <div class="col-lg-5 d-flex align-items-center m-3"><img src=<?= $picture ?> alt="Picture" class="img-fluid rounded m-3"></div>
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
