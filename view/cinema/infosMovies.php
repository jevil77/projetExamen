<?php
    $movie = $result["data"]['movie']; 
    // var_dump('hello');
    var_dump($result["data"]['movie']);
?>




<?php  { ?>




    <p><a href="index.php?ctrl=cinema&action=infosMovies&id"><?= ($movie->getIdMovie()."".$movie->getMovieTitle()."   ". $movie->getReleaseDate()."  ". $movie->getDuration()."  ".$movie->getSynopsis()."  ".$movie->getRating()."  ".$movie->getDirector())?></a></p>

<?php } ?>







<!-- <a href="index.php?ctrl=cinema&action=deleteMovie&id="<?= $film["id_film"] ?>">Supprimer un film</a> -->