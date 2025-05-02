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
                    <h5>Liste des filières</h5>
                    <form action="" method="post" class="recherche-Pan"><input type="text" required placeholder="nom"><button type="submit" class="fa-solid fa-search"></button></form>
                </div>
                <div class="div-contain">
                    <table>
                        <tr>
                            <th></th>
                            <th>Nom</th>
                        </tr>
                        <?php 
                                require_once "db_connect.php";
                                require_once "functions.php";
                                try {     
                                    $statement = $con->prepare("SELECT nom_filiere FROM filieres");
                                    $statement->execute();
                                    $result = $statement->get_result();
                                    
                                    while($row = $result->fetch_assoc()){
                                        
                                        echo"<tr>";
                                        echo"<td><span><i class='fas fa-graduation-cap'></span></td>
                                            <td>".$row["nom_filiere"]."</td>";

                                            echo"<td class='action-button'><a href='' title='Voir la filiere ".$row['nom_filiere']." '><i class='fas fa-eye'></i></a> <a href='' title='modifier la filiere ".$row['nom_filiere']." '><i class='fas fa-edit'></i></a> <a href='#' title='supprimer la filiere ".$row['nom_filiere']." ' onclick='return confirm(".'"Supprimer la filiere '.$row['nom_filiere'].'?"'.")'><i class='fas fa-trash'></i></a></td>";
                                        echo"</tr>";
                                    }
                                    
                                } catch (Exception $ex) {
                                    $message ="Erreur ".$ex->getMessage();
                                    $link = "afficherFiliere.php";
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