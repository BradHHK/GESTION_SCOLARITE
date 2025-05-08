<?php 
    session_start();
    if(!isset($_SESSION["AdminLogin"]) || !isset($_SESSION["AdminPassword"])){
        header("location:../adminLogin.html");
    }
?>
<?php
    
    require_once "db_connect.php";
    require_once "functions.php";

    if(isset($_POST["id_compte"]) && isset($_POST["Password"])){
           
        try {            
            $statement = $con->prepare("UPDATE accounts set password = ? where id_accounts = ?");
            $statement->bind_param("si", $hash,$id);
            $password = $_POST["Password"];
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $id = $_POST["id_compte"];
        
            if($statement->execute()){
                $message ="Compte  <br>
                Mot de passe modifié avec succès<br>
                Nouveau mot de passe : $password
                ";
                $link = "adminPanel.php";
                displayInfo($message, $link); 
            }else{
                $message ="Erreur Inconnu";
                $link = "adminPanel.php";
                displayInfo($message, $link);
            }
        } catch (Exception $ex) {
            $message ="Erreur ".$ex->getMessage();
            $link = "adminPanel.php";
            displayInfo($message, $link);
        }
        
        
    }else{
        $message = "Veillez remplir tout les champs";
        $link = "adminPanel.php";
        displayInfo($message, $link);
    }
 ?>