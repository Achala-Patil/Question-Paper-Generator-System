<?php
// Replace [Username] with the actual username (you should have a mechanism to get the username)
$username = "User"; // Replace with your logic to fetch the username
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Your Dashboard</title>

    <!-- Add Bootstrap CSS link here -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style>
        .custom-nav-link {
            color: red;
            /* Change 'red' to your desired color */
        }

        /* Reset some default styles */
        body,
        h1,
        h2,
        p,
        ul,
        li {
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f2f2f2;
            text-align: center;
        }

        main {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin: 20px;
        }

        h2 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        p {
            font-size: 18px;
            line-height: 1.5;
        }

        footer {
            background: #2b2e2e;
            color: #fff;
            padding: 10px;
            position: fixed;
            bottom: 0;
            width: 100%;
        }



        /* Reduce the height of the carousel */
        #imageSlider.carousel {
            max-height: 30%;
            /* Adjust the value as needed */
        }

        /* Adjust the height of the carousel inner content */
        #imageSlider .carousel-inner {
            max-height: 30%;
            /* Adjust the value as needed */
        }

        .carousel-item img {
            width: 100%; /* Makes the image width 100% of the container */
            height: auto; /* Maintains aspect ratio */
        }
    </style>
</head>

<body>
    <?php
    // Include the navigation bar
    include("nav.php");
    ?>
    <br>
    <header>


    </header>

    <main>


        <section>

            <h2>Welcome</h2>
            <div id="imageSlider" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#imageSlider" data-slide-to="0" class="active"></li>
                    <li data-target="#imageSlider" data-slide-to="1"></li>
                </ol>

                <!-- Slides -->
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="vit_image.jpg" alt="Image 1">
                    </div>
                    <div class="carousel-item">
                        <img src="image2.jpg" alt="Image 2">
                    </div>
                    
                </div>

                <!-- Controls -->
                <a class="carousel-control-prev" href="#imageSlider" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#imageSlider" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>

        </section>
    </main>




    <!--
    <footer>
        <p>&copy; <?php echo date("Y"); ?> GPN Students. All rights reserved.</p>
    </footer>
-->
    <!-- Add Bootstrap JavaScript and jQuery links here -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>