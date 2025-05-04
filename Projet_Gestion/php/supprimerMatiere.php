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
        session_start();
        try {
            
                $statement = $con->prepare("DELETE FROM matieres where id_matiere = ?");
                $statement->bind_param("i", $id_etudiant);
                $id_etudiant = $_GET["id"];
            
                if($statement->execute()){
                    
                    $message ="<br> Matiere supprimée avec succès ";
                    $link = "supprimerMatiereListe.php";
                    displayInfo($message, $link);
                            
                }else{
                    $message = "Erreur etudiant inconnu(e)";
                    $link = "supprimerMatiereListe.php";
                    displayInfo($message, $link);
                }
            
        } catch (Exception $ex) {
            $message ="Erreur ".$ex->getMessage();
            $link = "supprimerMatiereListe.php";
            displayInfo($message, $link);
        }
        
        
    }else{
        $message = "Erreur supprission impossible !";
        $link = "supprimerMatiereListe.php";
        displayInfo($message, $link);
    }
 ?>