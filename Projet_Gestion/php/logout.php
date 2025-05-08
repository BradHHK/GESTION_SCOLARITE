<?php
    require_once "db_connect.php";
    require_once "functions.php";
    session_destroy();
    $con->close();
    header("location:../login.html");
 ?>