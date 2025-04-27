<?php
    require_once "db_connect.php";
    require_once "functions.php";

    if(isset($_POST["Login"]) && isset($_POST["Password"]) && isset($_POST["role"]) ){
        session_start();
        // $_SESSION["Login"]=
        
    }else{
       $message = "Veillez remplir tout les champs svp!";
        displayInfoLogin($message);
    }
?>