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
    <title>Etudiant Panel - Afficher notes</title>
</head>
<body>
    <div class="head">
        <div class="arrow"><span class="logo_img" id="logo"></span></div>
        <header class="header">
            <h5>Panneau Etudiant - Afficher notes</h5>
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
                        <li><a href="#" >Déposer une requête </a></li>
                        <li><a href="#" >Demander une attestation</a></li>
                    </ul>
                    
                    <li class="link"><i class="fa-solid fa-sliders"></i><a href="parametreAdmin.php" >Paramètres</a>
                
                </ul>
            </nav>
        </div>
        <div class="optionAfficher">
            <div class="container">
                <div class="text-header">
                    <h5>Vos notes</h5>
                    <div class="recherche-Pan"><input type="text" required placeholder="Nom de la matiere" name="nommatiereEtu" id="nommatiereEtu"><button type="submit" class="fa-solid fa-search" id="recherche"></button></div>
                </div>
                <div class="div-containE" id="div-containE">
                    <table class="tableE">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Nom de la matiere</th>
                                <th>Note obtenu</th>
                                <th>Date d'evaluation</th>
                                <th>Décision </th>
                            </tr>
                        </thead>
                        <tbody id="utilisateurListe">
                        <?php 
                                require_once "db_connect.php";
                                require_once "functions.php";
                                try {     
                                    $statement1 = $con->prepare("SELECT * FROM matieres as mat, etudiants as etu, evaluations as eval where (mat.id_matiere = eval.id_matiere AND etu.id_etudiant = eval.id_etudiant AND etu.id_etudiant = ?)");
                                    $statement1->bind_param("i", $id_etudiant);
                                    $id_etudiant = $_SESSION['id_utilisateurs_etudiant'];
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
                                        echo"</tr>";
                                    }
                                    $statement1 = $con->prepare("SELECT COUNT(CASE WHEN eval.note>=12 then etu.id_etudiant end) note_valide, count(etu.id_etudiant) note_totale, AVG(eval.note) moyenne FROM matieres as mat, etudiants as etu, evaluations as eval where (mat.id_matiere = eval.id_matiere AND etu.id_etudiant = eval.id_etudiant AND etu.id_etudiant = ?) GROUP BY (etu.nom)");
                                    $statement1->bind_param("i", $id_etudiant);
                                    $id_etudiant = $_SESSION['id_utilisateurs_etudiant'];
                                    $statement1->execute();
                                    $result = $statement1->get_result();
                                    echo "<tr></tr>";
                                    echo "<tr></tr>";
                                    
                                    if($row = $result->fetch_assoc()){
                                        echo"<tr><td>Moyenne </td> <td> </td> <td></td><td>".round($row["moyenne"], 2)."</td><td></td></tr>";
                                        if($row["note_valide"] ==  $row["note_totale"]){
                                            echo"<tr><td>Decision finale</td> <td> </td> <td></td><td style='color: green;'>Validé</td><td></td></tr>"; 
                                        }else{
                                            echo"<tr><td>Decision finale</td> <td> </td> <td></td><td style='color: red;'>Non validé</td><td></td></tr>";
                                        }
                                    }
                                    
                                } catch (Exception $ex) {
                                    $message ="Erreur ".$ex->getMessage();
                                    $link = "etudiantPanel.php";
                                    displayInfo($message, $link);
                                }
                        ?>
                        </tbody>
                    </table>
                </div>
                <div class="bouton-area">
                    <form action="telechargerEtudiant.php" method="POST">
                        <input type="hidden" name="Contenu" id="Contenu">
                        <input type="hidden" name="titreContenu" id="titreContenu">
                        <button class="downloadBulletin" type="submit" onclick="preparerfichierBulletin()">Telecharger</button>
                    </form> 
                </div>
            </div>
            
        </div>
    </div>

</body>

<script language="javascript" src="../js/script.js"></script>
</html>