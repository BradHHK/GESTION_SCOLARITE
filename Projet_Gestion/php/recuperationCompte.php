<?php
    require_once "db_connect.php";
    require_once "functions.php";

    if(isset($_POST["nom_prenom"]) && isset($_POST["id_Etudiant_Enseignant"]) && isset($_POST["role"])){
        session_start();
        $_SESSION["nom_prenom"] = $_POST["nom_prenom"];
        $_SESSION["id_Etudiant_Enseignant"] = $_POST["id_Etudiant_Enseignant"];
        $_SESSION["role"] = $_POST["role"];
        try {
            $role = $_POST["role"];
            if(strcmp($role, "enseignant")==0){
                $statement = $con->prepare("SELECT Nom, prenom FROM enseignants where matricule like ?");
                $statement->bind_param("s", $matricule);
                $nom = $_POST["nom_prenom"];
                $matricule = $_POST["id_Etudiant_Enseignant"];

                $statement->execute();
                $result = $statement->get_result();
                if($row = $result->fetch_assoc()){
                    $nomrecup = $row["Nom"]." ".$row["prenom"];
                    if(strcmp($nom, $nomrecup)==0){
                        
                        $password = genererPassword(8);
                        $statement = $con->prepare("INSERT INTO accounts(login, password, id_role) VALUES(?, ?, ?)");
                        $statement->bind_param("ssi", $login, $hashPass, $role);

                        $login = $row["Nom"]."_".$row["prenom"]."@etusoft.ma";    
                        $hashPass = password_hash($password, PASSWORD_DEFAULT);
                        $role = 2;
                        
                        if($statement->execute()){
                            $message ="<br>Bienvenue Mr ".$row['Nom']." ".$row['prenom']." <br><br> Voici vos identifiants de connection : <br> Login  : $login <br> Password : $password <br> <br>!!! Pensez à modifier votre mot de passe après votre connection  ";
                            $link = "../login.html";
                            displayInfo($message, $link);
                        }
                    }
                    
                }else{
                    $message = "Erreur Enseignant(e) inconnu(e)";
                    displayInfoRecuperation($message);
                }
            }

            if(strcmp($role, "etudiant")==0){
                $statement = $con->prepare("SELECT Nom, prenom FROM etudiants where Matricule like ?");
                $statement->bind_param("s", $matricule);
                $nom = $_POST["nom_prenom"];
                $matricule = $_POST["id_Etudiant_Enseignant"];

                $statement->execute();
                $result = $statement->get_result();
                if($row = $result->fetch_assoc()){
                    $nomrecup = $row["Nom"]." ".$row["prenom"];
                    if(strcmp($nom, $nomrecup)==0){
                        
                        $password = genererPassword(8);
                        $statement = $con->prepare("INSERT INTO accounts(login, password, id_role) VALUES(?, ?, ?)");
                        $statement->bind_param("ssi", $login, $hashPass, $role);

                        $login = $row["Nom"]."_".$row["prenom"]."@etusoft.ma";    
                        $hashPass = password_hash($password, PASSWORD_DEFAULT);
                        $role = 1;
                        
                        if($statement->execute()){
                            $message ="<br>Bienvenue Mr ".$row['Nom']." ".$row['prenom']." <br><br> Voici vos identifiants de connection : <br> Login  : $login <br> Password : $password <br> <br>!!! Pensez à modifier votre mot de passe après votre connection  ";
                            $link = "../login.html";
                            displayInfo($message, $link);
                        }
                    }
                    
                }else{
                    $message = "Erreur Etudiant(e) inconnu(e)";
                    displayInfoRecuperation($message);
                }
            }else{
                $statement = $con->prepare("SELECT Nom, prenom FROM administrator where code like ?");
                $statement->bind_param("s", $matricule);
                $nom = $_POST["nom_prenom"];
                $matricule = $_POST["id_Etudiant_Enseignant"];

                $statement->execute();
                $result = $statement->get_result();
                if($row = $result->fetch_assoc()){
                    $nomrecup = $row["Nom"]." ".$row["prenom"];
                    if(strcmp($nom, $nomrecup)==0){
                        
                        $password = genererPassword(8);
                        $statement = $con->prepare("INSERT INTO accounts(login, password, id_role) VALUES(?, ?, ?)");
                        $statement->bind_param("ssi", $login, $hashPass, $role);

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
                    displayInfoRecuperation($message);
                }
            }
        } catch (Exception $ex) {
            $message ="Erreur ".$ex->getMessage();
            displayInfoRecuperation($message);
        }
        
        
    }else{
        $message = "Veillez remplir tout les champs";
        displayInfoRecuperation($message);
    }
 ?>