<?php 
    session_start();
    if(!isset($_SESSION["AdminLogin"]) || !isset($_SESSION["AdminPassword"])){
        header("location:../adminLogin.html");
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
    <title>Panneau Administrateur - Afficher les filieres</title>
</head>
<body>
    <div class="head">
        <div class="arrow"><span class="logo_img" id="logo"></span></div>
        <header class="header">
            <h5>Panneau Administrateur - Afficher les filieres</h5>
            <span class="ImageDefault"><i class="fa-solid fa-house"></i>&nbsp;&nbsp;</span>
        </header>
    </div>
    

    <div class="container">
        <div class="left-menu">
            <nav class="navbar">
                <ul>
                    <li class="link" id="MatiereOption"><i class="fa-solid fa-book-open"></i><a href="#" >Gestion des matieres</a></li>
                    <ul class="MatiereListe">
                        <li><a href="afficherMatiere.php" >Afficher les matieres</a></li>
                        <li><a href="ajouterMatiere.php" >Ajouter une matiere</a></li>
                        <li><a href="modifierMatiereListe.php" >Modifier une matiere</a></li>
                        <li><a href="supprimerMatiereListe.php" >Supprimer une matiere</a></li>
                    </ul>
                    <li class="link" id="FiliereOption"><i class="fa-solid fa-note-sticky"></i><a href="#" >Gestion des filieres</a></li>
                    <ul class="FiliereListe">
                        <li><a href="afficherFiliere.php" >Afficher les filieres</a></li>
                        <li><a href="ajouterFiliere.php" >Ajouter une filiere</a></li>
                        <li><a href="modifierFiliereListe.php" >Modifier une filiere</a></li>
                        <li><a href="supprimerFiliereListe.php" >Supprimer une filiere</a></li>
                    </ul>
                    <li class="link" id="CompteOption"><i class="fa-solid fa-users-rectangle"></i><a href="#" >Gestion des utilisateurs/Comptes</a></li>
                    <ul class="CompteListe">
                        <li id="EtudiantOption"><i class="fa-solid fa-users"></i><a href="#" >Gestion des étudiants</a></li>
                        <ul class="EtudiantListe">
                            <li><a href="afficherEtudiant.php" >Afficher les etudiants</a></li>
                            <li><a href="ajouterEtudiant.php" >Ajouter un etudiant</a></li>
                            <li><a href="modifierEtudiantListe.php" >Modifier un etudiant</a></li>
                            <li><a href="supprimerEtudiantListe.php" >Supprimer un etudiant</a></li>
                        </ul>
                        <li id="EnseignantOption"><i class="fas fa-chalkboard-teacher"></i><a href="#">Gestion des enseignants</a></li>
                        <ul class="EnseignantListe">
                            <li><a href="afficherEnseignant.php" >Afficher les enseignants</a></li>
                            <li><a href="ajouterEnseignant.php" >Ajouter un enseignant</a></li>
                            <li><a href="modifierEnseignantListe.php" >Modifier un enseignant</a></li>
                            <li><a href="supprimerEnseignantListe.php" >Supprimer un enseignant</a></li>
                        </ul>
                        <li id="UtilisateurOption"><i class="fas fa-user-tie"></i><a href="#">Gestion des utilisateurs</a></li>
                        <ul class="UtilisateurListe">
                            <li><a href="afficherUtilisateur.php" >Afficher les utisateurs</a></li><li><a href="activerUtilisateurListe.php" >Activer un utilisateur</a></li>
                            
                            <li><a href="suspendreUtilisateurListe.php" >Suspendre un utilisateur</a></li>
                        </ul>
                    </ul>
                    <li class="link"><i class="fas fa-chart-column"></i><a href="statistiquesAdmin.php" >Statistiques</a></li><li class="link"><i class="fa-solid fa-sliders"></i><a href="parametreAdmin.php" >Paramètres</a>
                
                </ul>
            </nav>
        </div>
        <div class="optionAfficher">
            <div class="container">
                <div class="text-header">
                    <h5>Liste des filières</h5>
                    <div class="recherche-Pan"><input type="text" required placeholder="Nom" name="nomfiliere" id="nomfiliere"><button type="submit" class="fa-solid fa-search" id="recherche"></button></div>
                </div>
                <div class="div-contain">
                    <table>
                        <thead>
                            <tr>
                                <th></th>
                                <th>Nom</th>
                                
                            </tr>
                        </thead>
                        <tbody id="utilisateurListe">
                        <?php 
                                require_once "db_connect.php";
                                require_once "functions.php";
                                try {     
                                    $statement = $con->prepare("SELECT * FROM filieres");
                                    $statement->execute();
                                    $result = $statement->get_result();
                                    
                                    while($row = $result->fetch_assoc()){
                                        
                                        echo"<tr>";
                                        echo"<td><span><i class='fas fa-graduation-cap'></span></td>
                                            <td>".$row["nom_filiere"]."</td>";

                                        echo"</tr>";
                                    }
                                    
                                } catch (Exception $ex) {
                                    $message ="Erreur ".$ex->getMessage();
                                    $link = "afficherFiliere.php";
                                    displayInfo($message, $link);
                                }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
            
        </div>
    </div>

</body>

<script language="javascript" src="../js/script.js"></script>
</html>