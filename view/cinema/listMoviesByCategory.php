<?php
    $category = $result["data"]['category']; 
    $movies = $result["data"]['movies']; 
?>

<h1>Liste des films dans la catégorie :</h1><?= htmlspecialchars($category) ?>

<?php 
if (empty($movies)) { 
    echo "<p>Aucun film disponible.</p>";
} else { 
    ?>
    <div class="list-by-category">
        <?php foreach($movies as $movie ){ ?>
            <div class="list-by-category .film">
                <a href="index.php?ctrl=cinema&action=infosMovie&id=<?= $movie->getId() ?>">
                    <div class="list-by-category img">
                        <img src=" <?=$movie->getImagePath() ?>" alt="">
                    </div>
                    <p class="movie-title"><?= $movie->getMovieTitle() ?></p>
                    <p>Réalisé par <?= $movie->getUser() ?>. Année de sortie : <?= $movie->getReleaseDate() ?></p>
                </a>
            </div>
        <?php } ?>
    </div>
<?php } ?>
