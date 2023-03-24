<?php
session_start();

include("repository.php");
include("controller.php");

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];

    if(!empty($user_name) && !empty($password) && !is_numeric($user_name)) 
    {

        //save to db
        $user_id = random_num(20);
        $query = "insert into users (user_id, user_name, password) values ('$user_id', '$user_name', '$password')";

        mysqli_query($con, $query);

        header("Location: login.php");
        die;

    } else {

        echo "Please enter valid information";

    }
}

?>

<html>
    <head>
        <title>Sign up</title>
        <link rel="stylesheet" type="text/css" href="style.css" />

    </head>
    <body>
        <div class="container">
            <h4>Sing up!</h4>
            <form action="" method="POST" class="box">
                <input type="text" name="user_name" placeholder="User Name">
                <input type="password" name="password" placeholder="Password">
                <input class = "btn"type="submit" value="signup">
            </form>
            <a href="login.php" class="signup">If you already have an account, click to Log in</a>

        </div>
    </body>
</html>
