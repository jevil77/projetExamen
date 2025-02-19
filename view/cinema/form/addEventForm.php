



<div class="form">   
    
<form action="index.php?ctrl=cinema&action=addEvent" method="POST">

    <label for="eventName">Nom de l'évènement:</label>
    <input type="text" id="eventName" name="eventName" placeholder="Nom de l'évènement" required>
    <br> 
    
    <label for="eventDateTime">Date et heure de l'évèvement</label>
    <input type="number" id="eventDateTime" name="eventDateTime" placeholder="Date et heure de l'évènement" required>
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

    
    <!-- <label for="affiche_film">URL de l'affiche :</label>
    <input type="url" id="affiche_film" name="affiche_film" placeholder="Lien de l'affiche" required>
    <br> -->
    <!-- <label for="trailer">Lien de la bande-annonce :</label>
    <input type="url" id="trailer" name="trailer" placeholder="URL du trailer">
    <br> -->
    
     <!-- <label for="category">Catégorie :</label>
    <select name="category_id" id= "category_id" required>
        <?php foreach ($categories as $category) { ?>
            <option value="<?= $category->getId() ?>"><?=$category->getCategoryName() ?></option>
        <?php } ?>
    </select>  -->
     

    <button type="submit" name="submit">Créer l'évènement</button>


    
</form>

</div> 