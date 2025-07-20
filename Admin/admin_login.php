<?php
$login = false;
$showError = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include '../database_config.php';
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM admin_authentication WHERE username='$username' AND password='$password'";
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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Admin Login</title>
    <style>
        body {
            background-image: url('questionback.jpg');
            background-size: cover;
            font-family: 'Open Sans', sans-serif;
            color: white;
        }

        .container {
            backdrop-filter: blur(5px);
            background-color: rgba(0, 0, 0, 0.7);
            border-radius: 10px;
            padding: 50px;
            max-width: 450px;
            margin: 110px auto;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.5);
        }

        h3 {
            margin-bottom: 20px;
            text-align: center;
        }

        .form-control {
            border: 1px solid white;
            border-radius: 2px;
            margin-bottom: 10px;
            padding: 10px 10px;
            height: 50%;

        }

        .form-control:focus {
            border-color: #3d7fa8;
            outline: none;
        }

        .btn {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            font-weight: bold;
        }

        .btn-login {
            background-color: #3d7fa8;
            color: white;
        }

        .btn-login:hover {
            background-color: #2a5f7e;
        }

        .btn-admin {
            background-color: #7fa83d;
            color: white;
            margin-top: 10px;
        }

        .btn-admin:hover {
            background-color: #5a8a2d;
        }

        .forgotPassClass {
            text-align: right;
            margin-top: 12px;
            margin-bottom: 10px;
        }

        #forgotPass {
            color: white;
        }

        .division {
            border: none;
            border-top: 1px solid white;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <?php include("nav login.php"); ?>
    <div class="container">
        <h3>Admin Login</h3>
        <form action="" method="post">
            <input class="form-control" type="text" name="username" placeholder="Username" required />
            <input class="form-control" type="password" name="password" placeholder="Password" required />
            <button type="submit" class="btn btn-login">Sign In</button>
            <div class="forgotPassClass">
                <a id="forgotPass" href="www.google.com">Forgotten password?</a>
            </div>
            <div class="division">
                <hr>
            </div>
            <button type="button" id="myButton" class="btn btn-admin">User Login</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        document.getElementById("myButton").addEventListener("click", function () {
            window.location.href = "../login.php";
        });
    </script>
</body>

</html>
