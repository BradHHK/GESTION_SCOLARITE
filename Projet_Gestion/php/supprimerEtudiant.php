<?php
    require_once "db_connect.php";
    require_once "functions.php";

    if(isset($_GET["id"]) && is_numeric($_GET["id"])){
        session_start();
        try {
            
                $statement = $con->prepare("DELETE FROM etudiants where id_etudiant = ?");
                $statement->bind_param("i", $id_etudiant);
                $id_etudiant = $_GET["id"];
            
                if($statement->execute()){
                    
                    $message ="<br> Etudiant(e) supprimé(e) avec succès ";
                    $link = "afficherEtudiant.php";
                    displayInfo($message, $link);
                            
                }else{
                    $message = "Erreur etudiant inconnu(e)";
                    $link = "afficherEtudiant.php";
                    displayInfo($message, $link);
                }
            
        } catch (Exception $ex) {
            $message ="Erreur ".$ex->getMessage();
            $link = "afficherEtudiant.php";
            displayInfo($message, $link);
        }
        
        
    }else{
        $message = "Erreur supprission impossible !";
        $link = "afficherEtudiant.php";
        displayInfo($message, $link);
    }
 ?>