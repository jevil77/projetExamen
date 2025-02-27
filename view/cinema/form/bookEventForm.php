<?php
    $events = $result["data"]['events']; 

?>


<div class="custom-form">  


<form action="index.php?ctrl=cinema&action=bookEvent" method="POST">

    <label for="pseudo">Pseudo</label>
        <input type="text" id="pseudo" name="pseudo" placeholder="Entrez votre pseudo" required>
        <br>

        
        <label for="email">Mail :</label>
        <input type="email" id="email" name="email" placeholder="Entrez votre mail" required>
        <br>
        

    <label for="event">Choisissez un évènement :</label>
        <select name="event" id="event" required>
            <?php foreach ($events as $event) { ?>

            <option value="<?= $event->getIdEvent() ?>"><?=$event->getEventName() ?> - <?=$event->getMovie()->getMovieTitle()?> ( <?= $event->getPlaceAvailable() ?> places restantes )</option>

        <?php } ?>
        </select>
        <br>

    <label for="placeAvailable">Nombre de places :</label>
    <input type="number" id="placeAvailable" name="placeAvailable" min="1" max="5" required>
    <br>



    <input type="submit" name="submit" value="Réserver">
</form>

</div>



 
    
