<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">        
    <link rel="stylesheet" href="<?= PUBLIC_DIR ?>/css/style.css">


    <title>Document</title>

   
</head>
<body>

<style>
        
        .movie-list {
            display: flex;
            flex-direction: column;
            gap: 20px;
            max-width: 800px;
            margin: 40px auto;
        }

        .movie1 {
            display: flex;
            align-items: center; 
            background-color: #2c3440;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

       
        .movie-info {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            color: white;
        }

        .movie-info h3 {
            font-size: 1.5rem;
            margin-bottom: 10px;
        }

        .movie-info p {
            font-size: 1rem;
            margin-bottom: 10px;
        }
</style>
    







<?php
    $movies = $result["data"]['movies']; 
?>

<h1>Liste des films</h1>











<div class="movie-list">
    <?php foreach ($movies as $movie) { ?>
        <div class="movie1">
        <img src="<?=$movie->GetImagePath() ?>" alt="affiche du film">
        <h3><a href="index.php?ctrl=cinema&action=infosMovies&id=<?= $movie->getId() ?>"><?= $movie->getMovieTitle() ?></a></h3>

            
            <div class="movie-info">
                <p>Réalisé par : <?= $movie->getUser() ?></p>
                <p>Année de sortie : <?= $movie->getReleaseDate() ?></p>
                
            </div>
        </div>
    <?php } ?>
</div>


<a href="index.php?ctrl=cinema&action=addMovieForm">Ajouter un film</a>



</body>
</html>