<?php

session_start();

include("repository.php");
include("controller.php");

$user_data = check_login($con);

?>


<!DOCTYPE html>

<html>
    <head>
        <title>Login Project</title>
        <link rel="stylesheet" type="text/css" href="style.css" />

    </head>
    <body>
        <div class="container">
            <h4> Hello, <?= $user_data['user_name']?></h4>

            <p> New project coming soon...</p>

            <a href=".\logout.php"> Log out</a>
        </div>
    </body>
</html>
