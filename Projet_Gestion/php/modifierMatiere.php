<?php
    require_once "db_connect.php";
    require_once "functions.php";
    session_start();
    if(isset($_GET["id"]) && is_numeric($_GET["id"])){
        $id = $_GET["id"];
        $_SESSION['id_matiere'] = $id;
    }else{
        header("location:afficherMatiere.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/panel.css">
    <link rel="shortcut icon" href="../images/logo.png" type="image/x-icon">
    <link href="../css/font-awesome/css/all.min.css" rel="stylesheet" type="text/css">
    <title>Panneau Administrateur - Modifier une matiere </title>
</head>
<body>
    <div class="head">
        <div class="arrow"><span class="logo_img" id="logo"></span></div>
        <header class="header">
            <h5>Panneau Administrateur - Modifier une matiere </h5>
            <span class="ImageDefault"><i class="fa-solid fa-house"></i></span>
        </header>
    </div>
    

    <div class="container">
        <div class="left-menu">
            <nav class="navbar">
                <ul>
                    <li class="link"><i class="fa-solid fa-book-open"></i><a href="#" >Gestion des matieres</a></li>
                    <ul>
                        <li><a href="#" >Afficher les matieres</a></li>
                        <li><a href="#" >Ajouter une matiere</a></li>
                        <li><a href="#" >Modifier une matiere</a></li>
                        <li><a href="#" >Supprimer une matiere</a></li>
                    </ul>
                    <li class="link"><i class="fa-solid fa-note-sticky"></i><a href="#" >Gestion des filieres</a></li>
                    <ul>
                        <li><a href="#" >Afficher les filieres</a></li>
                        <li><a href="#" >Ajouter une filiere</a></li>
                        <li><a href="#" >Modifier une filiere</a></li>
                        <li><a href="#" >Supprimer une filiere</a></li>
                    </ul>
                    <li class="link"><i class="fa-solid fa-users-rectangle"></i><a href="#" >Gestion des utilisateurs/Comptes</a></li>
                    <ul>
                        <li><a href="#" >Gestion des étudiants</a></li>
                        <li><a href="#" >Gestion des enseignants</a></li>
                        <li><a href="#" >Gestion des utilisateurs</a></li>
                    </ul>
                    <li class="link"><i class="fa-solid fa-sliders"></i><a href="#" >Paramètres</a></li>
                    
                </ul>
            </nav>
        </div>
        <div class="optionAjouter">  
            <form action="modifierMatiereScript.php" method="post"  class= "form">
                    
                    <div class="text-header">
                        <h5>Modifier une matiere</h5>
                    </div>
                        
                    <div class="form-contain">
                        <table>
                            <div class="imageContain"></div>
                            <tr>
                                <td>
                                    Nom
                                </td>
                                <td><input type="text" name="Nom" value="
                                    <?php
                                        require_once "db_connect.php";
                                        require_once "functions.php";

                                        try {
            
                                            $statement = $con->prepare("SELECT * FROM matieres where id_matiere = ?");
                                            $statement->bind_param("i", $id_etudiant);
                                            $id_etudiant = $_GET["id"];
                                        
                                            $statement->execute();
                                            $result = $statement->get_result();
                                            if($row = $result->fetch_assoc()){
                                                echo htmlspecialchars($row["nom_matiere"]);
                                            }
                                        
                                        } catch (Exception $ex) {
                                            $message ="Erreur ".$ex->getMessage();
                                            $link = "afficherMatiere.php";
                                            displayInfo($message, $link);
                                        }
                                    ?>
                                    "required>
                                </td>
                            </tr>
                            <tr>
                                <td>Filiere </td>
                                <td>
                                    <select name="filiere" id="filiere">
                                        
                                        <?php
                                            require_once "db_connect.php";
                                            require_once "functions.php";
                                            try {
                                                
                                                $statement = $con->prepare("SELECT * FROM filieres");
                                                $statement->execute();
                                                $result = $statement->get_result();
                                                while($row = $result->fetch_assoc()){
                                                    echo "<option value='".$row['id_filiere']."'>".$row['nom_filiere']."</option>";
                                                }
                                                
                                            } catch (Exception $ex) {
                                                $message ="Erreur ".$ex->getMessage();
                                                $link = "ajouterEtudiant.php";
                                                displayInfo($message, $link);
                                            }
                                            
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Enseignant </td>
                                <td>
                                    <select name="enseignant" id="enseignant">
                                        
                                        <?php
                                            require_once "db_connect.php";
                                            require_once "functions.php";
                                            try {
                                                
                                                $statement = $con->prepare("SELECT * FROM enseignants");
                                                $statement->execute();
                                                $result = $statement->get_result();
                                                while($row = $result->fetch_assoc()){
                                                    echo "<option value='".$row['id_enseignant']."'>".$row['nom']." ".$row["prenom"]."</option>";
                                                }
                                                
                                            } catch (Exception $ex) {
                                                $message ="Erreur ".$ex->getMessage();
                                                $link = "ajouterEtudiant.php";
                                                displayInfo($message, $link);
                                            }
                                            
                                        ?>
                                    </select>
                                </td>
                            </tr>
                        </table>
                    </div>
                        
                    <div class="bouton-area">
                        <button type="submit">Modifier</button>
                        <button type="reset">Supprimer</button>
                    </div>
            </form> 
        </div>
    </div>

</body>

<script language="javascript" src="../js/script.js"></script>
</html>