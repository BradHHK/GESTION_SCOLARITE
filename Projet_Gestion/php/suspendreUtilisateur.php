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
            $statement = $con->prepare("UPDATE accounts set statut = 'Suspendu' where id_accounts = ?");
            $statement->bind_param("i", $id);
           
            $id = $_GET["id_account"];
        
            if($statement->execute()){
                $message ="Compte  <br>
                Compte suspendu avec succès<br>
                ";
                $link = "suspendreUtilisateurListe.php";
                displayInfo($message, $link); 
            }else{
                $message ="Erreur Inconnu";
                $link = "suspendreUtilisateurListe.php";
                displayInfo($message, $link);
            }
        } catch (Exception $ex) {
            $message ="Erreur ".$ex->getMessage();
            $link = "suspendreUtilisateurListe.php";
            displayInfo($message, $link);
        }
        
        
    }else{
        $message = "Veillez remplir tout les champs";
        $link = "suspendreUtilisateurListe.php";
        displayInfo($message, $link);
    }
 ?>