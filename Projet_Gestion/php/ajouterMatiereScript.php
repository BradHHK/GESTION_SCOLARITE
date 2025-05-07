<?php 
    session_start();
    if(!isset($_SESSION["AdminLogin"]) || !isset($_SESSION["AdminPassword"])){
        header("location:../adminLogin.html");
    }
?>
<?php
    require_once "db_connect.php";
    require_once "functions.php";

    if(isset($_POST["Nom"]) && isset($_POST["filiere"]) && isset($_POST["enseignant"])){

        try {            
            $statement = $con->prepare("INSERT INTO matieres(nom_matiere, id_enseignant, id_filiere) VALUES(?,?,?)");
            $statement->bind_param("sii",$nom, $id_enseignant, $id_filiere);
            $matricule=genererMatricule(7);
            $nomBrut = $_POST["Nom"];
            $nom = ucwords(strtolower($nomBrut));
            $id_enseignant = $_POST["enseignant"];
            $id_filiere = $_POST["filiere"];
        
            if($statement->execute()){
                $message ="Matiere  <br>
                Nom : ".$nom." <br><br><br> Ajoutez avec succès";
                $link = "ajouterMatiere.php";
                displayInfo($message, $link); 
            }else{
                $message ="Erreur Inconnu";
                $link = "ajouterMatiere.php";
                displayInfo($message, $link);
            }
        } catch (Exception $ex) {
            $message ="Erreur ".$ex->getMessage();
            $link = "ajouterMatiere.php";
            displayInfo($message, $link);
        }
        
        
    }else{
        $message = "Veillez remplir tout les champs";
        $link = "ajouterEtudiant.php";
        displayInfo($message, $link);
    }
 ?>