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
        <title>Singup</title>
    </head>
    <body>
        <div id="box">
            <form action="" method="POST">
                <div>Singup</div>
                <input type="text" name="user_name"><br><br>
                <input type="password" name="password"><br><br>
                <input type="submit" value="singup"><br><br>
                <a href="login.php">Click to Login</a><br><br>
            </form>
        </div>
    </body>
</html>