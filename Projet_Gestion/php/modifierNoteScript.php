<?php 
    session_start();
    if(!isset($_SESSION["Login"]) || !isset($_SESSION["Password"]) || !isset($_SESSION["id_utilisateurs_enseignant"])){
        header("location:../Login.html");
    }
?>
<?php
    require_once "db_connect.php"; 
    require_once "functions.php";   
    try {
        if (isset($_POST["matiere"]) && isset($_POST["etudiant"]) && isset($_POST["note"])) {
            $statement = $con->prepare("UPDATE evaluations SET note = ? WHERE id_etudiant = ? AND id_matiere = ? ");
            $statement->bind_param("dii", $note, $id_etudiant, $id_matiere);
            $id_etudiant = $_POST["etudiant"];
            $id_matiere = $_POST["matiere"];
            $note = $_POST["note"];
            if($statement->execute()){
                $message ="EVALUATION  <br>
                Note  : ".$note." <br>
                <br> Note modifiée avec succès ";
                $link = "enseignantPanel.php";
                displayInfo($message, $link); 
            }else{
                $message ="Erreur Inconnu";
                $link = "enseignantPanel.php";
                displayInfo($message, $link);
            }
        }else{
            $message = "Veillez remplir tout les champs";
            $link = "enseignantPanel.php";
            displayInfo($message, $link);
        }
    }catch (Exception $ex) {
        $message = "Erreur ".$ex->getMessage();
        $link = "enseignantPanel.php";
        displayInfo($message, $link);
    }
?>