<?php
    require_once "db_connect.php";
    require_once "functions.php";

    if(isset($_POST["Login"]) && isset($_POST["Password"]) && isset($_POST["role"])){
        session_start();
        $_SESSION["Login"] = $_POST["Login"];
        $_SESSION["Password"] = $_POST["Password"];
        $_SESSION["role"] = $_POST["role"];
        try {
            $role = $_POST["role"];
            if(strcmp($role, "enseignant")==0){
                $statement = $con->prepare("SELECT * FROM accounts where (login like ? AND id_role = ? )");
                $statement->bind_param("si", $nom, $role);
                $nom = $_POST["Login"];
                $role = 2;
                $password = $_POST["Password"];
                
        
                $statement->execute();
                $result = $statement->get_result();
                if($row = $result->fetch_assoc()){
                    foreach($result as $row):
                        if(password_verify($password,$row["password"])){
                            if(strcmp($row['statut'], "Activé")==0){
                                $_SESSION["id_utilisateurs_enseignant"] = $row["id_proprietaire"];
                                $message ="<br>Bienvenue  ".$row['login']." sur Etusoft<br><br>";
                                $link = "enseignantPanel.php";
                                displayInfo($message, $link);
                            }else{
                                $message ="<br>Mr  ".$row['login']." compte suspendu sur Etusoft<br><br> Veillez contacter un administrateur<br>";
                                $link = "../login.html";
                                displayInfo($message, $link);
                            }
                        }  
                    endforeach;  
                    $message = "Erreur Enseignant(e) inconnu(e)";
                    $link = "../login.html";
                    displayInfo($message, $link);
                }else{
                    $message = "Erreur Enseignant(e) inconnu(e)";
                    $link = "../login.html";
                    displayInfo($message, $link);
                }
            }

            if(strcmp($role, "etudiant")==0){
                $statement = $con->prepare("SELECT * FROM accounts where (login like ? AND id_role = ?)");
                $statement->bind_param("si", $nom,$role);
                $nom = $_POST["Login"];
                $role = 1;
                $password = $_POST["Password"];
        
                $statement->execute();
                $result = $statement->get_result();
                if($row = $result->fetch_assoc()){
                    foreach($result as $row):
                        if(password_verify($password,$row["password"])){
                            if(strcmp($row['statut'], "Activé")==0){
                                $_SESSION["id_utilisateurs_etudiant"] = $row["id_proprietaire"];
                                $message ="<br>Bienvenue  ".$row['login']." sur Etusoft<br><br>";
                                $link = "etudiantPanel.php";
                                displayInfo($message, $link);
                            }else{
                                $message ="<br>Mr  ".$row['login']." compte suspendu sur Etusoft<br><br> Veillez contacter un administrateur<br>";
                                $link = "../login.html";
                                displayInfo($message, $link);
                            }
                        } 
                    endforeach;  
                    $message = "Erreur Etudiant(e) inconnu(e)";
                    $link ="../login.html";
                    displayInfo($message, $link);
                }else{
                    $message = "Erreur Etudiant(e) inconnu(e)";
                    $link = "../login.html";
                    displayInfo($message, $link);
                }
            }
        } catch (Exception $ex) {
            $message ="Erreur ".$ex->getMessage();
            $link = "../login.html";
            displayInfo($message, $link);
        }
        
        
    }else{
        $message = "Veillez remplir tout les champs";
        $link = "../login.html";
        displayInfo($message, $link);
    }
 ?>