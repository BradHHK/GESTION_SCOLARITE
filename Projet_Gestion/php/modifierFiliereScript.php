<?php 
    session_start();
    if(!isset($_SESSION["AdminLogin"]) || !isset($_SESSION["AdminPassword"])){
        header("location:../adminLogin.html");
    }
?>
<?php
    session_start(); 
    require_once "db_connect.php";
    require_once "functions.php";

    if(isset($_POST["Nom"])){
           
        try {            
            $statement = $con->prepare("UPDATE filieres set nom_filiere = ? WHERE id_filiere = ?");
            $statement->bind_param("si",$nom, $id_filiere);
            
            $nomBrut = $_POST["Nom"];
            $nom = ucwords(strtolower($nomBrut));
            $id_filiere = $_SESSION["id_filiere"];
            
        
            if($statement->execute()){
                $message ="Filiere  <br>
                Nom : ".$nom." <br><br><br> Modifié avec succès";
                $link = "modifierFiliereListe.php";
                displayInfo($message, $link); 
            }else{
                $message ="Erreur Inconnu";
                $link = "modifierFiliereListe.php";
                displayInfo($message, $link);
            }
        } catch (Exception $ex) {
            $message ="Erreur ".$ex->getMessage();
            $link = "modifierFiliereListe.php";
            displayInfo($message, $link);
        }
        
        
    }else{
        $message = "Veillez remplir tout les champs";
        $link = "modifierFiliereListe.php";
        displayInfo($message, $link);
    }
 ?>