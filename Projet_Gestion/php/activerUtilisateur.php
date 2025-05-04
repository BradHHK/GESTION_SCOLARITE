<?php 
    session_start();
    if(!isset($_SESSION["AdminLogin"]) || !isset($_SESSION["AdminPassword"])){
        header("location:../adminLogin.html");
    }
?>
<?php
    
    require_once "db_connect.php";
    require_once "functions.php";

    if(isset($_GET["id_account"]) && is_numeric($_GET["id_account"])){
           
        try {            
            $statement = $con->prepare("UPDATE accounts set statut = 'Activé' where id_accounts = ?");
            $statement->bind_param("i", $id);
           
            $id = $_GET["id_account"];
        
            if($statement->execute()){
                $message ="Compte  <br>
                Compte activé avec succès<br>
                ";
                $link = "activerUtilisateurListe.php";
                displayInfo($message, $link); 
            }else{
                $message ="Erreur Inconnu";
                $link = "activerUtilisateurListe.php";
                displayInfo($message, $link);
            }
        } catch (Exception $ex) {
            $message ="Erreur ".$ex->getMessage();
            $link = "activerUtilisateurListe.php";
            displayInfo($message, $link);
        }
        
        
    }else{
        $message = "Veillez remplir tout les champs";
        $link = "activerUtilisateurListe.php";
        displayInfo($message, $link);
    }
 ?>