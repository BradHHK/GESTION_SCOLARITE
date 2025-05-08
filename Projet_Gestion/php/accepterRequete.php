<?php 
    session_start();
    if(!isset($_SESSION["Login"]) || !isset($_SESSION["Password"]) || !isset($_SESSION["id_utilisateurs_enseignant"])){
        header("location:../Login.html");
    }

?>
<?php
    require_once "db_connect.php";
    require_once "functions.php";
   
    if (isset($_GET["id_requete"]) && is_numeric($_GET["id_requete"])) {

        try {            
            $statement = $con->prepare("UPDATE requete set statut = 'Acceptée' where id_requete = ?");
            $statement->bind_param("i", $id);
           
            $id = $_GET["id_requete"];
        
            if($statement->execute()){
                $message ="Reqete  <br>
                requête acceptée avec succès<br>
                ";
                $link = "afficherRequete.php";
                displayInfo($message, $link); 
            }else{
                $message ="Erreur Inconnu";
                $link = "afficherRequete.php";
                displayInfo($message, $link);
            }
        } catch (Exception $ex) {
            $message ="Erreur ".$ex->getMessage();
            $link = "afficherRequete.php";
            displayInfo($message, $link);
        }
    } else {
        header("location:afficherRequete.php");
    }

?>