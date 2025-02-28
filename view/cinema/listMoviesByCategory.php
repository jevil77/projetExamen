<?php
    $category = $result["data"]['category']; 
    $movies = $result["data"]['movies']; 
?>

<h1>Liste des films dans la catégorie :</h1>


<?php 
if (empty($movies)) { ?>
   
<?php } else { ?>
   
<?php foreach($movies as $movie ){ ?>
    <p><a href="index.php?ctrl=cinema&action=listPostsByMovies&id="><?= $movie->getId() ?><?= $movie->getMovieTitle() ?></a> réalisé par <?= $movie->getUser() ?> . Année de sortie : <?=$movie->getReleaseDate()?></p>
<?php } ?>
<?php } ?>
