<?php
    require_once "db_connect.php";
    require_once "functions.php";
    session_start();
    if (isset($_GET["id"]) && is_numeric($_GET["id"])) {
        $id = $_GET["id"];
        $_SESSION['id_etudiant'] = $id;
    } else {
        header("location:afficherEtudiant.php");
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
    <title>Panneau Eleve - Afficher les notes</title>
</head>
<body>
    <div class="head">
        <div class="arrow"><span class="logo_img" id="logo"></span></div>
        <header class="header">
            <h5>Panneau Eleve - Afficher les notes</h5>
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
                    <h5>Liste des notes</h5>
                    
                    <form action="" class="recherche-Pan"><input type="text" required placeholder="nom de la matiere"><button type="submit" class="fa-solid fa-search"></button></form>
                </div>
                <div class="div-contain">
                    <table>
                        <tr>
                            <th></th>
                            <th>Matiere</th>
                            <th>Note</th>
                            <th>Date de l'évaluation</th>
                            <th>Appréciation</th>
                            <th></th>
                        </tr>
                        <?php 
                                require_once "db_connect.php";
                                require_once "functions.php";
                                try {     
                                    $statement1 = $con->prepare("SELECT * FROM matieres as mat, etudiants as etu, evaluations as eval where (mat.id_matiere = eval.id_matiere AND etu.id_etudiant = eval.id_etudiant AND etu.id_etudiant = ?)");
                                    $statement1->bind_param("i", $id_etudiant);
                                    $id_etudiant = $_SESSION['id_etudiant'];
                                    $statement1->execute();
                                    $result = $statement1->get_result();
                                    while($row = $result->fetch_assoc()){
                                        echo"<tr>";
                                        if($row["note"] >= 12){
                                            
                                            echo"<td><span><i class='fas fa-circle-check' style='color:green;'></i></span></td>
                                            <td>".$row["nom_matiere"]."</td>
                                            <td>".$row["note"]."</td>
                                            <td>".$row["date_evaluation"]."</td>
                                            <td style='color: green;'> Validé </td>";
                                            
                                        }
                                        else{
                                        
                                            echo"<td><span><i class='fas fa-circle-xmark' style='color:red;'></i></span></td>
                                            <td>".$row["nom_matiere"]."</td>
                                            <td>".$row["note"]."</td>
                                            <td>".$row["date_evaluation"]."</td>
                                            <td style='color: red;'>Non validé</td>";
                                           
                                        }
                                        echo"<td class='action-button'><a href='' title='Déposer une requête concernant la note de la note ".$row['nom_matiere']." '><i class='fas fa-paper-plane'></i></a></td>";
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