<?php

require_once 'bd/conBD.php';


$conn = connect_db();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $question = trim($_POST['user_message']);
    $response = '';

    if (!empty($question)) {
        try {

            $query = "
                SELECT filieres.name, filieres.description 
                FROM mots_cles
                INNER JOIN filieres ON mots_cles.filiere_id = filieres.id
                WHERE :question LIKE CONCAT('%', mots_cles.keyword, '%')
            ";

            $stmt = $conn->prepare($query);
            $stmt->bindValue(':question', $question, PDO::PARAM_STR);
            $stmt->execute();

            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if ($results) {
                $response = "Voici les informations sur les filières correspondantes à votre question :<br><br>";
                foreach ($results as $row) {
                    $response .= "<strong>" . htmlspecialchars($row['nom_filiere']) . "</strong>: " . htmlspecialchars($row['description']) . "<br><br>";
                }
            } else {
                $response = "Désolé, je ne trouve pas de filière correspondante à votre question.";
            }
        } catch (PDOException $e) {
            $response = "Erreur lors de la récupération des données : " . $e->getMessage();
        }
    } else {
        $response = "Veuillez poser une question.";
    }
}
