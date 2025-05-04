<?php
    require_once "db_connect.php";
    require_once "functions.php";

    if(isset($_POST["AdminLogin"]) && isset($_POST["AdminPassword"])){
        session_start();
        $_SESSION["AdminLogin"] = $_POST["AdminLogin"];
        $_SESSION["AdminPassword"] = $_POST["AdminPassword"];
        try {            
            $statement = $con->prepare("SELECT * FROM accounts where (login like ? AND id_role = ?)");
            $statement->bind_param("si", $nom,$role);
            $nom = $_POST["AdminLogin"];
            $role = 3;
            $password = $_POST["AdminPassword"];
        
            $statement->execute();
            $result = $statement->get_result();
            if($row = $result->fetch_assoc()){
                foreach($result as $row):
                    if(password_verify($password,$row["password"])){
                        if(strcmp($row['statut'], "Activé")==0){
                            $message ="<br>Bienvenue  ".$row['login']." sur Etusoft<br><br>";
                            $link = "adminPanel.php";
                            displayInfo($message, $link);
                        }else{
                            $message ="<br>Mr  ".$row['login']." compte suspendu sur Etusoft<br><br> Veillez contacter un administrateur<br>";
                            $link = "../adminLogin.html";
                            displayInfo($message, $link);
                        }
                    }
                endforeach;  
                $message ="<br>Mr  ".$row['login']." mot de passe incorrect <br>";
                $link = "../adminLogin.html";
                displayInfo($message, $link);
            }else{
                $message ="<br>Administrateur(e) inconnu(e)>";
                $link = "../adminLogin.html";
                displayInfo($message, $link);
            }  
        } catch (Exception $ex) {
            $message ="Erreur ".$ex->getMessage();
            $link = "../adminLogin.html";
            displayInfo($message, $link);
        }
        
        
    }else{
        $message = "Veillez remplir tout les champs";
        $link = "../adminLogin.html";
        displayInfo($message, $link);
    }
 ?>