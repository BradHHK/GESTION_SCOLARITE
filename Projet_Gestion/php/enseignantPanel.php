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
    <title>Enseignant Panel</title>
</head>
<body>
    <div class="head">
        <div class="arrow"><span class="logo_img" id="logo"></span></div>
        <header class="header">
            <h5>Panneau Enseignant </h5>
            <span class="ImageDefault"><a href="logout.php"><i class="fa-solid fa-right-from-bracket"></i></a></span>
        </header>
    </div>
    

    <div class="container">
        <div class="left-menu">
            <nav class="navbar">
                <ul>
                    <li class="link" id="MatiereOption"><i class="fa-solid fa-book-open"></i><a href="#" >Gestion des étudiants</a></li>
                    <ul class="MatiereListe">
                        <li><a href="attribuerNote.php" >Attribuer une note</a></li>
                        <li><a href="modifierNote.php" >Modifier une note </a></li>
                        <li><a href="afficherRequete.php" >Valider le requete</a></li>
                    </ul>
                
                </ul>
            </nav>
        </div>
        <div class="option">
            <div class="card">
                <div class="card-image">
                    <img src="../images/attribuernote.png" alt="">
                </div>
                <div class="card-text">
                    <h5 class="titreCard">Distribue les points comme un chef</h5>
                    <hr>
                    <p>Note les étudiants de ta classe directement depuis cette interface. Sélectionne la matière, la filière, entre les résultats et valide. Gain de temps, simplicité, efficacité. C’est l’évaluation sans friction.</p>
                    
                </div>
            </div>

            <div class="card">
                <div class="card-image">
                    <img src="../images/modifiernote.png" alt="">
                </div>
                <div class="card-text">
                    <h5 class="titreCard">Besoin d’un ajustement ? C’est là !</h5>
                    <hr>
                    <p>Que ce soit une correction de saisie ou une note à réviser après délibération, c’est ici que tout se passe. Sélectionne l’étudiant concerné, modifie, valide — et ETUSOFT s’occupe de la mise à jour en toute sécurité.</p>
                    
                </div>
            </div>

            <div class="card">
                <div class="card-image">
                    <img src="../images/recevoirrequete.png" alt="">
                </div>
                <div class="card-text">
                    <h5 class="titreCard"> Toutes les demandes, centralisées ici!</h5>
                    <hr>
                    <p>Gagne en clarté en consultant toutes les requêtes envoyées par les étudiants. Statut, contenu, date : tout est là pour faciliter le traitement, répondre efficacement et garder une trace nette.</p>
                    
                </div>
            </div>

            <div class="card">
                <div class="card-image">
                    <img src="../images/setting.png" alt="">
                </div>
                <div class="card-text">
                    <h5 class="titreCard">Prenez les commandes de votre application !</h5>
                    <hr>
                    <p>
                    Personnalisez l'apparence, ajustez les fonctionnalités, configurez votre système selon vos envies.
                    Parce que votre université mérite une application aussi unique qu'elle !</p>

                
                </div>
            </div>
        </div>
    </div>

</body>

<script language="javascript" src="../js/script.js"></script>
</html>