<?php 
    session_start();
    if(!isset($_SESSION["Login"]) || !isset($_SESSION["Password"]) || !isset($_SESSION["id_utilisateurs_etudiant"])){
        header("location:../Login.html");
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
    <title>Etudiant Panel - Deposer une requête</title>
</head>
<body>
    <div class="head">
        <div class="arrow"><span class="logo_img" id="logo"></span></div>
        <header class="header">
            <h5>Panneau Etudiant - Deposer une requête</h5>
            <span class="ImageDefault"><i class="fa-solid fa-house"></i></span>
        </header>
    </div>
    

    <div class="container">
        <div class="left-menu">
            <nav class="navbar">
                <ul>
                    <li class="link" id="MatiereOption"><i class="fa-solid fa-book-open"></i><a href="#" >Gestion des Notes</a></li>
                    <ul class="MatiereListe">
                        <li><a href="afficherNoteEtudiant.php" >Consulter ses notes</a></li>
                        <li><a href="deposerRequete.php" >Déposer une requête </a></li>
                        <li><a href="demanderAttestation.php" >Demander une attestation</a></li>
                    </ul>
                    
                    <li class="link"><i class="fa-solid fa-sliders"></i><a href="parametreAdmin.php" >Paramètres</a>
                
                </ul>
            </nav>
        </div>

        <div class="optionAjouter">  
            <form action="deposerRequeteScript.php" method="post"  class= "form" enctype ="multipart/form-data">
                    
                    <div class="text-header">
                        <h5>Déposer une requête</h5>
                    </div>
                        
                    <div class="form-contain">
                        <table>
                            <div class="imageContain"></div>
                            <tr>
                                <td>Motif </td>
                                <td><input type="text" name="Motif" required></td>
                            </tr>

                            <tr>
                                <td>Matiere </td>
                                <td> <select name="matiere" id="matiere" required>
                                    <option value="">--SELECTIONNER LA MATIERE--</option>
                                    <?php
                                        require_once "db_connect.php";
                                        require_once "functions.php";
                                        try {
                                            $statement = $con->prepare("SELECT * FROM matieres as mat, etudiants as etu, filieres as fil WHERE (etu.id_filiere = fil.id_filiere AND fil.id_filiere = mat.id_filiere AND etu.id_etudiant = ?)");
                                            $statement->bind_param("i", $id_etudiant);
                                            $id_etudiant = $_SESSION["id_utilisateurs_etudiant"];
                                            $statement->execute();
                                            $result = $statement->get_result();
                                            while($row = $result->fetch_assoc()){
                                                echo "<option value='".$row['id_matiere']."'>".$row['nom_matiere']."</option>";
                                            }
                                        } catch (Exception $ex) {
                                            $message = "Erreur ".$ex->getMessage();
                                            $link = "etudiantPanel.php";
                                            displayInfo($message, $link);
                                        }
                                    ?>
                                </select></td>
                            </tr>

                            <tr>
                                <td>Televersez votre requête </td>
                                <td><input type="file" name="reqete" id="reqete"></td>
                            </tr>
                        
                        </table>
                    </div>
                        
                    <div class="bouton-area">
                        <button type="submit">Envoyer</button>
                        <button type="reset">Supprimer</button>
                    </div>
            </form> 
        </div>
        
    </div>

</body>

<script language="javascript" src="../js/script.js"></script>
</html>


