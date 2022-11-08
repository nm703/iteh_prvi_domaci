
<?php

include "process.php";

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--<link rel="stylesheet--->
    <link rel="icon" href="images/login.png" />
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="./js/main.js"></script>

        <!-- jQuery library -->
        <script src="js/jquery.min.js"></script>


        <!-- Latest compiled JavaScript -->
        <script src="js/bootstrap.min.js"></script>

            <!-- <link rel="stylesheet" href="css/style.css"> -->
    <title>Trkacki Forum</title>
</head>

<body>
    <div class="login-form">
        <div class="main-div">
            <form method="POST" action="#">
                <h1>Trkacki forum</h1>
                <div class="imgcontainer">
                    <!-- <img src="images/login.png"> -->
                </div>
                <div class="container">
                    <input type="text" placeholder="Email" name="log_email" id = "log_email" class="form-control" required>
                    <br>
                    <input type="password" placeholder="Password" name="log_password" id = "log_password" class="form-control" required>
                    <br>
                    <button class="btn" type="sumbit">Prijavi se</button>
                </div>
            </form>
        </div>
</body>

</html>