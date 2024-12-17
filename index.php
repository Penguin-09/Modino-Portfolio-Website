<?php

// Get the data from the JSON file
$projectData = json_decode(file_get_contents('projectData.json'), true);

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Modino</title>
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
            crossorigin="anonymous"
        />
        <style>
            .btn-outline-light:hover {
                text-shadow: none !important;
            }
            a {
                text-decoration: none;
                color: inherit;
            }
            a:hover {
                text-decoration: none;
                color: inherit;
                background-color:rgba(50, 55, 59, 0.94);
                cursor: pointer;
            }
        </style>
    </head>
    <body class="bg-dark text-light">
        <!-- NAVIGATION BAR -->
        <nav class="navbar navbar-expand-lg text-light bg-dark border-bottom sticky-top p-0 m-0">
            <div class="container-fluid d-flex justify-content-between">
                <!-- Title -->
                <a class="navbar-brand text-light" href="#"><span class="fs-1 pe-2">Modino</span> Bart van der Burg</a>

                <!-- Navigation -->
                <div class="d-flex flex-row">
                    <a class="btn btn-outline-light fs-6 me-3" href="#about">Over mij</a>

                    <a class="btn btn-outline-light fs-6 me-3" href="#categories">Categorieën</a>

                    <a class="btn btn-outline-light fs-6" href="#contact">Contact</a>
                </div>
            </div>
        </nav>

        <!-- HERO -->
        <div class="d-flex justify-content-center align-items-center text-dark">
            <div
                class="text-center position-absolute"
                style="text-shadow: 2px 2px white"
            >
                <h1 style="font-size: 100px">Modino</h1>
                <h2 style="font-size: 70px">Placeholder</h2>
            </div>

            <img src="images/hero.jpg" alt="hero" class="w-100" />
        </div>

        <!-- MAIN CONTENT -->
        <div class="container">
            <!-- ABOUT -->
            <div class="row mt-5 d-flex justify-content-center" id="about">
                <div class="col-lg-8 border rounded p-3 text-center">
                    <p class="fs-1">Over mij</p>

                    <p>Placeholder tekst. Kan vervangen worden met 'over mij' sectie.</p>
                </div>
            </div>
            
            <!-- CATEGORIES -->
            <div class="row mt-5 d-flex justify-content-center" id="categories">
                <div class="col-lg-8 border rounded p-3 text-center">
                    <p class="fs-1">Categorieën</p>

                    <?php
                    foreach ($projectData as $category) {
                        echo '<a href="#' . $category['category'] . '" class="btn btn-light fs-4 m-3 mt-0">' . $category['category'] . '</a>';
                    }
                    ?>
                </div>
            </div>

            <!-- PROJECTS -->
            <div class="row mt-5 d-flex justify-content-center">
                <div class="col-lg-8 border p-3 rounded text-center">
                    <p class="fs-1">Projecten</p>

                    <p>Placeholder tekst. Kan vervangen worden met een korte beschrijving.</p>

                    <?php
                    foreach ($projectData as $category) {
                        echo '<p class="fs-2 border-bottom">' . $category['category'] . '</p><div class="d-flex flex-wrap justify-content-between" id="' . $category['category'] . '">';

                        foreach ($category['projects'] as $project) {
                            echo '<a href="detail.php" class="col-lg-6 p-3 mb-5 border rounded" style="width: 49%"><p class="fs-3 border-bottom">' . $project['name'] . '</p> <p>' . $project['headerLine'] . '</p><img src="' . $project['mainPicture'] . '" alt="' . $project['name'] . '" class="w-100 img-fluid rounded" /></a>';
                        }

                        echo '</div>';
                    }
                    ?>
                </div>
            </div>
            
            <!-- CONTACT -->
            <div class="row mt-5 mb-5 d-flex justify-content-center" id="contact">
                <div class="col-lg-8 border rounded p-3 text-center">
                    <p class="fs-1">Contact</p>

                    <p>Placeholder tekst. Kan vervangen worden met een contact sectie.</p>
                </div>
            </div>

        </div>

        <!-- FOOTER -->
        <div class="border-top p-5 text-center">
            <p>Placeholder tekst. Kan vervangen worden met een footer sectie.</p>
        </div>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"
        ></script>
        <script>
        // JS Code thats neccesary to make the navigation work
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();

                const targetId = this.getAttribute('href').substring(1);
                const targetElement = document.getElementById(targetId);
                const offset = 70;

                window.scrollTo({
                    top: targetElement.offsetTop - offset,
                    behavior: 'smooth'
                });
            });
        });
    </script>
    </body>
</html>
