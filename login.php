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
    </head>
    <body>
        <div id="box">
            <form action="" method="POST">
                <div>Login</div>
                <input type="text" name="user_name"><br><br>
                <input type="password" name="password"><br><br>
                <input type="submit" value="Login"><br><br>
                <a href="singup.php">Click to Singup</a><br><br>
            </form>
        </div>
    </body>
</html>