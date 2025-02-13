<?php
    $category = $result["data"]['category']; 
    $movies = $result["data"]['movies']; 
?>

<h1>Liste des films</h1>

<?php
foreach($movies as $movie){ ?>
    <p><a href="index.php?ctrl=cinema&action=listPostsByMovies&id="><?= $movie ?></a> par <?= $movie->getDirector() ?></p>
<?php } ?>
