<?php

include(realpath($_SERVER["DOCUMENT_ROOT"]).'\portfolio_php\repository\usersRepository.php');

if(isset($_POST) && !empty($_POST['username']) && !empty($_POST['password']))
{

    $user_name = $_POST['username'];
    $password = $_POST['password'];

    if(!empty($user_name) && !empty($password) && !is_numeric($user_name)) 
    {
        $con = mysqli_connect(SERVERNAME, USERNAME, PASSWORD, DBNAME, 3307);
        //read from db
        $query = "select * from users where username = '$user_name' limit 1";

        $result = mysqli_query($con, $query);

        if($result)
        {
            if($result && mysqli_num_rows($result) > 0){
                $user_data = mysqli_fetch_assoc($result);

                if($user_data['password'] == $password)
                {

                    $_SESSION['user_id'] = $user_data['id'];

                    session_start();


                } else {

                    echo "Wrong username or password, try again!";

                }
            }
        }

    } else {

        echo "Please enter valid information";

    }
}


?>




