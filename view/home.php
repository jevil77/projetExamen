<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= PUBLIC_DIR ?>/css/style.css">

    <title>Document</title>
</head>
<body>

<section class="banner">
    <img src="public/img/losthighway.jpg" alt="Affiche du film Whiplash">
</section>

<?php
    $movies = $result["data"]['movie']; 
    $events = $result["data"]['event'];
?>


<section class="section">
    <div class="movie-gallery">
        <a href="film.php">
            <h3>Derniers courts-métrages</h3>
        </a>
    </div>

    <div class="movie-container">
        
        <?php foreach ($movies as $movie) { ?>
            <div class="movie">
            <a href="index.php?ctrl=cinema&action=infosMovies&id=<?= $movie->getId() ?>">
                <img src="public/img/<?= $movie->getMoviePoster() ?>" alt="Affiche du film">
                
            <p class="movie-title"><?= $movie->getMovieTitle() ?></a></p>
            </diV>
            <?php  } ?>
        </div>
       
    </div>
</section>

<section>


<div class="titre_section">
    <p>Les prochains évènements</p>
</div>


<div class="movie-container1">
    <?php foreach ($events as $event) { ?>
    
    
        <!-- <?php var_dump($event); ?> -->

    <div class="movie1">
    <?php var_dump($event->getImagePath()); ?>

    
    
        <img src="public/uploads<?= $event->getImagePath()?>" alt="Affiche du film"> 
        <p><?= $event->getEventName() ?></p>
        <a href="index.php?ctrl=cinema&action=eventInfos&id=" class="event-btn">Évènement</a>
        <a href="index.php?ctrl=cinema&action=eventInfos&id=">
        <p><?= $event->getEventName() ?><?= $event->getEventDateTime() ?> au <?= $event->getTheatre()?> </p>
    </a>
       
    </div>
    <?php } ?>
</div>

    
   

                    









<!-- <div class="gallery">
        <div class="movie">
            <img src="https://via.placeholder.com/150x225" alt="Film 1">
            <div class="icons">
                <i class="fas fa-heart"></i>
                <i class="fas fa-eye"></i>
                <i class="fas fa-star"></i>
            </div>
        </div>
        <div class="movie">
            <img src="https://via.placeholder.com/150x225" alt="Film 2">
            <div class="icons">
                <i class="fas fa-heart"></i>
                <i class="fas fa-eye"></i>
                <i class="fas fa-star"></i>
            </div>
        </div>
        <div class="movie">
            <img src="https://via.placeholder.com/150x225" alt="Film 3">
            <div class="icons">
                <i class="fas fa-heart"></i>
                <i class="fas fa-eye"></i>
                <i class="fas fa-star"></i>
            </div>
        </div>
        <div class="movie">
            <img src="https://via.placeholder.com/150x225" alt="Film 4">
            <div class="icons">
                <i class="fas fa-heart"></i>
                <i class="fas fa-eye"></i>
                <i class="fas fa-star"></i>
            </div>
        </div>
        <div class="movie">
            <img src="https://via.placeholder.com/150x225" alt="Film 5">
            <div class="icons">
                <i class="fas fa-heart"></i>
                <i class="fas fa-eye"></i>
                <i class="fas fa-star"></i>
            </div>
        </div>
    </div>
 -->


    
</body>
</html>

