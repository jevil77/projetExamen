<?php
    $event = $result["data"]['event']; 

?>

<h2>Réserver vos places</h2>

<div class="cinema-form">

<form action="index.php?ctrl=cinema&action=bookEvent&id=<?= $event->getId(); ?>" method="POST">
<input type="hidden" name="event_id" value="">

    <label for="reservePlace">Nombre de places :</label>
    <input type="number" id="reservePlace" name="reservePlace" min="1" max="10" required>
    <br>

    <button type="submit" name="submit">Confirmer</button>
</form>

</div>