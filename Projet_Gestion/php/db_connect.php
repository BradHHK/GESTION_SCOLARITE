<?php
    $serveur = "localhost";
    $user = "root";
    $password = "";
    $data_base = "gestion_scolarite";

    $con = new mysqli($serveur, $user, $password, $data_base);
    if($con->connect_error){
        die("Erreur de connection ".$con->connect_error);
    }
?>