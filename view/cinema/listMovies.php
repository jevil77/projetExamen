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


<div class="list-movies-header">
       <h1>Films et courts métrages</h1>
         <a href="index.php?ctrl=cinema&action=addMovieForm" class="btn-add-movie">+ Ajouter un film </a>

</div>








<div class="movie-list">
    <?php foreach ($movies as $movie) { ?>
        <div class="movie-card1"> <!-- Conteneur principal -->
            <div class="movie-card-img">
                <a href="index.php?ctrl=cinema&action=infosMovie&id=<?= $movie->getId() ?>">
                    <p><?= $movie->getMovieTitle() ?></p>
                    <img src="<?=$movie->getImagePath() ?>" alt="Affiche du film">
                </a>
            </div>
            
            <div class="movie-info">
            <p><strong>Réalisé par :</strong> 
    <?php if ($movie->getUser()) {  ?>
        <a href="index.php?ctrl=cinema&action=infosUser&id=<?= $movie->getUser()->getId() ?>">
            <?= $movie->getUser()->getPseudo()?>
        </a>
    <?php }else { ?>
        Inconnu
    <?php } ?>
</p>

                <p><strong>Année de sortie :</strong> <?= $movie->getReleaseDate() ?></p>
               
            </div>
        </div>
    <?php } ?>
</div>





</body>
</html>