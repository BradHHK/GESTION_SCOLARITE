<?php 
    session_start();
    if(!isset($_SESSION["AdminLogin"]) || !isset($_SESSION["AdminPassword"])){
        header("location:../adminLogin.html");
    }
?>
<?php
    require_once "db_connect.php"; 
    require_once "functions.php";   
    session_start();
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
                $link = "attribuerNote.php?id=".$_SESSION['id_enseignant']."";
                displayInfo($message, $link); 
            }else{
                $message ="Erreur Inconnu";
                $link = "attribuerNote.php?id=".$_SESSION['id_enseignant']."";
                displayInfo($message, $link);
            }
        }else{
            $message = "Veillez remplir tout les champs";
            $link = "attribuerNote.php?id=".$_SESSION['id_enseignant']."";
            displayInfo($message, $link);
        }
    }catch (Exception $ex) {
        $message = "Erreur ".$ex->getMessage();
        $link = "afficherMatiere.php";
        displayInfo($message, $link);
    }
?>