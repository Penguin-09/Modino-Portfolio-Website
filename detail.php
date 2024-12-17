<?php

// Get the data from the JSON file
$projectData = json_decode(file_get_contents('projectData.json'), true);

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
</head>
<body class="bg-dark text-light">
            <!-- NAVIGATION BAR -->
            <nav class="navbar navbar-expand-lg text-light bg-dark border-bottom sticky-top p-0 m-0">
            <div class="container-fluid d-flex justify-content-between">
                <!-- Title -->
                <p class="navbar-brand text-light p-0 m-0"><span class="fs-1 pe-2">Modino</span> Bart van der Burg</p>

                <!-- Navigation -->
                <div class="d-flex flex-row">
                    <a class="btn btn-outline-light fs-6 me-3" href="#about">Over mij</a>

                    <?php
                    foreach ($projectData as $category) {
                        echo '<a href="#' . $category['category'] . '" class="btn btn-outline-light fs-6 me-3">' . $category['category'] . '</a>';
                    }
                    ?>

                    <a class="btn btn-outline-light fs-6" href="#contact">Contact</a>
                </div>
            </div>
        </nav>

    <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"
    ></script>
</body>
</html>
