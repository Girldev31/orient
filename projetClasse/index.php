<?php

    // Start the session
    session_start();


    // Info de connexion

    require 'bd/conBD.php';

    // include_once 'pages/accueil.php';
    include 'bd/authentificationBD.php';
    // include 'pages/connexion.php';
    // session_unset(); permet de detruire la session 
    if(isset($_SESSION['user'])){ // Le client est connecte
        if(isset($_GET['disconnect'])){ // La personne souhaite se deconnecter
            session_unset();
        }

    }else{ // Le client n'est pas connecte
        // On verifie si on a des infos de connexion
        if(isset($_POST['connexion'])){
            $result = findUserByLoginAndPass($_POST['username'],$_POST['password']);
            
           //  
            if($result){ // Login et mot de passe correct
               // var_dump($result);
               $_SESSION['user'] = $result;
   
               // var_dump($_SESSION['user']['prenomClient']);
            }else{
               // Username or password incorrect. Redirection vers page connection
               header("location: index.php?page=connexion&errorMessage=incorrect");
            }
       
        }
    }

    include "pages/accueil.php";

    

    // $_GET permet de recuperer les informations directement sur l'url

    // gestion de la navigation entre les pages
    if(isset($_GET['page'])){  // On souhaite afficher une page precise
        // var_dump($_GET);
        include "pages/".$_GET['page'].".php";
    }else{ // On a pas precise quelle page on veut afficher
        include "pages/accueil.php"; 
    }
