<?php
    require_once "db_connect.php";
    require_once "functions.php";

    if(isset($_POST["Login"]) && isset($_POST["Password"])){
        session_start();
        $_SESSION["Login"] = $_POST["Login"];
        $_SESSION["Password"] = $_POST["Password"];
        try {            
            $statement = $con->prepare("SELECT * FROM accounts where (login like ? AND id_role = ?)");
            $statement->bind_param("si", $nom,$role);
            $nom = $_POST["Login"];
            $role = 3;
            $password = $_POST["Password"];
        
            $statement->execute();
            $result = $statement->get_result();
            if($row = $result->fetch_assoc()){
                foreach($result as $row):
                    if(password_verify($password,$row["password"])){
                        if(strcmp($row['statut'], "Activé")==0){
                            $message ="<br>Bienvenue  ".$row['login']." sur Etusoft<br><br>";
                            $link = "../adminPanel.html";
                            displayInfo($message, $link);
                        }else{
                            $message ="<br>Mr  ".$row['login']." compte suspendu sur Etusoft<br><br> Veillez contacter un administrateur<br>";
                            $link = "../adminLogin.html";
                            displayInfo($message, $link);
                        }
                    }
                endforeach;  
            }else{
                $message ="<br>Administrateur(e) inconnu(e)>";
                $link = "../adminLogin.html";
                displayInfo($message, $link);
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