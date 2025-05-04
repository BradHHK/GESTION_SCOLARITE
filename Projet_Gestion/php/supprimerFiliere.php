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
            
                $statement = $con->prepare("DELETE FROM filieres where id_filiere = ?");
                $statement->bind_param("i", $id_filiere);
                $id_filiere = $_GET["id"];
            
                if($statement->execute()){
                    
                    $message ="<br> Filiere supprimée avec succès ";
                    $link = "supprimerFiliereListe.php";
                    displayInfo($message, $link);
                            
                }else{
                    $message = "Erreur filiere inconnu(e)";
                    $link = "supprimerFiliereListe.php";
                    displayInfo($message, $link);
                }
            
        } catch (Exception $ex) {
            $message ="Erreur ".$ex->getMessage();
            $link = "supprimerFiliereListe.php";
            displayInfo($message, $link);
        }
        
        
    }else{
        $message = "Erreur supprission impossible !";
        $link = "supprimerFiliereListe.php";
        displayInfo($message, $link);
    }
 ?>