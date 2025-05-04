<?php 
    session_start();
    if(!isset($_SESSION["AdminLogin"]) || !isset($_SESSION["AdminPassword"])){
        header("location:../adminLogin.html");
    }
?>
<?php
    
    require_once "db_connect.php";
    require_once "functions.php";

    if(isset($_POST["Nom"]) && isset($_POST["Prenom"]) && isset($_POST["filiere"]) && isset($_POST["dateNaissance"]) && isset($_SESSION["id_etudiant"])){
           
        try {            
            $statement = $con->prepare("UPDATE etudiants set nom = ?, prenom = ?, date_naissance = ?, id_filiere = ? where id_etudiant = ?");
            $statement->bind_param("sssii",$nom, $prenom, $dateNaissance, $id_filiere, $id_etudiant);
            $nomBrut = $_POST["Nom"];
            $nom = ucwords(strtolower($nomBrut));
            $prenomBrut = $_POST["Prenom"];
            $prenom = ucwords(strtolower($prenomBrut));
            $dateNaissance = $_POST["dateNaissance"];
            $id_filiere = $_POST["filiere"];
            $id_etudiant = $_SESSION["id_etudiant"];
        
            if($statement->execute()){
                $message ="Etudiant  <br>
                Nom et Prenom : ".$nom." ".$prenom."<br>
                date de naissance : ".$dateNaissance." <br> modifié(e) avec succès ";
                $link = "modifierEtudiantListe.php";
                displayInfo($message, $link); 
            }else{
                $message ="Erreur Inconnu";
                $link = "modifierEtudiantListe.php";
                displayInfo($message, $link);
            }
        } catch (Exception $ex) {
            $message ="Erreur ".$ex->getMessage();
            $link = "modifierEtudiantListe.php";
            displayInfo($message, $link);
        }
        
        
    }else{
        $message = "Veillez remplir tout les champs";
        $link = "modifierEtudiantListe.php";
        displayInfo($message, $link);
    }
 ?>