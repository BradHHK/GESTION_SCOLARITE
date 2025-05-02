<?php
    session_start(); 
    require_once "db_connect.php";
    require_once "functions.php";

    if(isset($_POST["Nom"]) && isset($_POST["Prenom"]) && isset($_POST["email"]) && isset($_SESSION["id_enseignant"])){
           
        try {            
            $statement = $con->prepare("UPDATE enseignants set nom = ?, prenom = ?, email = ? where id_enseignant = ?");
            $statement->bind_param("sssi",$nom, $prenom, $email, $id_enseignant);
            $nomBrut = $_POST["Nom"];
            $nom = ucwords(strtolower($nomBrut));
            $prenomBrut = $_POST["Prenom"];
            $prenom = ucwords(strtolower($prenomBrut));
            $email = $_POST["email"];
            $id_enseignant = $_SESSION["id_enseignant"];
        
            if($statement->execute()){
                $message ="Enseignant  <br>
                Nom et Prenom : ".$nom." ".$prenom."<br>
                Email : ".$email." <br> modifié(e) avec succès ";
                $link = "afficherEnseignant.php";
                displayInfo($message, $link); 
            }else{
                $message ="Erreur Inconnu";
                $link = "afficherEnseignant.php";
                displayInfo($message, $link);
            }
        } catch (Exception $ex) {
            $message ="Erreur ".$ex->getMessage();
            $link = "afficherEnseignant.php";
            displayInfo($message, $link);
        }
        
        
    }else{
        $message = "Veillez remplir tout les champs";
        $link = "afficherEnseignante.php";
        displayInfo($message, $link);
    }
 ?>