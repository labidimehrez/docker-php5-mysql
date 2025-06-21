<?php
// Récupération des variables d'environnement
$host = getenv('DB_HOST') ?: 'host.docker.internal';
$username = getenv('DB_USER') ?: 'root';
$password = getenv('DB_PASSWORD') ?: '';
$database = getenv('DB_NAME') ?: 'test';

echo "<h1>Test de connexion MySQL depuis PHP 5.6</h1>";

// Test de connexion avec MySQLi
echo "<h2>Test MySQLi</h2>";
$mysqli = new mysqli($host, $username, $password, $database);

if ($mysqli->connect_error) {
    echo "<p style='color: red;'>Erreur de connexion MySQLi: " . $mysqli->connect_error . "</p>";
} else {
    echo "<p style='color: green;'>Connexion MySQLi réussie!</p>";
    echo "<p>Version MySQL: " . $mysqli->server_info . "</p>";
    $mysqli->close();
}

// Test de connexion avec PDO
echo "<h2>Test PDO</h2>";
try {
    $dsn = "mysql:host=$host;dbname=$database;charset=utf8";
 
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    echo "<p style='color: green;'>Connexion PDO réussie!</p>";
    
    // Test d'une requête simple
    $stmt = $pdo->query("SELECT VERSION() as version");
    $version = $stmt->fetch(PDO::FETCH_ASSOC);
    echo "<p>Version MySQL via PDO: " . $version['version'] . "</p>";
    
} catch(PDOException $e) {
    echo "<p style='color: red;'>Erreur de connexion PDO: " . $e->getMessage() . "</p>";
}

// Affichage des informations PHP
echo "<h2>Informations PHP</h2>";
echo "<p>Version PHP: " . phpversion() . "</p>";
echo "<p>Extensions MySQL chargées: " . (extension_loaded('mysqli') ? 'MySQLi ✓' : 'MySQLi ✗') . " | " . (extension_loaded('pdo_mysql') ? 'PDO MySQL ✓' : 'PDO MySQL ✗') . "</p>";
?>