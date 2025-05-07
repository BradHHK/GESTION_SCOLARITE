<?php 
    session_start();
    if(!isset($_SESSION["AdminLogin"]) || !isset($_SESSION["AdminPassword"])){
        header("location:../adminLogin.html");
    }
?>
<?php
    require_once "db_connect.php";
    require_once "functions.php";

    if(isset($_POST["Nom"]) && isset($_POST["Prenom"]) && isset($_POST["dateNaissance"]) && isset($_POST["filiere"])){
           
        try {            
            $statement = $con->prepare("INSERT INTO etudiants(Matricule, nom, prenom, date_naissance, id_filiere) VALUES(?,?,?,?,?)");
            $statement->bind_param("ssssi",$matricule, $nom, $prenom, $dateNaissance, $id_filiere);
            $matricule=genererMatricule(7);
            $nomBrut = $_POST["Nom"];
            $nom = ucwords(strtolower($nomBrut));
            $prenomBrut = $_POST["Prenom"];
            $prenom = ucwords(strtolower($prenomBrut));
            $dateNaissance = $_POST["dateNaissance"];
            $id_filiere = $_POST["filiere"];
        
            if($statement->execute()){
                $message ="Etudiant  <br>
                Matricule : ".$matricule."<br>
                Nom et Prenom : ".$nom." ".$prenom."<br>
                date de naissance : ".$dateNaissance." <br> Inscrit avec succès ";
                $link = "ajouterEtudiant.php";
                displayInfo($message, $link); 
            }else{
                $message ="Erreur Inconnu";
                $link = "ajouterEtudiant.php";
                displayInfo($message, $link);
            }
        } catch (Exception $ex) {
            $message ="Erreur ".$ex->getMessage();
            $link = "ajouterEtudiant.php";
            displayInfo($message, $link);
        }
        
        
    }else{
        $message = "Veillez remplir tout les champs";
        $link = "ajouterEtudiant.php";
        displayInfo($message, $link);
    }
 ?>