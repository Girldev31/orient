<?php
$servername = "localhost";
$username = "root";
$password = "";

try {
    // Connexion pour créer la base de données
    $conn = new PDO("mysql:host=$servername", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Création de la base de données
    $sql = "CREATE DATABASE IF NOT EXISTS revision";
    $conn->exec($sql);
    echo "Database 'revision' created successfully<br>";
} catch (PDOException $e) {
    echo "Error creating database: " . $e->getMessage() . "<br>";
}

$dbname = "revision";

try {
    // Connexion à la base de données
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Création de la table 'client'
    $sqlClient = "CREATE TABLE IF NOT EXISTS client (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        firstname VARCHAR(30) NOT NULL,
        lastname VARCHAR(30) NOT NULL,
        email VARCHAR(50),
        reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";
    $conn->exec($sqlClient);
    echo "Table 'client' created successfully<br>";

    // Création de la table 'produit'
    $sqlProduit = "CREATE TABLE IF NOT EXISTS produit (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        libelle VARCHAR(50) NOT NULL,
        description TEXT,
        prix INT(11) NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";
    $conn->exec($sqlProduit);
    echo "Table 'produit' created successfully<br>";

    // Insertion des données dans 'client'
    $sqlInsertClient = "INSERT INTO client (firstname, lastname, email)
                        VALUES ('John', 'Doe', 'john@example.com')";
    $conn->exec($sqlInsertClient);
    echo "Record inserted into 'client' successfully<br>";

    // Insertion des enregistrements manquants
    $conn->exec("INSERT INTO client (firstname, lastname, email) VALUES ('Jane', 'Smith', 'jane@example.com')");
    $conn->exec("INSERT INTO client (firstname, lastname, email) VALUES ('Alice', 'Johnson', 'alice@example.com')");

    // Affichage des données avant les mises à jour
    $stmt = $conn->query("SELECT * FROM client");
    $clients = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo "<pre>Clients avant mise à jour :\n";
    print_r($clients);
    echo "</pre>";

    // Mise à jour des données dans 'client'
    $updates = [
        "UPDATE client SET lastname='Sall' WHERE id=1",
        "UPDATE client SET lastname='Sarr' WHERE id=2",
        "UPDATE client SET lastname='Ndiaye' WHERE id=3"
    ];

    foreach ($updates as $sql) {
        $rowsAffected = $conn->exec($sql);
        echo ($rowsAffected > 0)
            ? "Mise à jour réussie pour : $sql<br>"
            : "Aucune ligne affectée pour : $sql<br>";
    }

    // Affichage des données après les mises à jour
    $stmt = $conn->query("SELECT * FROM client");
    $clients = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo "<pre>Clients après mise à jour :\n";
    print_r($clients);
    echo "</pre>";

    // Suppression
    $sqldeleteClient = "DELETE FROM client WHERE id=3";
    $conn->exec($sqldeleteClient);
    echo "Record deleted successfully<br>";

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage() . "<br>";
}

$conn = null;
?>
