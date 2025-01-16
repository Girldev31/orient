<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<nav class="navbar navbar-expand-sm bg-light">
  <div class="container-fluid">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="index.php?page=accueil">Accueil</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.php?page=categorie">Categorie</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.php?page=contact">Contact</a>
      </li>
      <?php
        if(!isset($_SESSION['user'])){ // Si la personne n'est pas connecte

        
      ?>
      <li class="nav-item">
        <a class="nav-link" href="index.php?page=connexion">Connexion</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.php?page=inscription">Inscription</a>
      </li>
      <?php
        }else{ // Si quelqu'un est connecte
      ?>
        <li class="nav-item">
        <a class="nav-link" href="index.php?disconnect=yes">Se deconnectet</a>
        </li>
      <?php
         }
      ?>

    </ul>
  </div>
</nav>
