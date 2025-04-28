<?php
$servername = "127.0.0.1";
$username = "root"; 
$password = ""; 
$database = "gestion_scolarite"; 
$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $matricule = mysqli_real_escape_string($conn, $_POST['matricule']);
    $nom = mysqli_real_escape_string($conn, $_POST['nom']);
    $prenom = mysqli_real_escape_string($conn, $_POST['prenom']);
    $date_naissance = mysqli_real_escape_string($conn, $_POST['date_naissance']);
    $id_filiere = mysqli_real_escape_string($conn, $_POST['id_filiere']);

 
    $sql = "INSERT INTO etudiants (Matricule, nom, prenom, date_naissance, id_filiere) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);

  
    mysqli_stmt_bind_param($stmt, "ssssi", $matricule, $nom, $prenom, $date_naissance, $id_filiere);

   
    if (mysqli_stmt_execute($stmt)) {
        echo "Étudiant ajouté avec succès.";
    } else {
        echo "Erreur lors de l'ajout de l'étudiant: " . mysqli_error($conn);
    }

    
    mysqli_stmt_close($stmt);
}


mysqli_close($conn);
?>