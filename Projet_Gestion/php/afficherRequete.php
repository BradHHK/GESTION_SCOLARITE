<?php 
    session_start();
    if(!isset($_SESSION["Login"]) || !isset($_SESSION["Password"]) || !isset($_SESSION["id_utilisateurs_enseignant"])){
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
    <title>Panneau Enseignant - Liste des requêtes</title>
</head>
<body>
    <div class="head">
        <div class="arrow"><span class="logo_img" id="logo"></span></div>
        <header class="header">
            <h5>Panneau Enseignant - Liste des requêtes</h5>
            <span class="ImageDefault"><a href="logout.php"><i class="fa-solid fa-right-from-bracket"></i></a>&nbsp;&nbsp;</span>
        </header>
    </div>
    

    <div class="container">
        <div class="left-menu">
            <nav class="navbar">
                <ul>
                    <li class="link" id="MatiereOption"><i class="fa-solid fa-book-open"></i><a href="#" >Gestion des Notes</a></li>
                    <ul class="MatiereListe">
                        <li><a href="attribuerNote.php" >Attribuer une note</a></li>
                        <li><a href="modifierNote.php" >Modifier une note </a></li>
                        <li><a href="afficherRequete.php" >Valider le requete</a></li>
                    </ul>
                
                </ul>
            </nav>
        </div>
        <div class="optionAfficher">
            <div class="container">
                <div class="text-header">
                    <h5>Liste des requêtes</h5>
                    
                </div>
                <div class="div-contain">
                    <table>
                        <thead>
                            <tr>
                                <th></th>
                                <th>Nom de l'etudiant</th>
                                <th>Motif de la requete</th>
                                <th>Date de dépôt</th>
                                <th>Statut</th>
                                <th></th>
                                
                            </tr>
                        </thead>
                        <tbody id="utilisateurListe">
                        <?php 
                                require_once "db_connect.php";
                                require_once "functions.php";
                                try {     
                                    $statement = $con->prepare("SELECT * FROM requete as rqt, matieres as mat, enseignants as ens, etudiants as etu, filieres as fil where(etu.id_etudiant = rqt.id_etudiant AND mat.id_matiere = rqt.id_matiere AND mat.id_filiere = fil.id_filiere AND etu.id_filiere = fil.id_filiere AND mat.id_enseignant = ens.id_enseignant AND ens.id_enseignant = ? )");
                                    $statement->bind_param('i', $id_enseignant);
                                    $id_enseignant = $_SESSION["id_utilisateurs_enseignant"];
                                    $statement->execute();
                                    $result = $statement->get_result();
                                    
                                    while($row = $result->fetch_assoc()){
                                        
                                        echo"<tr>";
                                        echo"<td><span><i class='fas fa-paper-plane'></span></td>
                                            <td>".$row["nom"]." ".$row["prenom"]." </td>
                                            <td>".$row["motif"]."</td>
                                            <td>".$row["date_de_depot"]."</td>
                                            <td>".$row["statut"]."</td>";

                                        $lien = "../Documents/Requetes/".$row["lien_de_la_requete"];
                                        echo"<td class='action-button'>
                                            <a href='".$lien."' title='Telecharger la requete de ".$row['nom']." ' ><i class='fas fa-download'></i></a>
                                            <a href='accepterRequete.php?id_requete=".$row['id_requete']."' title='Accepter la requete de ".$row['nom']." ' onclick='return confirm(".'"Accepter la requete de '.$row['nom'].'?"'.")'><i class='fas fa-check'></i></a>
                                            <a href='refuserRequete.php?id_requete=".$row['id_requete']."' title='Refuser la requete de ".$row['nom']." ' onclick='return confirm(".'"Refuser la requete '.$row['nom'].'?"'.")'><i class='fas fa-x'></i></a>
                                            </td>";
                                       
                                        
                                        echo"</tr>";
                                    }
                                    
                                } catch (Exception $ex) {
                                    $message ="Erreur ".$ex->getMessage();
                                    $link = "enseignantPanel.php";
                                    displayInfo($message, $link);
                                }
                        ?>
                        <tr>
                            
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            
        </div>
    </div>

</body>


<script language="javascript" src="../js/script.js"></script>
</html>