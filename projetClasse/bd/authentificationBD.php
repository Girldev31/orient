<?php

    require_once 'conBD.php';

    function findUserByLoginAndPass($login, $mdp)
    {
    //On définit la la requete
    $sql = "SELECT * FROM client WHERE login='$login' AND password='$mdp'";
    
    //on recupère la variable qui a été définit dans conBD.php
    // Cette variable contient la liaison à la BD Donc il nous permettra d'accèder aux fonctions d'exécution des requêtes
    global $connexion; // Obligatoirement, on met le mm nom que dans connexionect_bdd.php

    // Exécution de la requête

    $exe = $connexion->query($sql); //on utilise la fonction query car on a une requête SELECT

    // Retourner le résultat trouvé
    $result  = $exe->fetch();
    //var_dump($result);
    return $result; // fetch() parce que cette requete retourne au plus un résultat
    }


//findUserByLoginAndPass('mdiop','password123');