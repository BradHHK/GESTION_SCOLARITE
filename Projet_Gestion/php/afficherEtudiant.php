<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/panel.css">
    <link rel="shortcut icon" href="../images/logo.png" type="image/x-icon">
    <link href="../css/font-awesome/css/all.min.css" rel="stylesheet" type="text/css">
    <title>Panneau Administrateur - Afficher les étudiants</title>
</head>
<body>
    <div class="head">
        <div class="arrow"><span class="logo_img" id="logo"></span></div>
        <header class="header">
            <h5>Panneau Administrateur - Afficher les étudiants</h5>
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
                    <h5>Liste des étudiants</h5>
                    
                    <form action="" class="recherche-Pan"><input type="text" required placeholder="matricule"><button type="submit" class="fa-solid fa-search"></button></form>
                </div>
                <div class="div-contain">
                    <table>
                        <tr>
                            <th></th>
                            <th>Matricule</th>
                            <th>Nom</th>
                            <th>Prenom</th>
                            <th>Date de naissance</th>
                            <th>Filiere</th>
                            <th></th>
                        </tr>
                        <?php 
                                require_once "db_connect.php";
                                require_once "functions.php";
                                try {     
                                    $statement = $con->prepare("SELECT id_etudiant, Matricule, nom, prenom, date_naissance, id_filiere FROM etudiants");
                                    $statement->execute();
                                    $result = $statement->get_result();
                                    
                                    while($row = $result->fetch_assoc()){
                                        
                                        echo"<tr>";
                                        echo"<td><span><i class='fas fa-user-graduate'></span></td>
                                            <td>".$row["Matricule"]."</td>
                                            <td>".$row["nom"]."</td>
                                            <td>".$row["prenom"]."</td>
                                            <td>".$row["date_naissance"]."</td>";

                                  
                                        $statement2 = $con->prepare("SELECT nom_filiere FROM filieres where (id_filiere = ?)");
                                        $statement2->bind_param("i",$id);
                                        $id = $row["id_filiere"];
                                        $statement2->execute();
                                        $result2 = $statement2->get_result();
                                        if($row2 = $result2->fetch_assoc()){
                                            echo"<td>".$row2["nom_filiere"]."</td>";
                                        }
                                        
                                        
                                        echo"<td class='action-button'><a href='afficherNote.php?id=".$row['id_etudiant']."' title='Voir l étudiant ".$row['nom']." '><i class='fas fa-eye'></i></a> <a href='modifierEtudiant.php?id=".$row['id_etudiant']."' title='modifier l étudiant ".$row['nom']." '><i class='fas fa-edit'></i></a> <a href='supprimerEtudiant.php?id=".$row['id_etudiant']."' title='supprimer l étudiant ".$row['nom']." ' onclick='return confirm(".'"Supprimer l etudiant '.$row['nom'].'?"'.")'><i class='fas fa-trash'></i></a></td>";
                                        echo"</tr>";
                                    }
                                    
                                } catch (Exception $ex) {
                                    $message ="Erreur ".$ex->getMessage();
                                    $link = "afficherEtudiant.php";
                                    displayInfo($message, $link);
                                }
                        ?>
                        <tr>
                            
                        </tr>
                    </table>
                </div>
            </div>
            
        </div>
    </div>

</body>

<script language="javascript" src="../js/script.js"></script>
</html>