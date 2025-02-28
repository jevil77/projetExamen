<?php
    $event = $result["data"]['event']; 

?>






<form action="index.php?ctrl=cinema&action=bookEvent" method="POST">

    <!-- <label for="pseudo">Pseudo</label>
    <input type="text" id="pseudo" name="pseudo" placeholder="Entrez votre pseudo" required>
    <br>

    
    <label for="email">Mail :</label>
    <input type="email" id="email" name="email" placeholder="Entrez votre mail" required>
    <br> -->

    <label for="reservePlace">Nombre de places :</label>
    <input type="number" id="reservePlace" name="reservePlace" min="1" max="5" required>
    <br>



    <button type="submit" name="submit">Confirmer</button>

</form>