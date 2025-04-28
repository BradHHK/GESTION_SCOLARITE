<?php
$host = '127.0.0.1';
$db = 'gestion_scolarite'; 
$user = 'root'; 
$pass = ''; 
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $date_naissance = $_POST['date_naissance'];
    $id_filiere = $_POST['id_filiere'];


    $sql = "INSERT INTO etudiants (nom, prenom, date_naissance, id_filiere) VALUES (?, ?, ?, ?)";
    
    try {
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$nom, $prenom, $date_naissance, $id_filiere]);
        echo "Étudiant ajouté avec succès.";
    } catch (\PDOException $e) {
        echo "Erreur lors de l'ajout de l'étudiant: " . $e->getMessage();
    }
}
?>