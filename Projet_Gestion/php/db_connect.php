<?php
    $user = "root";
    $password = "";
    $data_base = "gestion_scolarite";

    $con = new PDO("mysql:host=localhost; dbname=$data_base; ", $user, $password);
    if(!$con){
        echo"Connection impossible echec";
    }
?>