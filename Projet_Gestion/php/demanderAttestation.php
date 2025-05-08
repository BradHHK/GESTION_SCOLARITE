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
    <title>Etudiant Panel - Demande d'attestation</title>
</head>
<body>
    <div class="head">
        <div class="arrow"><span class="logo_img" id="logo"></span></div>
        <header class="header">
            <h5>Panneau Etudiant - Demande d'attestation</h5>
            <span class="ImageDefault"><a href="logout.php"><i class="fa-solid fa-right-from-bracket"></i></a></span>
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

                </ul>
            </nav>
        </div>

        <div class="optionAjouter">  
            <form action="demanderAttestationScript.php" method="post"  class= "form" enctype ="multipart/form-data">
                    
                    <div class="text-header">
                        <h5>Demander une attestation</h5>
                    </div>
                        
                    <div class="form-contain" style="Background : url('../images/attestationetu.png'); background-size:cover; background-repeat: no-repeat">
                        <table>
                            
                        </table>
                    </div>
                        
                    <div class="bouton-area">
                        <form action="demanderAttestationScript.php" method="POST">
                            
                            <button class="downloadBulletin" type="submit">Imprimer</button>
                        </form> 
                    </div>
            </form> 
        </div>
        
    </div>

</body>

<script language="javascript" src="../js/script.js"></script>
</html>


