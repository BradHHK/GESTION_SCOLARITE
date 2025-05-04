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

    if(isset($_POST["Nom"]) && isset($_POST["filiere"]) && isset($_POST["enseignant"]) && isset($_SESSION["id_matiere"])){
           
        try {            
            $statement = $con->prepare("UPDATE matieres set nom_matiere = ?, id_enseignant = ?, id_filiere = ? where id_matiere = ?");
            $statement->bind_param("siii",$nom, $id_enseignant, $id_filiere, $id_matiere);
            $matricule=genererMatricule(7);
            $nomBrut = $_POST["Nom"];
            $nom = ucwords(strtolower($nomBrut));
            $id_enseignant = $_POST["enseignant"];
            $id_filiere = $_POST["filiere"];
            $id_matiere = $_SESSION["id_matiere"];
        
            if($statement->execute()){
                $message ="Matiere  <br>
                Nom : ".$nom." <br><br><br> Modifié avec succès";
                $link = "modifierMatiereListe.php";
                displayInfo($message, $link); 
            }else{
                $message ="Erreur Inconnu";
                $link = "modifierMatiereListe.php";
                displayInfo($message, $link);
            }
        } catch (Exception $ex) {
            $message ="Erreur ".$ex->getMessage();
            $link = "modifierMatiereListe.php";
            displayInfo($message, $link);
        }
        
        
    }else{
        $message = "Veillez remplir tout les champs";
        $link = "modifierMatiereListe.php";
        displayInfo($message, $link);
    }
 ?>