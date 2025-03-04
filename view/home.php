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
                <img src="<?= $movie->getImagePath() ?>" alt="Affiche du film">
               
                
            <p class="movie-title"><?= $movie->getMovieTitle() ?></a></p>
            <a href="index.php?ctrl=cinema&action=likeMovie&id=<?= $movie->getId() ?>"><i class="fa-regular fa-heart"></i> </a>
            </div>
            <?php  } ?>
        </div>
       
    </div>
</section>

<section>


<div class="titre_section">
    <p>Les prochains évènements</p>


<div class="movie-container1">
    <?php foreach ($events as $event) { ?>
    
    
    

    <div class="movie1">
   
    <div class="event-card">
       <a href="index.php?ctrl=cinema&action=infosMovies&id=<?= $event->getMovie()->getId() ?>">
           <img src="<?= $event->getImagePath() ?>" alt="Affiche du film">
        </a>
    
    <div class="event-details">
        <h3><p><?= $event->getEventName() ?></p></h3>
        <p><?= $event->getMovie()->getMovieTitle() ?> - <?= $event->getMovie()->getReleaseDate() ?></p>
        <p><?= $event->getMovie()->getSynopsis() ?></p>
        <p>Date et heure <?= $event->getEventDateTime() ?></p>
        <p> au <?= $event->getTheatre()?> </p>

        <a href="index.php?ctrl=cinema&action=bookEventForm&id=<?= $event->getId() ?>" class="details-btn1">Réserver</a>
    </div>
   </div>

    
        
    </div>
    <?php     
} ?>
</div>

</section>
   

                    









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

