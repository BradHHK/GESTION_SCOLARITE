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
                        <li><a href="afficherNoteEtudiant.php" >Consulter ses notes</a></li>
                        <li><a href="deposerRequete.php" >Déposer une requête </a></li>
                        <li><a href="demanderAttestation.php" >Demander une attestation</a></li>
                    </ul>
                    
                    <li class="link"><i class="fa-solid fa-sliders"></i><a href="parametreAdmin.php" >Paramètres</a>
                
                </ul>
            </nav>
        </div>
        <div class="option">
            <div class="card">
                <div class="card-image">
                    <img src="../images/attestationetu.png" alt="">
                </div>
                <div class="card-text">
                    <h5 class="titreCard">Besoin d’un papier officiel ? </h5>
                    <hr>
                    <p>Tu veux une attestation de scolarité ou un autre document ? Inutile de courir après le secrétariat ! Fais ta demande directement ici, rapidement et sans prise de tête. L’équipe administrative s’occupe du reste.</p>
                    
                </div>
            </div>

            <div class="card">
                <div class="card-image">
                    <img src="../images/consulternote.png" alt="">
                </div>
                <div class="card-text">
                    <h5 class="titreCard">Voir ses résultats, sans suspense !</h5>
                    <hr>
                    <p>Retrouve toutes tes notes ici, organisées par matière et par semestre. Suis ta progression, analyse tes résultats et reste focus sur tes objectifs. Ton bulletin digital est dispo 24h/24, 7j/7</p>
                    
                </div>
            </div>

            <div class="card">
                <div class="card-image">
                    <img src="../images/envoyerrequet.png" alt="">
                </div>
                <div class="card-text">
                    <h5 class="titreCard">Une demande à faire ? Parle-nous  !</h5>
                    <hr>
                    <p>Tu rencontres un souci ? Tu veux faire une réclamation ou poser une question officielle ? Ce module est là pour toi. Rédige ta requête, suis son évolution et reste informé jusqu’à la réponse finale</p>
                    
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