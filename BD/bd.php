<?php  
// Charger les données de configuration à partir d'un fichier externe ou des variables d'environnement  
$hostname = "localhost";  
$username = "your_username"; // Remplacez par votre nom d'utilisateur  
$password = "your_password"; // Remplacez par un mot de passe sécurisé  
$database = "ecommerce_cms";  
$port = "3307";  

// Établir la connexion à la base de données  
$conn = new mysqli($hostname, $username, $password, $database, $port);  

// Vérifier la connexion  
if ($conn->connect_error) {  
    // Ne pas révéler les détails de l'erreur aux utilisateurs  
    error_log("Connection failed: " . $conn->connect_error); // Loguer l'erreur  
    die("Failed to connect to database."); // Message générique pour l'utilisateur  
}  

// Définir le jeu de caractères UTF-8  
$conn->set_charset("utf8");  

// Si nécessaire, vous pouvez effectuer d'autres opérations ici, par exemple des requêtes.  

// Exemple : Vérification de la connexion réussie  
echo "Connected successfully to the database.";  

// Ajoutez votre logique d'application ici  

// Fermez la connexion à la base de données à la fin  
$conn->close();  
?>  
