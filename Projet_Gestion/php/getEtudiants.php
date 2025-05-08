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
        if (isset($_POST["id_matiere"])) {
            $id_matiere = intval($_POST["id_matiere"]);
            $id_enseignant = $_SESSION["id_utilisateurs_enseignant"];

            $stat = $con->prepare("SELECT * FROM matieres as mat, enseignants as ens, etudiants as etu, filieres as fil where ( mat.id_filiere = fil.id_filiere AND etu.id_filiere = fil.id_filiere AND ens.id_enseignant = ? AND mat.id_matiere = ?)");
            $stat->bind_param("ii", $id_enseignant, $id_matiere);
            $stat->execute();
            $results = $stat->get_result();

            
            $response = "<option value=''>--SELECTIONNER L'ÉTUDIANT--</option>";

    
            while ($rows = $results->fetch_assoc()) {
                $response .= "<option value='" . $rows['id_etudiant'] . "'>". $rows['nom'] . "</option>";
            }

        
            echo $response;
        }

        if (isset($_POST["id_matiereModif"])) {
            $id_matiere = intval($_POST["id_matiereModif"]);
            $id_enseignant = $_SESSION["id_utilisateurs_enseignant"];

            $stat = $con->prepare("SELECT * FROM matieres as mat, enseignants as ens, etudiants as etu, filieres as fil, evaluations as eval where ( mat.id_filiere = fil.id_filiere AND etu.id_filiere = fil.id_filiere AND etu.id_etudiant = eval.id_etudiant AND mat.id_matiere = eval.id_matiere AND ens.id_enseignant = ? AND mat.id_matiere = ?)");
            $stat->bind_param("ii", $id_enseignant, $id_matiere);
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