<?php 
    session_start();
    if(!isset($_SESSION["Login"]) || !isset($_SESSION["Password"]) || !isset($_SESSION["id_utilisateurs_etudiant"])){
        header("location:../Login.html");
    }
?>
<?php
    require_once "db_connect.php";
    require_once "functions.php";

    if(isset($_POST["Motif"]) && isset($_POST["matiere"])){
   
        try {            

            $targetDirRq = "../Documents/Requetes/";
            $targetFileRq = $targetDirRq.$_SESSION["id_utilisateurs_etudiant"]."_".basename($_FILES["reqete"]["name"]);

            if((move_uploaded_file($_FILES["reqete"]["tmp_name"], $targetFileRq))){

                $targetFileRq = $_SESSION["id_utilisateurs_etudiant"]."_".basename($_FILES["reqete"]["name"]);
                $statement = $con->prepare("INSERT INTO requete(id_etudiant, id_matiere, motif, date_de_depot, lien_de_la_requete) VALUES(?,?,?,NOW(),?)");
                $statement->bind_param("iiss",$id_etudiant, $id_matiere, $motif, $lien);
                $id_etudiant=$_SESSION["id_utilisateurs_etudiant"];
                $id_matiere=$_POST["matiere"];
                $motif = $_POST["Motif"];
                $date = date('Y-D-M');
                $lien = $targetFileRq;
            
                if($statement->execute()){
                    $message ="Requête  <br>
                    Motif : ".$motif."<br>
                    Date : ".$date."<br>
                    <br> déposée avec succès ";
                    $link = "etudiantPanel.php";
                    displayInfo($message, $link); 
                }else{
                    $message ="Erreur Inconnu";
                    $link = "etudiantPanel.php";
                    displayInfo($message, $link);
                }            
            }else{
                echo"Erreur";
            }

            
        } catch (Exception $ex) {
            $message ="Erreur ".$ex->getMessage();
            $link = "ajouterEnseigant.php";
            displayInfo($message, $link);
        }
        
        
    }else{
        $message = "Veillez remplir tout les champs";
        $link = "ajouterEnseignant.php";
        displayInfo($message, $link);
    }
 ?>