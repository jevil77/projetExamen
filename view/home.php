

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
    <a href="index.php?ctrl=cinema&action=listEvents">Explore</a>


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
            <a href="index.php?ctrl=cinema&action=infosMovies&id=<?= $movie->getId() ?>">
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
    <?php foreach ($events as $event) { ?>
       <div class="swiper-slide">
        <div class="event-card">
          <a href="index.php?ctrl=cinema&action=infosMovies&id=<?= $event->getMovie()->getId()?>">
            <img src="<?= $event->getImagePath() ?>" alt="Affiche du film">
          </a>
          
            <h2><?= $event->getEventName() ?></h2>
            <p><?= $event->getMovie()->getMovieTitle()?> - <?= $event->getMovie()->getReleaseDate() ?></p>
            <p><?= $event->getMovie()->getSynopsis() ?></p>
            <p>Date et heure : <?= $event->getEventDateTime() ?></p>
            <p>Lieu : <?= $event->getTheatre() ?></p>
            <a href="index.php?ctrl=cinema&action=bookEventForm&id=<?= $event->getId() ?>" class="details-btn1">Réserver</a>
          
        </div>
       </div>
    <?php } ?>
  </div>
  <br>
  <br>

  <!-- Ajout de la pagination Swiper -->
  <div class="swiper-pagination"></div>
</div>

     
<main>
  <div>
    <span>discover</span>
    <h1>aquatic animals</h1>
    <hr>
    <p>Beauty and mystery are hidden under the sea. Explore with our application to know about Aquatic Animals.</p>
    <a href="#">download app</a>
  </div>
  <div class="swiper">
    <div class="swiper-wrapper">
      <div class="swiper-slide swiper-slide--one">
        <div>
          <h2>Jellyfish</h2>
          <p>Jellyfish and sea jellies are the informal common names given to the medusa-phase of certain gelatinous members of the subphylum Medusozoa, a major part of the phylum Cnidaria.</p>
          <a href="https://en.wikipedia.org/wiki/Jellyfish" target="_blank">explore</a>
        </div>
      </div>
      <div class="swiper-slide swiper-slide--two">
        <div>
          <h2>Seahorse</h2>
          <p>
            Seahorses are mainly found in shallow tropical and temperate salt water throughout the world. They live in sheltered areas such as seagrass beds, estuaries, coral reefs, and mangroves. Four species are found in Pacific waters from North America to South America.
          </p>
          <a href="https://en.wikipedia.org/wiki/Seahorse" target="_blank">explore</a>
        </div>
      </div>

      <div class="swiper-slide swiper-slide--three">

        <div>
          <h2>octopus</h2>
          <p>
            Octopuses inhabit various regions of the ocean, including coral reefs, pelagic waters, and the seabed; some live in the intertidal zone and others at abyssal depths. Most species grow quickly, mature early, and are short-lived.
          </p>
          <a href="https://en.wikipedia.org/wiki/Octopus" target="_blank">explore</a>
        </div>
      </div>

      <div class="swiper-slide swiper-slide--four">

        <div>
          <h2>Shark</h2>
          <p>
            Sharks are a group of elasmobranch fish characterized by a cartilaginous skeleton, five to seven gill slits on the sides of the head, and pectoral fins that are not fused to the head.
          </p>
          <a href="https://en.wikipedia.org/wiki/Shark" target="_blank">explore</a>
        </div>
      </div>

      <div class="swiper-slide swiper-slide--five">

        <div>
          <h2>Dolphin</h2>
          <p>
            Dolphins are widespread. Most species prefer the warm waters of the tropic zones, but some, such as the right whale dolphin, prefer colder climates. Dolphins feed largely on fish and squid, but a few, such as the orca, feed on large mammals such as seals.
          </p>
          <a href="https://en.wikipedia.org/wiki/Dolphin" target="_blank">explore</a>
        </div>
      </div>
    </div>
    <!-- Add Pagination -->
    <div class="swiper-pagination"></div>
  </div>
  <img src="https://cdn.pixabay.com/photo/2021/11/04/19/39/jellyfish-6769173_960_720.png" alt="" class="bg">
  <img src="https://cdn.pixabay.com/photo/2012/04/13/13/57/scallop-32506_960_720.png" alt="" class="bg2">
</main>






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


    

