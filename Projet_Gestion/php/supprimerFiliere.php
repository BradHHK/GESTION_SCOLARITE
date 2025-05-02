<?php
    require_once "db_connect.php";
    require_once "functions.php";

    if(isset($_GET["id"]) && is_numeric($_GET["id"])){
        session_start();
        try {
            
                $statement = $con->prepare("DELETE FROM matieres where id_matiere = ?");
                $statement->bind_param("i", $id_etudiant);
                $id_etudiant = $_GET["id"];
            
                if($statement->execute()){
                    
                    $message ="<br> Filiere supprimée avec succès ";
                    $link = "afficherFiliere.php";
                    displayInfo($message, $link);
                            
                }else{
                    $message = "Erreur filiere inconnu(e)";
                    $link = "afficherFiliere.php";
                    displayInfo($message, $link);
                }
            
        } catch (Exception $ex) {
            $message ="Erreur ".$ex->getMessage();
            $link = "afficherFiliere.php";
            displayInfo($message, $link);
        }
        
        
    }else{
        $message = "Erreur supprission impossible !";
        $link = "afficherFiliere.php";
        displayInfo($message, $link);
    }
 ?>