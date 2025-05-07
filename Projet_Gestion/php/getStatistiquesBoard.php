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
        if (isset($_POST["optionStatsID"])) {
            $choix = $_POST["optionStatsID"];
            if(strcmp($choix, "MeilleureFiliere")==0){
                $stat = $con->prepare("SELECT nom_filiere, COUNT(DISTINCT(E.id_etudiant)) nombre_etudiant, AVG(eval.note) moyenne, (count(case when eval.note >= 12 THEN E.id_etudiant end)*100.0)/count(E.id_etudiant) taux_validation  FROM etudiants as E, evaluations as eval, Matieres as mat, filieres as fil where (E.id_filiere = fil.id_filiere AND eval.id_matiere = mat.id_matiere AND eval.id_etudiant = E.id_etudiant AND mat.id_filiere = fil.id_filiere) GROUP BY (nom_filiere)  ORDER BY AVG(eval.note) DESC limit 1 ");
                $stat->execute();
                $results = $stat->get_result();

                $response = "<thead> <th></th> <th>Nom de la filiere</th> <th>Nombre d'etudiant</th>  <th>Moyenne Generale</th>  <th>Taux de réussite</th></thead> <tbody>";
                while ($rows = $results->fetch_assoc()) {
                    $response .= "<tr><td><span><i class='fas fa-chart-line'></span></td><td>".$rows["nom_filiere"]."</td> <td>".$rows["nombre_etudiant"]."</td><td> ".round($rows["moyenne"],2)."</td><td>".round($rows["taux_validation"],2)."%</td></tr>";
                }
 
                echo $response;
            }
            
            if(strcmp($choix, "MeilleursEtudiants")==0){
                $stat = $con->prepare("SELECT E.nom, E.prenom, AVG(eval.note) moyenne, nom_filiere  FROM etudiants as E, evaluations as eval, Matieres as mat, filieres as fil where (E.id_filiere = fil.id_filiere AND eval.id_matiere = mat.id_matiere AND eval.id_etudiant = E.id_etudiant AND mat.id_filiere = fil.id_filiere) GROUP BY (E.nom)  ORDER BY AVG(eval.note) DESC ");
                $stat->execute();
                $results = $stat->get_result();

                $response = "<thead> <th></th> <th>Nom </th> <th>Prenom</th>  <th>Moyenne Generale</th>  <th>Nom de la filiere</th></thead> <tbody>";
                while ($rows = $results->fetch_assoc()) {
                    $response .= "<tr><td><span><i class='fas fa-medal'></span></td><td>".$rows["nom"]."</td> <td>".$rows["prenom"]."</td><td> ".round($rows["moyenne"],2)."</td><td>".$rows["nom_filiere"]."</td></tr>";
                }
      
                echo $response;
            }
            
            if(strcmp($choix, "TauxDeValidationParMatiere")==0){
                $stat = $con->prepare("SELECT mat.nom_matiere, count(CASE WHEN eval.note>=12 then mat.id_matiere end) nombre_valide, count(CASE WHEN eval.note<12 then mat.id_matiere end) nombre_echec, (count(CASE WHEN eval.note>=12 then mat.id_matiere end)*100.0)/count(mat.id_matiere) taux_validation  FROM evaluations as eval, Matieres as mat where (eval.id_matiere = mat.id_matiere ) GROUP BY (mat.id_matiere)  ORDER BY taux_validation  DESC ");
                $stat->execute();
                $results = $stat->get_result();

                $response = "<thead> <th></th> <th>Nom de la matiere</th> <th>Nombre de validés </th>  <th>Nombre d'echecs</th>  <th>Taux de validation</th></thead> <tbody>";
                while ($rows = $results->fetch_assoc()) {
                    $response .= "<tr><td><span><i class='fas fa-list'></span></td><td>".$rows["nom_matiere"]."</td> <td>".$rows["nombre_valide"]."</td><td> ".$rows["nombre_echec"]."</td><td>".round($rows["taux_validation"],2)."%</td></tr>";
                }
      
                echo $response;
            }

            if(strcmp($choix, "TauxDeValidationParFiliere")==0){
                $stat = $con->prepare("SELECT fil.nom_filiere, count(CASE WHEN eval.note>=12 then mat.id_matiere end) nombre_valide, count(CASE WHEN eval.note<12 then mat.id_matiere end) nombre_echec, (count(CASE WHEN eval.note>=12 then mat.id_matiere end)*100.0)/count(mat.id_matiere) taux_validation  FROM evaluations as eval, Matieres as mat, filieres as fil where (eval.id_matiere = mat.id_matiere AND mat.id_filiere = fil.id_filiere) GROUP BY (fil.id_filiere)  ORDER BY taux_validation  DESC ");
                $stat->execute();
                $results = $stat->get_result();

                $response = "<thead> <th></th> <th>Nom de la filiere</th> <th>Nombre de validés </th>  <th>Nombre d'echecs</th>  <th>Taux de validation</th></thead> <tbody>";
                while ($rows = $results->fetch_assoc()) {
                    $response .= "<tr><td><span><i class='fas fa-list'></span></td><td>".$rows["nom_filiere"]."</td> <td>".$rows["nombre_valide"]."</td><td> ".$rows["nombre_echec"]."</td><td>".round($rows["taux_validation"],2)."%</td></tr>";
                }
      
                echo $response;
            }
           
            if(strcmp($choix, "PerformanceParEnseignant")==0){
                $stat = $con->prepare("SELECT ens.nom, ens.prenom, mat.nom_matiere, (count(CASE WHEN eval.note>=12 then mat.id_matiere end)*100.0)/count(mat.id_matiere) taux_validation  FROM evaluations as eval, Matieres as mat, enseignants as ens where (eval.id_matiere = mat.id_matiere AND ens.id_enseignant = mat.id_enseignant) GROUP BY (mat.id_matiere)  ORDER BY taux_validation  DESC ");
                $stat->execute();
                $results = $stat->get_result();

                $response = "<thead> <th></th> <th>Nom de l'enseignant</th> <th>Prenom de l'enseignant</th> <th>Nom de la matiere </th>  <th>Taux de validation</th></thead> <tbody>";
                while ($rows = $results->fetch_assoc()) {
                    $response .= "<tr><td><span><i class='fas fa-trophy'></span></td><td>".$rows["nom"]."</td><td> ".$rows["prenom"]."</td><td> ".$rows["nom_matiere"]."</td><td>".round($rows["taux_validation"],2)."%</td></tr>";
                }
      
                echo $response;
            }
            
            if(strcmp($choix, "NombreDEtudiantParFiliere")==0){
                $stat = $con->prepare("SELECT nom_filiere, COUNT(DISTINCT(E.id_etudiant)) nombre_etudiant FROM etudiants as E,  filieres as fil where (E.id_filiere = fil.id_filiere ) GROUP BY (nom_filiere) ORDER BY nombre_etudiant DESC ");
                $stat->execute();
                $results = $stat->get_result();

                $response = "<thead> <th></th> <th>Nom de la filiere</th> <th>Nombre d'etudiant</th></thead> <tbody>";
                while ($rows = $results->fetch_assoc()) {
                    $response .= "<tr><td><span><i class='fas fa-chart-line'></span></td><td>".$rows["nom_filiere"]."</td> <td>".$rows["nombre_etudiant"]."</td></tr>";
                }
 
                echo $response;
            }
            
           
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
        }
    }catch (Exception $ex) {
        $message = "Erreur ".$ex->getMessage();
        $link = "afficherMatiere.php";
        displayInfo($message, $link);
    }
?>

