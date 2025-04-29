

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
            <h5>Panneau Administrateur -  Ajouter Filiere</h5>
            <span class="ImageDefault"><i class="fa-solid fa-house"></i></span>
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
        <div class="optionAjouter">  
            <form action="AjouterFiliereScript.php" method="post">
                    
                    <div class="text-header">
                        <h5>Ajouter Filiere</h5>
                    </div>
                        
                    <div class="form-contain">
                        <table>
                            <div class="imageContain"></div>
                            <tr>
                                <td>Nom </td>
                                <td><input type="text" name="Nom" required></td>
                            </tr>
                        
                        </table>
                    </div>
                        
                    <div class="bouton-area">
                        <button type="submit">Ajouter</button>
                        <button type="reset">Supprimer</button>
                    </div>
            </form> 
        </div>
    </div>

</body>

<script language="javascript" src="../js/script.js"></script>
</html>