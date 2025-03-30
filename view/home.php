<?php
    $movies = $result["data"]['movie']; 
    $events = $result["data"]['event'];
?>


 <div class="hero">

<video autoplay loop muted plays-inline class="back-video">
      <source src="public/video/cinema.mp4" type="video/mp4">
</video>
    


  <div class="content">
    <h1>Ciné Events</h1>

    <h2>Vous êtes réalisateur et cherchez à vous faire connaître ? Vous êtes à la bonne place ! Créez sans plus attendre votre évènement cinéma !</h2>

    <h3>Passionné de cinéma indépendant et de courts métrages, venez faire de nombreuses découvertes en réservant vos places pour des évènements uniques !</h3>
    <a href="index.php?ctrl=cinema&action=listEvents">Découvrez les évènements</a>


  </div>

</div>


            
<section class="section">
    <div class="movie-gallery">
        <a href="film.php">
            <h3>Derniers courts-métrages</h3>
        </a>
    </div>

    <div class="movie-container">
        
        <?php foreach ($movies as $movie) { ?>
            <div class="movie">
            <a href="index.php?ctrl=cinema&action=infosMovie&id=<?= $movie->getId() ?>">
                <img src="<?= $movie->getImagePath() ?>" alt="Affiche du film">
               
                
            <p class="movie-title"><?= $movie->getMovieTitle() ?></a></p>
            <a href="index.php?ctrl=cinema&action=likeMovie&id=<?= $movie->getId() ?>"></a>
            </div>
            <?php  } ?>
        </div>
       
    </div>
</section>

<section>


<div class="titre_section">
    <p>Les prochains évènements</p>

        </div>



<div class="swiper">
  <div class="swiper-wrapper">
    <?php 
    
    $hasUpcomingEvents = false; // Variable pour vérifier les événements futurs
    foreach ($events as $event) { 
        if (new DateTime($event->getEventDateTime()) > new DateTime()) {
            $hasUpcomingEvents = true; // Un événement futur existe
    ?>
       <div class="swiper-slide">
        <div class="event-card1">
          <a href="index.php?ctrl=cinema&action=infosMovie&id=<?= $event->getMovie()->getId() ?>">
            <img src="<?= $event->getImagePath() ?>" alt="Affiche du film">
          </a>
          
          <h2><?= $event->getEventName() ?></h2>
          <p><?= $event->getMovie()->getMovieTitle()?> - <?= $event->getMovie()->getReleaseDate() ?></p>
          <p><?= $event->getMovie()->getSynopsis() ?></p>
          <p><i class="fas fa-calendar-alt"></i> Date et heure : <?= $event->getEventDateTime() ?></p>
          <p><i class="fas fa-map-marker-alt"></i> Lieu : <?= $event->getTheatre() ?></p>
          <?php if ($event->getPlaceAvailable() > 0) { ?>
            <a href="index.php?ctrl=cinema&action=bookEventForm&id=<?= $event->getId() ?>" class="details-btn2">Réserver</a>
          <?php } else { ?>
            <p class="sold-out">Complet</p>
          <?php } ?>
          
        </div>
       </div>
    <?php 
        }
    } 
    ?>
  </div>

  <?php if (!$hasUpcomingEvents) { ?>
    <p class="no-events">Aucun événement à venir pour le moment.</p>
  <?php } ?>
</div>

  </div>
  <br>
  <br>

  <!-- Ajout de la pagination Swiper -->
  <div class="swiper-pagination"></div>
</div>



    <div class="parallax"></div>
    <div class="content-parallax">
        <h1>Welcome to My Parallax Website</h1>
        <p>This is a simple example of a parallax scrolling effect.</p>
    </div>
    <div class="parallax"></div>
    <div class="content-parallax">
        <h1>Another Section</h1>
        <p>More content goes here.</p>
    </div>
   






     






    

