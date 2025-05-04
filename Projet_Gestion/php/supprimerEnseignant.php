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
            
                $statement = $con->prepare("DELETE FROM enseignants where id_enseignant = ?");
                $statement->bind_param("i", $id_enseignant);
                $id_enseignant = $_GET["id"];
            
                if($statement->execute()){
                    
                    $message ="<br> Enseignant supprimé avec succès ";
                    $link = "supprimerListeEnseignant.php";
                    displayInfo($message, $link);
                            
                }else{
                    $message = "Erreur enseignant inconnu(e)";
                    $link = "supprimerListeEnseignant.php";
                    displayInfo($message, $link);
                }
            
        } catch (Exception $ex) {
            $message ="Erreur ".$ex->getMessage();
            $link = "supprimerListeEnseignant.php";
            displayInfo($message, $link);
        }
        
        
    }else{
        $message = "Erreur supprission impossible !";
        $link = "supprimerListeEnseignant.php";
        displayInfo($message, $link);
    }
 ?>