<?php
    require_once "db_connect.php";
    require_once "functions.php";

    if(isset($_POST["nom_prenom"]) && isset($_POST["id_Etudiant_Enseignant"])){
        session_start();
        $_SESSION["nom_prenom"] = $_POST["nom_prenom"];
        $_SESSION["id_Etudiant_Enseignant"] = $_POST["id_Etudiant_Enseignant"];
        try {
            
                $statement = $con->prepare("SELECT id_administrateur, Nom, prenom FROM administrator where code like ?");
                $statement->bind_param("s", $matricule);
                $nom = $_POST["nom_prenom"];
                $matriculeBrut = $_POST["id_Etudiant_Enseignant"];
                $matricule = strtoupper($matriculeBrut);

                $statement->execute();
                $result = $statement->get_result();
                if($row = $result->fetch_assoc()){
                    $nomrecup = $row["Nom"]." ".$row["prenom"];
                    if(strcmp(ucwords(strtolower($nom)) , $nomrecup)==0){
                        
                        $password = genererPassword(8);
                        $statement = $con->prepare("INSERT INTO accounts(id_proprietaire,login, password, id_role) VALUES(?, ?, ?, ?)");
                        $statement->bind_param("issi",$id_administrateur, $login, $hashPass, $role);
                        $id_administrateur = $row["id_administrateur"];
                        $login = $row["Nom"]."_".$row["prenom"]."@etusoft.ma";    
                        $hashPass = password_hash($password, PASSWORD_DEFAULT);
                        $role = 3;
                        
                        if($statement->execute()){
                            $message ="<br>Bienvenue Mr ".$row['Nom']." ".$row['prenom']." <br><br> Voici vos identifiants de connection : <br> Login  : $login <br> Password : $password <br> <br>!!! Pensez à modifier votre mot de passe après votre connection  ";
                            $link = "../adminLogin.html";
                            displayInfo($message, $link);
                        }
                    }
                    
                }else{
                    $message = "Erreur Administrateur(e) inconnu(e)";
                    $link = "../recuperationCompteAdmin.html";
                    displayInfo($message, $link);
                }
            
        } catch (Exception $ex) {
            $message ="Erreur ".$ex->getMessage();
            $link = "../recuperationCompteAdmin.html";
            displayInfo($message, $link);
        }
        
        
    }else{
        $message = "Veillez remplir tout les champs";
        $link = "../recuperationCompteAdmin.html";
        displayInfo($message, $link);
    }
 ?>