<?php 
    session_start();
    if(!isset($_SESSION["AdminLogin"]) || !isset($_SESSION["AdminPassword"])){
        header("location:../adminLogin.html");
    }
?>
<?php
    require_once "db_connect.php"; 
    require_once "functions.php";   
    try {
        if (isset($_POST["login"])) {
            $login = explode("_", $_POST["login"]);
            if(count($login)==2){
                
                $loginNom = ucfirst(strtolower($login[0]));
                $loginPrenom = ucfirst(strtolower($login[1]));
                $nom = $loginNom."_".$loginPrenom;

                $stat = $con->prepare("SELECT * FROM accounts where (login like ?) ");
                $stat->bind_param("s",$nom);
                $stat->execute();
                $results = $stat->get_result();
        
                if ($rows = $results->fetch_assoc()) {
                    $response = "<tr><td><span><i class='fas fa-users'></span></td> <td>".$rows["login"]."</td> <td>".$rows["statut"]."</td>";
                    $statement2 = $con->prepare("SELECT role FROM role where (id_role = ?)");
                    $statement2->bind_param("i",$id);
                    $id = $rows["id_role"];
                    $statement2->execute();
                    $result2 = $statement2->get_result();
                    if($row2 = $result2->fetch_assoc()){
                        $response.="<td>".$row2["role"]."</td>";
                    }
                                        
                                        
                    $response.="</tr>";
                }else{
                    $response = "<tr><td></td> <td></td> <td>Aucun utilisateur trouvé</td> <td></td></tr>";
                }
            }else{
                $response = "<tr><td></td> <td></td> <td>Aucun utilisateur trouvé</td> <td></td></tr>";
            }        
            echo $response;
        }
        if (isset($_POST["loginActiver"])) {
            $login = explode("_", $_POST["loginActiver"]);
            if(count($login)==2){
                
                $loginNom = ucfirst(strtolower($login[0]));
                $loginPrenom = ucfirst(strtolower($login[1]));
                $nom = $loginNom."_".$loginPrenom;

                $stat = $con->prepare("SELECT * FROM accounts where (login like ?) ");
                $stat->bind_param("s",$nom);
                $stat->execute();
                $results = $stat->get_result();
        
                if ($rows = $results->fetch_assoc()) {
                    $response = "<tr><td><span><i class='fas fa-users'></span></td> <td>".$rows["login"]."</td> <td>".$rows["statut"]."</td>";
                    $statement2 = $con->prepare("SELECT role FROM role where (id_role = ?)");
                    $statement2->bind_param("i",$id);
                    $id = $rows["id_role"];
                    $statement2->execute();
                    $result2 = $statement2->get_result();
                    if($row2 = $result2->fetch_assoc()){
                        $response.="<td>".$row2["role"]."</td>";
                    }
                    $response.="<td class='action-button'> <a href='activerUtilisateur.php?id_account=".$rows['id_accounts']."' title='activer l utilisateur ".$rows['login']." ' onclick='return confirm(".'"Activer l utilisateur '.$row['login'].'?"'.")'><i class='fas fa-shield'></i></a></td>";
                                                            
                                        
                    $response.="</tr>";
                }else{
                    $response = "<tr><td></td> <td></td> <td>Aucun utilisateur trouvé</td> <td></td></tr>";
                }
            }else{
                $response = "<tr><td></td> <td></td> <td>Aucun utilisateur trouvé</td> <td></td></tr>";
            }        
            echo $response;
        }
        if (isset($_POST["loginSuspendre"])) {
            $login = explode("_", $_POST["loginSuspendre"]);
            if(count($login)==2){
                
                $loginNom = ucfirst(strtolower($login[0]));
                $loginPrenom = ucfirst(strtolower($login[1]));
                $nom = $loginNom."_".$loginPrenom;

                $stat = $con->prepare("SELECT * FROM accounts where (login like ?) ");
                $stat->bind_param("s",$nom);
                $stat->execute();
                $results = $stat->get_result();
        
                if ($rows = $results->fetch_assoc()) {
                    $response = "<tr><td><span><i class='fas fa-users'></span></td> <td>".$rows["login"]."</td> <td>".$rows["statut"]."</td>";
                    $statement2 = $con->prepare("SELECT role FROM role where (id_role = ?)");
                    $statement2->bind_param("i",$id);
                    $id = $rows["id_role"];
                    $statement2->execute();
                    $result2 = $statement2->get_result();
                    if($row2 = $result2->fetch_assoc()){
                        $response.="<td>".$row2["role"]."</td>";
                    }
                    $response.="<td class='action-button'></a> <a href='suspendreUtilisateur.php?id_account=".$rows['id_accounts']."' title='suspendre l utilisateur ".$rows['login']." ' onclick='return confirm(".'"Suspendre l utilisateur '.$rows['login'].'?"'.")'><i class='fas fa-x'></i></a></td>";
                                                                               
                                        
                    $response.="</tr>";
                }else{
                    $response = "<tr><td></td> <td></td> <td>Aucun utilisateur trouvé</td> <td></td></tr>";
                }
            }else{
                $response = "<tr><td></td> <td></td> <td>Aucun utilisateur trouvé</td> <td></td></tr>";
            }        
            echo $response;
        }

        
        if (isset($_POST["matriculeEtudiant"])) {
            
                
                $matricule = $_POST["matriculeEtudiant"];
                $statement = $con->prepare("SELECT id_etudiant, Matricule, nom, prenom, date_naissance, id_filiere FROM etudiants where matricule like ?");
                $statement->bind_param("s",$matricule);
                $statement->execute();
                $results = $statement->get_result();
        
                if ($row = $results->fetch_assoc()) {
                    $response="<tr>";
                        $response.="<td><span><i class='fas fa-user-graduate'></span></td>
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
                                $response.="<td>".trim($row2["nom_filiere"])."</td>";
                            }
                            
                                        
                    $response.="</tr>";
                }else{
                    $response = "<tr><td></td> <td></td> <td>Aucun etudiant trouvé</td> <td></td></tr>";
                }
                   
             echo $response;
        }

        if (isset($_POST["matriculeEtudiantSupprimer"])) {
            
                
            $matricule = $_POST["matriculeEtudiantSupprimer"];
            $statement = $con->prepare("SELECT id_etudiant, Matricule, nom, prenom, date_naissance, id_filiere FROM etudiants where matricule like ?");
            $statement->bind_param("s",$matricule);
            $statement->execute();
            $results = $statement->get_result();
    
            if ($row = $results->fetch_assoc()) {
                $response="<tr>";
                    $response.="<td><span><i class='fas fa-user-graduate'></span></td>
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
                            $response.="<td>".trim($row2["nom_filiere"])."</td>";
                        }
                        $response.="<td class='action-button'><a href='supprimerEtudiant.php?id=".$row['id_etudiant']."' title='supprimer l étudiant ".$row['nom']." ' onclick='return confirm(".'"Supprimer l etudiant '.$row['nom'].'?"'.")'><i class='fas fa-trash'></i></a></td>";
                                               
                $response.="</tr>";
            }else{
                $response = "<tr><td></td> <td></td> <td>Aucun etudiant trouvé</td> <td></td></tr>";
            }
               
        echo $response;
    }

    if (isset($_POST["matriculeEtudiantModifier"])) {
            
                
        $matricule = $_POST["matriculeEtudiantModifier"];
        $statement = $con->prepare("SELECT id_etudiant, Matricule, nom, prenom, date_naissance, id_filiere FROM etudiants where matricule like ?");
        $statement->bind_param("s",$matricule);
        $statement->execute();
        $results = $statement->get_result();

        if ($row = $results->fetch_assoc()) {
            $response="<tr>";
                $response.="<td><span><i class='fas fa-user-graduate'></span></td>
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
                        $response.="<td>".trim($row2["nom_filiere"])."</td>";
                    }
                    $response.="<td class='action-button'><a href='modifierEtudiant.php?id=".$row['id_etudiant']."' title='modifier l étudiant ".$row['nom']." '><i class='fas fa-edit'></i></a></td>";
                                                                
            $response.="</tr>";
        }else{
            $response = "<tr><td></td> <td></td> <td>Aucun etudiant trouvé</td> <td></td></tr>";
        }
           
        echo $response;
    }

    if (isset($_POST["matriculeEnseignant"])) {
            
                
        $matricule = $_POST["matriculeEnseignant"];
        $statement = $con->prepare("SELECT id_enseignant, Matricule, nom, prenom, email FROM enseignants where matricule like ?");
        $statement->bind_param("s",$matricule);
        $statement->execute();
        $results = $statement->get_result();

        if ($row = $results->fetch_assoc()) {
            $response="<tr>";

            $response.="<td><span><i class='fas fa-user-tie'></span></td>
                <td>".$row["Matricule"]."</td>
                <td>".$row["nom"]."</td>
                <td>".$row["prenom"]."</td>
                <td>".$row["email"]."</td>";
          
            $response.="</tr>";
        }else{
            $response = "<tr><td></td> <td></td> <td>Aucun etudiant trouvé</td> <td></td></tr>";
        }
           
        echo $response;
    }

    if (isset($_POST["matriculeEnseignantModifier"])) {
            
                
        $matricule = $_POST["matriculeEnseignantModifier"];
        $statement = $con->prepare("SELECT id_enseignant, Matricule, nom, prenom, email FROM enseignants where matricule like ?");
        $statement->bind_param("s",$matricule);
        $statement->execute();
        $results = $statement->get_result();

        if ($row = $results->fetch_assoc()) {
            $response="<tr>";

            $response.="<td><span><i class='fas fa-user-tie'></span></td>
                <td>".$row["Matricule"]."</td>
                <td>".$row["nom"]."</td>
                <td>".$row["prenom"]."</td>
                <td>".$row["email"]."</td>";
            $response.="<td class='action-button'></a> <a href='modifierEnseignant.php?id=".$row['id_enseignant']."' title='modifier l enseignant ".$row['nom']." '><i class='fas fa-edit'></i></a></td>";                                
            $response.="</tr>";
        }else{
            $response = "<tr><td></td> <td></td> <td>Aucun etudiant trouvé</td> <td></td></tr>";
        }
           
        echo $response;
    }

    if (isset($_POST["matriculeEnseignantSupprimer"])) {
            
                
        $matricule = $_POST["matriculeEnseignantSupprimer"];
        $statement = $con->prepare("SELECT id_enseignant, Matricule, nom, prenom, email FROM enseignants where matricule like ?");
        $statement->bind_param("s",$matricule);
        $statement->execute();
        $results = $statement->get_result();

        if ($row = $results->fetch_assoc()) {
            $response="<tr>";

            $response.="<td><span><i class='fas fa-user-tie'></span></td>
                <td>".$row["Matricule"]."</td>
                <td>".$row["nom"]."</td>
                <td>".$row["prenom"]."</td>
                <td>".$row["email"]."</td>";
            $response.="<td class='action-button'><a href='supprimerEnseignant.php?id=".$row['id_enseignant']."' title='supprimer l enseignant ".$row['nom']." ' onclick='return confirm(".'"Supprimer l enseignant '.$row['nom'].'?"'.")'><i class='fas fa-trash'></i></a></td>";
            $response.="</tr>";
        }else{
            $response = "<tr><td></td> <td></td> <td>Aucun etudiant trouvé</td> <td></td></tr>";
        }
           
        echo $response;
    }

    if (isset($_POST["nomfiliere"])) {
        
            
            $nom = ucwords(strtolower($_POST["nomfiliere"]));
            $nom.="%";

            $statement = $con->prepare("SELECT * FROM filieres where nom_filiere like ?");
            $statement->bind_param("s",$nom);
            $statement->execute();
            $results = $statement->get_result();
    
            if ($row = $results->fetch_assoc()) {
                $response="<tr>";
                $response.="<td><span><i class='fas fa-graduation-cap'></span></td>
                    <td>".$row["nom_filiere"]."</td>";

                $response.="</tr>";
            }else{
                $response = "<tr><td></td> <td>Aucunne filiere trouvée</td> </tr>";
            }
               
        echo $response;
    }

    if (isset($_POST["nomfiliereModifier"])) {
        
            
        $nom = ucwords(strtolower($_POST["nomfiliereModifier"]));
        $nom.="%";

        $statement = $con->prepare("SELECT * FROM filieres where nom_filiere like ?");
        $statement->bind_param("s",$nom);
        $statement->execute();
        $results = $statement->get_result();

        if ($row = $results->fetch_assoc()) {
            $response="<tr>";
            $response.="<td><span><i class='fas fa-graduation-cap'></span></td>
                <td>".$row["nom_filiere"]."</td>";
            $response.="<td class='action-button'> <a href='modifierFiliere.php?id=".$row['id_filiere']."' title='modifier la filiere ".$row['nom_filiere']." '><i class='fas fa-edit'></i></a></td>";
                                        
            $response.="</tr>";
        }else{
            $response = "<tr><td></td> <td>Aucunne filiere trouvée</td> </tr>";
        }
           
     echo $response;
    }

    if (isset($_POST["nomfiliereSupprimer"])) {
        
            
        $nom = ucwords(strtolower($_POST["nomfiliereSupprimer"]));
        $nom.="%";

        $statement = $con->prepare("SELECT * FROM filieres where nom_filiere like ?");
        $statement->bind_param("s",$nom);
        $statement->execute();
        $results = $statement->get_result();

        if ($row = $results->fetch_assoc()) {
            $response="<tr>";
            $response.="<td><span><i class='fas fa-graduation-cap'></span></td>
                <td>".$row["nom_filiere"]."</td>";
            $response.="<td class='action-button'> <a href='supprimerFiliere.php?id=".$row['id_filiere']."' title='supprimer la filiere ".$row['nom_filiere']." ' onclick='return confirm(".'"Supprimer la filiere '.$row['nom_filiere'].'?"'.")'><i class='fas fa-trash'></i></a></td>";
                                                                    
            $response.="</tr>";
        }else{
            $response = "<tr><td></td> <td>Aucunne filiere trouvée</td> </tr>";
        }
           
     echo $response;
    }

    if (isset($_POST["nommatiere"])) {
        
            
        $nom = ucwords(strtolower($_POST["nommatiere"]));
        $nom.="%";

        $statement = $con->prepare("SELECT id_matiere, nom_matiere, id_enseignant, id_filiere FROM matieres where nom_matiere like ?");
                                    
        $statement->bind_param("s",$nom);
        $statement->execute();
        $results = $statement->get_result();

        while ($row = $results->fetch_assoc()) {
            $response="<tr>";
            $response.="<td><span><i class='fas fa-chalkboard-teacher'></span></td>
            <td>".$row["nom_matiere"]."</td>";

            $statement3 = $con->prepare("SELECT nom, prenom FROM enseignants where (id_enseignant = ?)");
            $statement3->bind_param("i",$id);
            $id = $row["id_enseignant"];
            $statement3->execute();
            $result3 = $statement3->get_result();
            if($row3 = $result3->fetch_assoc()){
                $response.="<td>".$row3["nom"]." ".$row3["prenom"]."</td>";
            }

            $statement2 = $con->prepare("SELECT nom_filiere FROM filieres where (id_filiere = ?)");
            $statement2->bind_param("i",$id);
            $id = $row["id_filiere"];
            $statement2->execute();
            $result2 = $statement2->get_result();
            if($row2 = $result2->fetch_assoc()){
                $response.="<td>".$row2["nom_filiere"]."</td>";
            }                                             
            $response.="</tr>";
        }
           
     echo $response;
    }

    if (isset($_POST["nommatiereModifier"])) {
        
            
        $nom = ucwords(strtolower($_POST["nommatiereModifier"]));
        $nom.="%";

        $statement = $con->prepare("SELECT id_matiere, nom_matiere, id_enseignant, id_filiere FROM matieres where nom_matiere like ?");
                                    
        $statement->bind_param("s",$nom);
        $statement->execute();
        $results = $statement->get_result();

        while ($row = $results->fetch_assoc()) {
            $response="<tr>";
            $response.="<td><span><i class='fas fa-chalkboard-teacher'></span></td>
            <td>".$row["nom_matiere"]."</td>";

            $statement3 = $con->prepare("SELECT nom, prenom FROM enseignants where (id_enseignant = ?)");
            $statement3->bind_param("i",$id);
            $id = $row["id_enseignant"];
            $statement3->execute();
            $result3 = $statement3->get_result();
            if($row3 = $result3->fetch_assoc()){
                $response.="<td>".$row3["nom"]." ".$row3["prenom"]."</td>";
            }

            $statement2 = $con->prepare("SELECT nom_filiere FROM filieres where (id_filiere = ?)");
            $statement2->bind_param("i",$id);
            $id = $row["id_filiere"];
            $statement2->execute();
            $result2 = $statement2->get_result();
            if($row2 = $result2->fetch_assoc()){
                $response.="<td>".$row2["nom_filiere"]."</td>";
            }     
            $response.="<td class='action-button'> <a href='modifierMatiere.php?id=".$row['id_matiere']."' title='modifier la matiere ".$row['nom_matiere']." '><i class='fas fa-edit'></i></a></td>";
                                        
            $response.="</tr>";
        }
           
     echo $response;
    }

    if (isset($_POST["nommatiereSupprimer"])) {
        
            
        $nom = ucwords(strtolower($_POST["nommatiereSupprimer"]));
        $nom.="%";

        $statement = $con->prepare("SELECT id_matiere, nom_matiere, id_enseignant, id_filiere FROM matieres where nom_matiere like ?");
                                    
        $statement->bind_param("s",$nom);
        $statement->execute();
        $results = $statement->get_result();

        while ($row = $results->fetch_assoc()) {
            $response="<tr>";
            $response.="<td><span><i class='fas fa-chalkboard-teacher'></span></td>
            <td>".$row["nom_matiere"]."</td>";

            $statement3 = $con->prepare("SELECT nom, prenom FROM enseignants where (id_enseignant = ?)");
            $statement3->bind_param("i",$id);
            $id = $row["id_enseignant"];
            $statement3->execute();
            $result3 = $statement3->get_result();
            if($row3 = $result3->fetch_assoc()){
                $response.="<td>".$row3["nom"]." ".$row3["prenom"]."</td>";
            }

            $statement2 = $con->prepare("SELECT nom_filiere FROM filieres where (id_filiere = ?)");
            $statement2->bind_param("i",$id);
            $id = $row["id_filiere"];
            $statement2->execute();
            $result2 = $statement2->get_result();
            if($row2 = $result2->fetch_assoc()){
                $response.="<td>".$row2["nom_filiere"]."</td>";
            }     
            $response.="<td class='action-button'> <a href='supprimerMatiere.php?id=".$row['id_matiere']."' title='supprimer la matiere ".$row['nom_matiere']." ' onclick='return confirm(".'"Supprimer la matiere '.$row['nom_matiere'].'?"'.")'><i class='fas fa-trash'></i></a></td>";
                          
            $response.="</tr>";
        }
           
     echo $response;
    }


    }catch (Exception $ex) {
        $message = "Erreur ".$ex->getMessage();
        $link = "adminPanel.php";
        displayInfo($message, $link);
    }
?>



