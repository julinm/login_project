<?php

session_start();

include("repository.php");
include("controller.php");

$user_data = check_login($con);

?>


<!DOCTYPE html>
<html>
    <head>
        <title>
            Login Project
        </title>
    </head>
    <body>
        <a href=".\logout.php"> Logout</a>
        <h1> index </h1>

        <br>

        Hello, <?= $user_data['user_name']?>
    </body>
</html>
