<form action="index.php?ctrl=cinema&action=bookEvent" method="POST">
    <label for="placeAvailable">Nombre de places :</label>
    <input type="number" id="placeAvailable" name="placeAvailable" min="1" max="<?= $event->getPlaceAvailable() ?>" required>

    <input type="submit" name="submit" value="Réserver">
</form>