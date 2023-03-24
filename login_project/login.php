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
        $con = new mysqli(SERVERNAME, USERNAME, PASSWORD, DBNAME, 3307);
        //read from db
        $query = "select * from users where user_name = '$user_name' limit 1";

        $result = mysqli_query($con, $query);

        if($result)
        {
            if($result && mysqli_num_rows($result) > 0){
                $user_data = mysqli_fetch_assoc($result);

                if($user_data['password'] == $password)
                {
                    $_SESSION['user_id'] = $user_data['user_id'];
                    header("Location: index.php");
                    die;
                }
            }
        }

        echo "Wrong username or password, try again!";


    } else {

        echo "Please enter valid information";

    }
}


?>


<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" type="text/css" href="style.css" />

    </head>
        <div class="container">
            <h4>Log in into your account</h4>
            <form action="" method="POST" class="box">
                <input type="text" name="user_name" placeholder="User Name">
                <input type="password" name="password" placeholder="Password">
                <input type="submit" value="Log in"  class="btn"><br><br>
            </form>
            <a href="signup.php" class="signup">If you don't have an account yet, click to Sign up!</a>

        </div>
</html>


