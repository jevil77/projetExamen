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



        .btn-add-movie {
        display: inline-block;
        background-color: #ff4500; 
        text-decoration: none;
        color: #ffffff;
        padding: 10px 20px;
        font-size: 16px;
        font-weight: bold;
        border-radius: 8px;
        transition: background 0.3s, transform 0.2s;
        }
        
        .btn-add-movie:hover {
            
        background-color: #e63e00; 
        transform: scale(1.05);
        }
        .btn-add-movie:active {
        background-color: #cc3700;
        transform: scale(0.95);
        }


</style>


    







<?php
    $movies = $result["data"]['movies']; 
?>

<h1>Liste des films</h1>


<a href="index.php?ctrl=cinema&action=addMovieForm" class="btn-add-movie">+ Ajouter un film </a>












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





</body>
</html>