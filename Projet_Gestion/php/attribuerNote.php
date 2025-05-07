
<?php
    session_start();
    require_once "db_connect.php";
    require_once "functions.php";

    if (isset($_SESSION["id_matiere"])) {
        unset($_SESSION["id_matiere"]);
    }

    if (isset($_POST['matierebouton'])) {
        $_SESSION["id_matiere"] = $_POST["matiere"];
    }

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
    <title>Panneau Enseignant - Attribuer une note</title>
</head>
<body>
    <div class="head">
        <div class="arrow"><span class="logo_img" id="logo"></span></div>
        <header class="header">
            <h5>Panneau Enseignant - Attribuer une note</h5>
            <span class="ImageDefault"><i class="fa-solid fa-house"></i></span>
        </header>
    </div>
    

    <div class="container">
        <div class="left-menu">
            <nav class="navbar">
                <ul>
                <li class="link" id="MatiereOption"><i class="fa-solid fa-book-open"></i><a href="#" >Gestion des Notes</a></li>
                    <ul class="MatiereListe">
                        <li><a href="#" >Attribuer une note</a></li>
                        <li><a href="#" >Modifier une note </a></li>
                        <li><a href="#" >Valider le requete</a></li>
                    </ul>
                    
              
        
                    <li class="link"><i class="fa-solid fa-sliders"></i><a href="#">Paramètres</a></li>
                </ul>
            </nav>
        </div>

        <div class="optionAjouter">  
            <form action ="ajouterNoteScript.php" method="post" class="form">
                <div class="text-header">
                    <h5>Attribuer une note</h5>
                </div>

                <div class="form-contain">
                    <table>
                        <div class="imageContain"></div>
                        <tr>
                            <td>
                                Matiere
                            </td>
                            <td>
                                <select name="matiere" id="matiere" required>
                                    <option value="">--SELECTIONNER LA MATIERE--</option>
                                    <?php
                                        try {
                                            $statement = $con->prepare("SELECT * FROM matieres as mat, enseignants as ens WHERE (ens.id_enseignant = mat.id_enseignant AND ens.id_enseignant = ?)");
                                            $statement->bind_param("i", $id_enseignant);
                                            $id_enseignant = $_SESSION["id_utilisateurs_enseignant"];
                                            $statement->execute();
                                            $result = $statement->get_result();
                                            while($row = $result->fetch_assoc()){
                                                echo "<option value='".$row['id_matiere']."'>".$row['nom_matiere']."</option>";
                                            }
                                        } catch (Exception $ex) {
                                            $message = "Erreur ".$ex->getMessage();
                                            $link = "afficherMatiere.php";
                                            displayInfo($message, $link);
                                        }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        
                        <tr>
                            <td>
                               Etudiant
                            </td>
                            <td>
                                <select name="etudiant" id="etudiant" required>
                                    <option value="">--SELECTIONNER L'ÉTUDIANT--</option>
                                    
                                </select>
                            </td>
                        </tr>

                        <tr>
                            <td>Note</td>
                            <td><input type="number" name="note" id="note" min="0" max="20" required></td>
                            
                        </tr>

                        <tr>
                            <td>Date d'évaluation</td>
                            <td><input type="date" name="date_d_evaluation" required></td>
                            
                        </tr>
                    </table>
                </div>

                <div class="bouton-area">
                    <button type="submit">Attribuer</button>
                    <button type="reset">Supprimer</button>
                </div>
            </form> 
        </div>
    </div>

</body>

<script language="javascript">
document.getElementById("matiere").addEventListener("change", function() {
    const matiereId = this.value;

    if (matiereId !== "") {
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "getEtudiants.php", true); 
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        xhr.onload = function() {
            if (this.status === 200) {
                document.getElementById("etudiant").innerHTML = this.responseText;
            }
        };

        xhr.send("id_matiere=" + encodeURIComponent(matiereId));
    } else {
        document.getElementById("etudiant").innerHTML = "<option value=''>--SELECTIONNER L'ÉTUDIANT--</option>";
    }
});
</script>



<script language="javascript" src="../js/script.js"></script>
</html>
