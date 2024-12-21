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
        <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
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
            .cBackground {
                background-color:rgb(40, 44, 48);
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
                                <a class="btn btn-outline-light fs-6 me-3" href="#about">Home</a>
                            </li>

                            <?php
                            foreach ($projectData as $category) {
                                echo '<li class="nav-item me-3 mb-1"><a href="#' . $category['category'] . '" class="btn btn-outline-light fs-6">' . $category['category'] . '</a></li>';
                            }
                            ?>

                            <li class="nav-item">
                                <a class="btn btn-outline-light fs-6" href="#contact">Contact</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>

        <!-- HERO -->
        <div class="d-flex justify-content-center align-items-center text-dark">
            <div class="position-absolute">
				<!--
                <h1 style="font-size: 50px"><strong>Mo</strong>oie</h1>
                <h1 style="font-size: 50px"><strong>Din</strong>gen</h1>
                <h1 style="font-size: 50px"><strong>O</strong>ntwerpen</h1>
				-->
            </div>

            <img src="images/hero.jpg" alt="hero" class="w-100 img-fluid">
        </div>

        <!-- MAIN CONTENT -->
        <div class="container">
            <!-- ABOUT -->
            <div class="row mt-5 d-flex justify-content-center" id="about">
                <div class="col-lg-8 border rounded p-3 text-center cBackground">
                    <p class="fs-1">Modino</p>
                    <p style="text-align: left;">Modino staat voor MOoie DINgen Ontwerpen. Dingen van hout, bij voorkeur van tweedehands of hergebruikt hout. Hiervan maakt ik maatwerk meubels, camperinterieur of kunstobjecten. Ook voer ik reparaties van houten objecten uit.</p>
					<p style="text-align: left;">Modino denkt met u mee met het ontwerp, maakt de schetsen en tekeningen en maakt het object. Hierbij wordt zoveel mogelijk van tweedehands of hergebruikt hout gebruik gemaakt. </p>
                </div>
            </div>

            <!-- PROJECTS -->
            <?php
            foreach ($projectData as $category) {
                echo '<div class="row mt-5 d-flex justify-content-center"><div class="col-lg-8 border p-3 rounded text-center cBackground" id=' . $category['category'] . '><p class="fs-1">' . $category['category'] . '</p><div class="d-flex flex-wrap justify-content-between">';

                foreach ($category['projects'] as $project) {
                    echo '<a href="detail.php?id=' . $project['id'] . '" class="col-lg-6 p-3 mb-5 rounded" style="width: 49%"><p class="fs-3">' . $project['name'] . '</p> <p>' . $project['headerLine'] . '</p><img src="' . $project['mainPicture'] . '" alt="' . $project['name'] . '" class="w-50 img-fluid rounded" /></a>';
                }

                echo '</div></div></div>';
            }
            ?>
            
            <!-- CONTACT -->
            <div class="row mt-5 mb-5 d-flex justify-content-center" id="contact">
                <div class="col-lg-8 border rounded pt-3 pb-3 text-center cBackground">
                    <p class="fs-1">Contact</p>
						<img src="images/contact.png" alt="contact" class="w-20 img-fluid">
                    <!-- <p>Placeholder tekst. Kan vervangen worden met tekst voor de contact sectie.</p> 

                    <div class="d-flex justify-content-around">
                        <div class="p-3">
                            <i class="bi bi-telephone-fill" style="font-size: 5rem"></i>
                            <p class="fs-4">+31 6 453 10205</p>
                        </div>

                        <a href="mailto:bvdburg@modino.nl" class="p-3 rounded">
                            <i class="bi bi-envelope-at-fill" style="font-size: 5rem"></i>
                            <p class="fs-4">bvdburg@modino.nl</p>
                        </a>
                    </div> -->
                </div>
            </div>

        </div>

        <!-- FOOTER -->
        <div class="border-top p-5 text-center cBackground">
            <p class="m-0 p-0">© Copyright, Modino, All rights reserved, 2025</p>
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
