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
        <!-- Vérifie que $events contient des données -->
        <?php if (!empty($events)) { 
            // Variable pour vérifier si il y a des évènements à venir
            $hasUpcomingEvents = false;
            foreach ($events as $event) { 
                // Vérifie si l'évènement est dans le futur
                if (new DateTime($event->getEventDateTime()) > new DateTime()) {
                    $hasUpcomingEvents = true;
        ?>
              <div class="movie1">
                  <div class="event-card">
                    <a href="index.php?ctrl=cinema&action=infosMovie&id=<?= $event->getMovie()->getId() ?>">
                        <img src="<?= $event->getImagePath() ?>" alt="Affiche du film">
                    </a>

                    <div class="event-details">
                        <h3><p><?= $event->getEventName() ?></p></h3>
                        <p><?= $event->getMovie()->getMovieTitle() ?> - <?= $event->getMovie()->getReleaseDate() ?></p>
                        <p><?= $event->getMovie()->getSynopsis() ?></p>
                        <p>Date et heure : <?= $event->getEventDateTime() ?></p>
                        <p>Lieu : <?= $event->getTheatre() ?></p>
                        <p>Places disponibles : <?= $event->getPlaceAvailable() ?></p>

                        <a href="index.php?ctrl=cinema&action=bookEventForm&id=<?= $event->getId()?>" class="details-btn1">Réserver</a>
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
