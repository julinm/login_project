<?php

include_once(realpath($_SERVER["DOCUMENT_ROOT"]).'\portfolio_php\helpers\constants.php');

if(!$con = mysqli_connect(SERVERNAME, USERNAME, PASSWORD, DBNAME, 3307))
{

    die("failed to connect");
}

?>