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

        <!-- HERO -->
        <div class="d-flex justify-content-center align-items-center text-dark">
            <div
                class="text-center position-absolute"
                style="text-shadow: 2px 2px white"
            >
                <h1 style="font-size: 100px">Modino</h1>
                <h2 style="font-size: 70px">Placeholder tekst</h2>
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

                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum odio diam, aliquet nec posuere sit amet, tincidunt gravida mauris. In molestie mauris sem, et blandit lectus lacinia ac. Etiam tellus felis, porta non ultricies ac, finibus commodo odio. Integer suscipit venenatis enim, nec gravida orci pellentesque sed. Fusce nec ornare justo. Sed mattis dui vel eleifend suscipit. Aliquam erat volutpat.</p>
                </div>
            </div>

            <!-- PROJECTS -->
            <?php
            foreach ($projectData as $category) {
                echo '<div class="row mt-5 d-flex justify-content-center"><div class="col-lg-8 border p-3 rounded text-center" id=' . $category['category'] . '><p class="fs-1">' . $category['category'] . '</p><div class="d-flex flex-wrap justify-content-between">';

                foreach ($category['projects'] as $project) {
                    echo '<a href="detail.php" class="col-lg-6 p-3 mb-5 rounded" style="width: 49%"><p class="fs-3">' . $project['name'] . '</p> <p>' . $project['headerLine'] . '</p><img src="' . $project['mainPicture'] . '" alt="' . $project['name'] . '" class="w-50 img-fluid rounded" /></a>';
                }

                echo '</div></div></div>';
            }
            ?>
            
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
