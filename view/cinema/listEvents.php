<?php if (isset($_SESSION["message"])) {
            echo "<p>" . $_SESSION["message"] . "</p>";} ?>


<!-- Récupère le message en session et l'affiche dans la vue -->

<h3 class="message" style="color: red"><?= App\Session::getFlash("error") ?></h3>
<h3 class="message" style="color: green"><?= App\Session::getFlash("success") ?></h3>




<?php

$events = $result["data"]['events'];

?>

<div class="titre_section">
    <p>Les prochains évènements</p>

    <div class="movie-container1">
        <!-- Vérifie et affcihe uniquement les évènements à venir -->
        <?php if (!empty($events)) { 
            // Variable pour savoir si il y a un évènement futur
            $hasUpcomingEvents = false;
            foreach ($events as $event) { 
                // Récupère la date de l'évènement, la compare à celle d'aujour'hui, si la date est dans le futur, elle est affiché
                if (new DateTime($event->getEventDateTime()) > new DateTime()) {
                    $hasUpcomingEvents = true;
                    $places = $event->getPlaceAvailable(); 
                    
        ?>
              <div class="movie1">
                  <div class="event-card">
                    <a href="index.php?ctrl=cinema&action=infosMovie&id=<?= $event->getMovie()->getId() ?>">
                        <img src="<?= $event->getImagePath() ?>" alt="Affiche du film">
                    </a>
                    <div class="event-details">
                        <h3><?= $event->getEventName() ?></h3>
                        <p><strong><?= $event->getMovie()->getMovieTitle() ?></strong> - <?= $event->getMovie()->getReleaseDate() ?></p>
                        <p><?=$event->getMovie()->getSynopsis() ?>...</p>
                        <p><i class="fas fa-calendar-alt"></i> Date et heure : <?= $event->getEventDateTime() ?></p>
                        <p><i class="fas fa-map-marker-alt"></i> Lieu : <?= $event->getTheatre() ?></p>
                        <p><i class="fas fa-ticket-alt"></i> Places disponibles : <strong><?= $places ?></strong></p>
                        <a href="index.php?ctrl=cinema&action=bookEventForm&id=<?= $event->getId()?>">Réserver</a>
                    </div>
                  </div>
              </div>
        <?php 
                }
            } 
            if (!$hasUpcomingEvents) {
                echo "<p>Aucun événement à venir pour le moment.</p>";
            }
        } else { 
            echo "<p>Aucun événement à venir pour le moment.</p>";
        } 
        ?>
     </div>
</div>
