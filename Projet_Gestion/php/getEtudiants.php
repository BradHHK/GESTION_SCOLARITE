<?php
    require_once "db_connect.php"; 
    require_once "functions.php";   
    session_start();
    try {
        if (isset($_POST["id_matiere"])) {
            $id_matiere = intval($_POST["id_matiere"]);
            $id_enseignant = $_SESSION["id_enseignant"];

            $stat = $con->prepare("SELECT * FROM matieres as mat, enseignants as ens, etudiants as etu, filieres as fil where (ens.id_enseignant = mat.id_enseignant AND mat.id_filiere = fil.id_filiere AND etu.id_filiere = fil.id_filiere AND ens.id_enseignant = ? AND mat.id_matiere = ?)");
            $stat->bind_param("ii", $id_enseignant, $id_matiere,);
            $stat->execute();
            $results = $stat->get_result();

            
            $response = "<option value=''>--SELECTIONNER L'ÉTUDIANT--</option>";

    
            while ($rows = $results->fetch_assoc()) {
                $response .= "<option value='" . $rows['id_etudiant'] . "'>". $rows['nom'] . "</option>";
            }

        
            echo $response;
        }
    }catch (Exception $ex) {
        $message = "Erreur ".$ex->getMessage();
        $link = "afficherMatiere.php";
        displayInfo($message, $link);
    }
?>