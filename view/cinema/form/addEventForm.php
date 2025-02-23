<?php
    $movies = $result["data"]['movies']; 

    ?>





<div class="form">   
    
    <form action="index.php?ctrl=cinema&action=addEvent" method="POST">
        
        <label for="eventName">Nom de l'évènement:</label>
        <input type="text" id="eventName" name="eventName" placeholder="Nom de l'évènement" required>
        <br> 
        
        <label for="movie">Choisissez un film :</label>
        <select name="movie_id" id="movie" required>
            <?php foreach ($movies as $movie) { ?>

            <option value="<?= $movie->getId() ?>"><?=$movie->getMovieTitle() ?></option>
        <?php var_dump($movie); } ?>
    </select>

    
    <label for="eventDateTime">Date et heure de l'évèvement</label>
    <input type="text" id="eventDateTime" name="eventDateTime" placeholder="Date et heure de l'évènement" required>
    <br>

    <label for="placeAvailable">Nombre de place disponible :</label>
    <input type="number" id="placeAvailable" name="placeAvailable" placeholder="Nombre de place disponible" required>
    <br>

    <label for="theatre">Lieu de l'évènement</label>
    <input type="text" id="theatre" name="theatre" placeholder="Nom de l'évènement" required>
    <br> 
    

    <label for="city">Ville</label>
    <input type="text" id="city" name="city" placeholder="Ville" required>
    <br>

    <label for="postalCode">Code Postal</label>
    <input type="number" id="code postal" name="postalCode" placeholder="Code postal" required>
    <br> 

    <form action="upload.php" method="post" enctype="multipart/form-data">
        Select image to upload:
         <input type="file" name="fileToUpload" id="fileToUpload">
         <input type="submit" value="Upload Image" name="submit">
    </form>

    <!-- <label for="affiche_film">URL de l'affiche :</label>
    <input type="url" id="affiche_film" name="affiche_film" placeholder="Lien de l'affiche" required>
    <br> -->
    <!-- <label for="trailer">Lien de la bande-annonce :</label>
    <input type="url" id="trailer" name="trailer" placeholder="URL du trailer">
    <br> -->
    
    
     

    <button type="submit" name="submit">Créer l'évènement</button>


    
</form>

</div> 