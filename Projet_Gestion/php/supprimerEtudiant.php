<?php 
    session_start();
    if(!isset($_SESSION["AdminLogin"]) || !isset($_SESSION["AdminPassword"])){
        header("location:../adminLogin.html");
    }
?>
<?php


    require_once "db_connect.php";
    require_once "functions.php";

    if(isset($_GET["id"]) && is_numeric($_GET["id"])){
        
        try {
            
                $statement = $con->prepare("DELETE FROM etudiants where id_etudiant = ?");
                $statement->bind_param("i", $id_etudiant);
                $id_etudiant = $_GET["id"];
            
                if($statement->execute()){
                    
                    $message ="<br> Etudiant(e) supprimé(e) avec succès ";
                    $link = "supprimerListeEtudiant.php";
                    displayInfo($message, $link);
                            
                }else{
                    $message = "Erreur etudiant inconnu(e)";
                    $link = "supprimerListeEtudiant.php";
                    displayInfo($message, $link);
                }
            
        } catch (Exception $ex) {
            $message ="Erreur ".$ex->getMessage();
            $link = "supprimerListeEtudiant.php";
            displayInfo($message, $link);
        }
        
        
    }else{
        $message = "Erreur supprission impossible !";
        $link = "supprimerListeEtudiant.php";
        displayInfo($message, $link);
    }
 ?>