<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/panel.css">
    <link rel="shortcut icon" href="../images/logo.png" type="image/x-icon">
    <link href="../css/font-awesome/css/all.min.css" rel="stylesheet" type="text/css">
    <title>Panneau Administrateur - Afficher les matieres</title>
</head>
<body>
    <div class="head">
        <div class="arrow"><span class="logo_img" id="logo"></span></div>
        <header class="header">
            <h5>Panneau Administrateur - Afficher les matieres</h5>
            <span class="ImageDefault"><i class="fa-solid fa-house"></i>&nbsp;&nbsp;</span>
        </header>
    </div>
    

    <div class="container">
        <div class="left-menu">
            <nav class="navbar">
                <ul>
                    <li class="link"><i class="fa-solid fa-book-open"></i><a href="#" >Gestion des matieres</a></li>
                    <ul>
                        <li><a href="Afficher les matieres" >Afficher les matieres</a></li>
                        <li><a href="Ajouter une matiere" >Ajouter une matiere</a></li>
                        <li><a href="Modifier une matiere" >Modifier une matiere</a></li>
                        <li><a href="Supprimer une matiere" >Supprimer une matiere</a></li>
                    </ul>
                    <li class="link"><i class="fa-solid fa-note-sticky"></i><a href="#" >Gestion des filieres</a></li>
                    <ul>
                        <li><a href="Afficher les filieres" >Afficher les filieres</a></li>
                        <li><a href="Ajouter une filiere" >Ajouter une filiere</a></li>
                        <li><a href="Modifier une filiere" >Modifier une filiere</a></li>
                        <li><a href="Supprimer une filiere" >Supprimer une filiere</a></li>
                    </ul>
                    <li class="link"><i class="fa-solid fa-users-rectangle"></i><a href="#" >Gestion des utilisateurs/Comptes</a></li>
                    <ul>
                        <li><a href="Gestion des étudiants" >Gestion des étudiants</a></li>
                        <li><a href="Gestion des étudiants" >Gestion des enseignants</a></li>
                        <li><a href="Gestion des utilisateurs" >Gestion des utilisateurs</a></li>
                    </ul>
                    <li class="link"><i class="fa-solid fa-sliders"></i><a href="#" >Paramètres</a></li>
                    
                </ul>
            </nav>
        </div>
        <div class="optionAfficher">
            <div class="container">
                <div class="text-header">
                    <h5>Liste des matieres</h5>
                    <form action="" method="post" class="recherche-Pan"><input type="text" required placeholder="Nom"><button type="submit" class="fa-solid fa-search"></button></form>
                </div>
                <div class="div-contain">
                    <table>
                        <tr>
                            <th></th>
                            <th>Nom</th>
                            <th>Enseignant</th>
                            <th>Filiere</th>
                        </tr>
                        <?php 
                                require_once "db_connect.php";
                                require_once "functions.php";
                                try {     
                                    $statement = $con->prepare("SELECT id_matiere, nom_matiere, id_enseignant, id_filiere FROM matieres");
                                    $statement->execute();
                                    $result = $statement->get_result();
                                    
                                    while($row = $result->fetch_assoc()){
                                        
                                        echo"<tr>";
                                        echo"<td><span><i class='fas fa-chalkboard-teacher'></span></td>
                                            <td>".$row["nom_matiere"]."</td>";

                                        $statement3 = $con->prepare("SELECT nom, prenom FROM enseignants where (id_enseignant = ?)");
                                        $statement3->bind_param("i",$id);
                                        $id = $row["id_enseignant"];
                                        $statement3->execute();
                                        $result3 = $statement3->get_result();
                                        if($row3 = $result3->fetch_assoc()){
                                            echo"<td>".$row3["nom"]." ".$row3["prenom"]."</td>";
                                        }

                                        $statement2 = $con->prepare("SELECT nom_filiere FROM filieres where (id_filiere = ?)");
                                        $statement2->bind_param("i",$id);
                                        $id = $row["id_filiere"];
                                        $statement2->execute();
                                        $result2 = $statement2->get_result();
                                        if($row2 = $result2->fetch_assoc()){
                                            echo"<td>".$row2["nom_filiere"]."</td>";
                                        }

                                        echo"<td class='action-button'><a href='' title='Voir la matiere ".$row['nom_matiere']." '><i class='fas fa-eye'></i></a> <a href='modifierMatiere.php?id=".$row['id_matiere']."' title='modifier la matiere ".$row['nom_matiere']." '><i class='fas fa-edit'></i></a> <a href='supprimerMatiere.php?id=".$row['id_matiere']."' title='supprimer la matiere ".$row['nom_matiere']." ' onclick='return confirm(".'"Supprimer la matiere '.$row['nom_matiere'].'?"'.")'><i class='fas fa-trash'></i></a></td>";

                                        echo"</tr>";
                                    }
                                    
                                } catch (Exception $ex) {
                                    $message ="Erreur ".$ex->getMessage();
                                    $link = "afficherMatiere.php";
                                    displayInfo($message, $link);
                                }
                        ?>
                    </table>
                </div>
            </div>
            
        </div>
    </div>

</body>

<script language="javascript" src="../js/script.js"></script>
</html>