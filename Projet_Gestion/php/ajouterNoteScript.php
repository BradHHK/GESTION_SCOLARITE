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
        if (isset($_POST["matiere"]) && isset($_POST["etudiant"]) && isset($_POST["note"]) && isset($_POST["date_d_evaluation"]) ) {
            $statement = $con->prepare("INSERT INTO evaluations(id_etudiant, id_matiere, note, date_evaluation) VALUE(?,?,?,?)");
            $statement->bind_param("iids", $id_etudiant, $id_matiere, $note, $date_naissance);
            $id_etudiant = $_POST["etudiant"];
            $id_matiere = $_POST["matiere"];
            $note = $_POST["note"];
            $date_naissance = $_POST["date_d_evaluation"];
            if($statement->execute()){
                $message ="EVALUATION  <br>
                Note  : ".$note." <br>
                Date  : ".$date_naissance." <br>
                <br> Note attribué avec succès ";
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