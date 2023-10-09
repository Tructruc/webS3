<?php
include 'include/identifiants.php'; // Je versionne mes TP avec Github donc pour eviter de donner mes identifiants, je les stocke dans un fichier non versionné

$hostname = 'localhost';
$database = 'my67';



try {
    // Create a new PDO instance
    $pdo = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);

    // Set PDO error mode to exception for better error handling
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "Connected to the database successfully!";
} catch (PDOException $e) {
    // Handle any errors that occur during database connection
    die("Error: " . $e->getMessage());
}
?>
