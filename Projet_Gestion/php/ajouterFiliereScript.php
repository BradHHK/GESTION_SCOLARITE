<?php 
    session_start();
    if(!isset($_SESSION["AdminLogin"]) || !isset($_SESSION["AdminPassword"])){
        header("location:../adminLogin.html");
    }
?>
<?php
    require_once "db_connect.php";
    require_once "functions.php";

    if(isset($_POST["Nom"])){ 
        try {            
            $statement = $con->prepare("INSERT INTO filieres(nom_filiere) VALUE(?)");
            $statement->bind_param("s", $nom);
            $nomBrut = $_POST["Nom"];
            $nom = ucwords(strtolower($nomBrut));        
            if($statement->execute()){
                $message ="Filiere  <br>
                Nom  : ".$nom." <br>
                <br> ajouter avec succès ";
                $link = "ajouterFiliere.php";
                displayInfo($message, $link); 
            }else{
                $message ="Erreur Inconnu";
                $link = "ajouterFiliere.php";
                displayInfo($message, $link);
            }
        } catch (Exception $ex) {
            $message ="Erreur ".$ex->getMessage();
            $link = "ajouterFiliere.php";
            displayInfo($message, $link);
        }
        
        
    }else{
        $message = "Veillez remplir tout les champs";
        $link = "ajouterFiliere.php";
        displayInfo($message, $link);
    }
 ?>