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
    <title>Etudiant Panel</title>
</head>
<body>
    <div class="head">
        <div class="arrow"><span class="logo_img" id="logo"></span></div>
        <header class="header">
            <h5>Panneau Etudiant </h5>
            <span class="ImageDefault"><i class="fa-solid fa-house"></i></span>
        </header>
    </div>
    

    <div class="container">
        <div class="left-menu">
            <nav class="navbar">
                <ul>
                    <li class="link" id="MatiereOption"><i class="fa-solid fa-book-open"></i><a href="#" >Gestion des Notes</a></li>
                    <ul class="MatiereListe">
                        <li><a href="#" >Consulter ses notes</a></li>
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