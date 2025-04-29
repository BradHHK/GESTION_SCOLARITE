<?php 
    session_start();
    if(!isset($_SESSION["Login"]) || !isset($_SESSION["Password"])){
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
    <title>Admin Panel</title>
</head>
<body>
    <div class="head">
        <div class="arrow"><span class="logo_img" id="logo"></span></div>
        <header class="header">
            <h5>Panneau Administrateur </h5>
            <span class="ImageDefault"><i class="fa-solid fa-house"></i>&nbsp;&nbsp;<?php echo $_SESSION['Login']; ?></span>
        </header>
    </div>
    

    <div class="container">
        <div class="left-menu">
            <nav class="navbar">
                <ul>
                    <li class="link"><i class="fa-solid fa-book-open"></i><a href="#" >Gestion des matieres</a></li>
                    <ul>
                        <li><a href="#" >Afficher les matieres</a></li>
                        <li><a href="#" >Ajouter une matiere</a></li>
                        <li><a href="#" >Modifier une matiere</a></li>
                        <li><a href="#" >Supprimer une matiere</a></li>
                    </ul>
                    <li class="link"><i class="fa-solid fa-note-sticky"></i><a href="#" >Gestion des filieres</a></li>
                    <ul>
                        <li><a href="#" >Afficher les filieres</a></li>
                        <li><a href="#" >Ajouter une filiere</a></li>
                        <li><a href="#" >Modifier une filiere</a></li>
                        <li><a href="#" >Supprimer une filiere</a></li>
                    </ul>
                    <li class="link"><i class="fa-solid fa-users-rectangle"></i><a href="#" >Gestion des utilisateurs/Comptes</a></li>
                    <ul>
                        <li><a href="#" >Gestion des étudiants</a></li>
                        <li><a href="#" >Gestion des enseignants</a></li>
                        <li><a href="#" >Gestion des utilisateurs</a></li>
                    </ul>
                    <li class="link"><i class="fa-solid fa-sliders"></i><a href="#" >Paramètres</a></li>
                    
                </ul>
            </nav>
        </div>
        <div class="option">
            <div class="card">
                <div class="card-image">
                    <img src="../images/G_matiere.png" alt="">
                </div>
                <div class="card-text">
                    <h5 class="titreCard">Organisez toutes les matières enseignées comme un chef !</h5>
                    <hr>
                    <p>Ajoutez de nouvelles disciplines, mettez à jour les cours existants ou supprimez ceux qui n’ont plus leur place.
                    Un seul clic pour garder le programme à jour et inspirer les futurs diplômés !</p>
                    <a class="consulter">Accéder</a>
                </div>
            </div>

            <div class="card">
                <div class="card-image">
                    <img src="../images/G_filiere.png" alt="">
                </div>
                <div class="card-text">
                    <h5 class="titreCard">Construisez les parcours d’excellence !</h5>
                    <hr>
                    <p>Créez, modifiez et structurez les différentes filières pour mieux guider les étudiants dans leur aventure académique.
                    Ici, chaque filière devient un tremplin vers la réussite !</p>
                    <a class="consulter">Accéder</a>
                </div>
            </div>

            <div class="card">
                <div class="card-image">
                    <img src="../images/setting.png" alt="">
                </div>
                <div class="card-text">
                    <h5 class="titreCard">Gérez votre communauté universitaire en toute simplicité !</h5>
                    <hr>
                    <p>Donnez accès aux étudiants, enseignants et admins, contrôlez les permissions et gardez un œil sur chaque profil.
                    Parce qu'une bonne organisation commence par une bonne gestion des comptes !</p>
                    <a class="consulter">Accéder</a>
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

                    <a class="consulter">Accéder</a>
                </div>
            </div>
        </div>
    </div>

</body>

<script language="javascript" src="../js/script.js"></script>
</html>