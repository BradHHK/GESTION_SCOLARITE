<?php
    require_once "db_connect.php";
    require_once "functions.php";

    if(isset($_POST["Nom"]) && isset($_POST["Prenom"]) && isset($_POST["email"])){
        session_start();    
        try {            
            $statement = $con->prepare("INSERT INTO enseignants(Matricule, nom, prenom, email) VALUES(?,?,?,?)");
            $statement->bind_param("ssss",$matricule, $nom, $prenom, $email);
            $matricule=genererMatriculeEnseignant(7);
            $nomBrut = $_POST["Nom"];
            $nom = ucwords(strtolower($nomBrut));
            $prenomBrut = $_POST["Prenom"];
            $prenom = ucwords(strtolower($prenomBrut));
            $email = $_POST["email"];
        
            if($statement->execute()){
                $message ="Enseignant  <br>
                Matricule : ".$matricule."<br>
                Nom et Prenom : ".$nom." ".$prenom."<br>
                Email : ".$email." <br> ajouté avec succès ";
                $link = "ajouterEnseignant.php";
                displayInfo($message, $link); 
            }else{
                $message ="Erreur Inconnu";
                $link = "ajouterEnseignant.php";
                displayInfo($message, $link);
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