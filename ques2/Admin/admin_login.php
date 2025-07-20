<?php
$login = false;
$showError = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include '../database_config.php';
    $username = $_POST["username"];
    $password = $_POST["password"];


    $sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 1) {
        $login = true;
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        header("Location: Admin_welcome.php");
        exit();
    } else {
        $showError = "Invalid Credentials";
    }
}

?>



<!Doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
    <!-- <link rel="stylesheet" href="css/fontawesome.min.css"> -->
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link rel="stylesheet" href="../css/css1.css">
    <title>Login</title>

    <style>
        body {
            background-image: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('questionback.jpg');
            background-size: cover;
            font-family: 'Open Sans', sans-serif;
        }




        .login {
            float: left;
            font-weight: 700;
            text-transform: uppercase;
            font-size: 13px;
            align-self: center;
            text-align: center;

            padding-top: 8px;
            width: 100%;
            height: 35px;
            border: none;
            border-radius: 20px;
            margin-top: 23px;
            margin-bottom: 20%;

            left: 0px;
            top: 0px;
            transition: all .5s ease, top .5s ease .5s, height .5s ease .5s, background-color .5s ease .75s font-family: 'Open Sans', sans-serif;

        }

        .admin {
            display: block;
            /* Change to block-level element */
            font-family: 'Proxima Nova', sans-serif;


            /* Center horizontally */
            font-weight: 700;
            text-transform: uppercase;
            font-size: 13px;
            text-align: center;
            padding-top: 8px;
            width: 40%;
            /* Set a specific width */

            color: white;
            height: 35px;
            border: none;
            border-radius: 20px;
            margin-top: 20 %;
            margin-bottom: 20px;
            margin-left: 30%;
            left: 0px;
            top: 0px;
            transition: all .5s ease, top .5s ease .5s, height .5s ease .5s, background-color .5s ease .75s;
        }


        .centered-text {
            text-align: center;
            /* Center horizontally */
            display: flex;
            align-items: center;
            /* Center vertically using Flexbox */
            justify-content: center;
            /* Center horizontally using Flexbox */
            margin-bottom: 5%;
            /* Adjust the height as needed */

            /* Background color for the centered div */
        }

        h3 {
            color: white;
            margin: 0;
            /* Remove default margin to make it centered */
        }

        /* Change the placeholder text color for the username input */
        .form-styling[name="username"]::placeholder {
            color: white;
        }

        /* Change the placeholder text color for the password input */
        .form-styling[name="password"]::placeholder {
            color: white;
        }

        .form-styling {
            
            /* Set background color to transparent */
            color: white;
            /* Set text color to white */
            border: 1px solid white;
            /* Add a white border */
            margin-bottom: 30px;
       
           
        }
    </style>
</head>

<body>

    <?php
    include("nav login.php");
    ?>
    <div class="container">
        <div class="frame">

            <div ng-app ng-init="checked = false">
                <form class="form-signin" style="border: none;" action="" method="post" name="form">

                    <div class="centered-text">
                        <h3>Admin Login</h3>
                    </div>


                    <input class="form-styling" type="text" name="username" placeholder="Username" />



                    <input class="form-styling" type="text" name="password" placeholder="Password" />



                    <input style="background-color:#3d7fa8" type="Submit" class="login" type="button" name="Login"
                        value="Sign In" />

                   


                </form>

            </div>


            <!-- Optional JavaScript -->
            <!-- jQuery first, then Popper.js, then Bootstrap JS -->
            <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
                integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
                crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
                integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
                crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"
                integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
                crossorigin="anonymous"></script>
            <script>

            </script>
</body>

</html>