<?php


if(isset($_SESSION['user_id']))
{

    unset($_SESSION['user_id']);
}

header("Location: \\portfolio_php\\view\index.php");
?>