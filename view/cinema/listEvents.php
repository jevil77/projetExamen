




<?php

$events = $result["data"]['events'];

?>

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
                        <p> au <?= $event->getTheatre() ?> </p>

                        <a href="index.php?ctrl=cinema&action=bookEventForm&id=<?= $event->getId()?>" class="details-btn1">Réserver</a>
                    </div>
                  </div>
            </div>
        <?php } ?>
     </div>
</div>
