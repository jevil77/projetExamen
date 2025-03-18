<?php if (isset($_SESSION["message"])) {
            echo "<p>" . $_SESSION["message"] . "</p>";} ?>


<!-- Récupère le message en session et l'affiche dans la vue -->

<h3 class="message" style="color: red"><?= App\Session::getFlash("error") ?></h3>
<h3 class="message" style="color: green"><?= App\Session::getFlash("success") ?></h3>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">        
    <link rel="stylesheet" href="<?= PUBLIC_DIR ?>/css/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=add" />


    <title>Document</title>

   
</head>
<body>




    







<?php
    $movies = $result["data"]['movies']; 
?>

<h1>Liste des films</h1>


<a href="index.php?ctrl=cinema&action=addMovieForm" class="btn-add-movie">+ Ajouter un film </a>





<div class="movie_card" id="tomb">
  <div class="info_section">
    <div class="movie_header">
      <img class="locandina" src="https://mr.comingsoon.it/imgdb/locandine/235x336/53750.jpg"/>
      <h1>Tomb Raider</h1>
      <h4>2018, Roar Uthaug</h4>
      <span class="minutes">125 min</span>
      <p class="type">Action, Fantasy</p>
    </div>
    <div class="movie_desc">
      <p class="text">
        Lara Croft, the fiercely independent daughter of a missing adventurer, must push herself beyond her limits when she finds herself on the island where her father disappeared.
      </p>
    </div>
    <div class="movie_social">
      <ul>
        <li><i class="material-icons">share</i></li>
        <li><i class="material-icons"></i></li>
        <li><i class="material-icons">chat_bubble</i></li>
      </ul>
    </div>
  </div>
  <div class="blur_back tomb_back"></div>
</div>







 <div class="movie-list">
    <?php foreach ($movies as $movie) { ?>
        <div class="movie-card-img">
        
        <a href="index.php?ctrl=cinema&action=infosMovie&id=<?= $movie->getId() ?>">
            <p><?= $movie->getMovieTitle() ?></p>
            <img src="<?=$movie->GetImagePath() ?>" alt="affiche du film"></a>

            
            <div class="movie-info">
                <p>Réalisé par : <?= $movie->getUser() ?></p>
                <p>Année de sortie : <?= $movie->getReleaseDate() ?></p>
            </div>
        </div>
    <?php } ?>
</div> 





</body>
</html>