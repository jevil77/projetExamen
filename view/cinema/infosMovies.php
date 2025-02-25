<?php
    $movie = $result["data"]['movie']; 
    // var_dump('hello');
    //var_dump($result["data"]['movie']);
?>




<?php  { ?>

    <div class="movie-card">
    <img src="<?= $movie->getImagePath() ?>" alt="<?= $movie->getMovieTitle() ?>" class="movie-poster">
    <div class="movie-info">
        <h3><?= $movie->getMovieTitle() ?> (<?= $movie->getReleaseDate() ?>)</h3>
        <p><strong>Durée :</strong> <?= $movie->getDuration() ?> min</p>
        <p><strong>Note :</strong> <?= $movie->getRating() ?>/10</p>
        <p><strong>Synopsis :</strong> <?= $movie->getSynopsis() ?></p>
        <p><strong>Réalisé par :</strong> <?= $movie->getUser() ?></p>
        <a href="index.php?ctrl=cinema&action=infosMovies&id=<?= $movie->getId() ?>" class="details-btn">Voir plus</a>
    </div>
</div>


   
<?php } ?>










<!-- <a href="index.php?ctrl=cinema&action=deleteMovie&id="<?= $film["id_film"] ?>">Supprimer un film</a> -->