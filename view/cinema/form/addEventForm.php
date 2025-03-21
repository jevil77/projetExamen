<?php if (isset($_SESSION["message"])) {
            echo "<p>" . $_SESSION["message"] . "</p>";} ?>


<!-- Récupère le message en session et l'affiche dans la vue -->

<h3 class="message" style="color: red"><?= App\Session::getFlash("error") ?></h3>
<h3 class="message" style="color: green"><?= App\Session::getFlash("success") ?></h3>




<?php
    $movies = $result["data"]['movies']; 

    ?>





<div class="cinema-form">   
    
    <form action="index.php?ctrl=cinema&action=addEvent" method="POST"  enctype="multipart/form-data">
        
        <label for="eventName">Nom de l'évènement:</label>
        <input type="text" id="eventName" name="eventName" placeholder="Nom de l'évènement" required>
        <br> 
        
        <label for="movie">Choisissez un film :</label>
        <select name="movie_id" id="movie" required>
            <?php foreach ($movies as $movie) { ?>

            <option value="<?= $movie->getId() ?>"><?=$movie->getMovieTitle() ?></option>
        <?php } ?>
    </select>

    
    <label for="eventDateTime">Date et heure de l'évèvement</label>
    <input type="datetime-local" id="eventDateTime" name="eventDateTime" placeholder="Date et heure de l'évènement" required>
    <br>

    <label for="placeAvailable">Nombre de place disponible :</label>
    <input type="number" id="placeAvailable" name="placeAvailable" min=0 max=500 placeholder="Nombre de place disponible" required>
    <br>

    <label for="theatre">Lieu de l'évènement</label>
    <input type="text" id="theatre" name="theatre" placeholder="Lieu de l'évènement" required>
    <br> 
    

    <label for="city">Ville</label>
    <input type="text" id="city" name="city" placeholder="Ville" required>
    <br>

    <label for="postalCode">Code Postal</label>
    <input type="number" id="code postal" name="postalCode" min=0 max=99999 placeholder="Code postal" required>
    <br> 

    
    
    <label>Sélectionner une image à télécharger:</label>
    <input type="file" name="fileToUpload" id="fileToUpload">

    <br>


    <button type="submit" name="submit">Créer l'évènement</button>
        
    </form>




    <!-- <label for="affiche_film">URL de l'affiche :</label>
    <input type="url" id="affiche_film" name="affiche_film" placeholder="Lien de l'affiche" required>
    <br> -->
    <!-- <label for="trailer">Lien de la bande-annonce :</label>
    <input type="url" id="trailer" name="trailer" placeholder="URL du trailer">
    <br> -->
    
    
     

   
    <br>


    


    
</form>

</div> 