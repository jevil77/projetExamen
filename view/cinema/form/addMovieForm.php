


<?php
    $categories = $result["data"]['categories']; 
?>





    
    
<div class="custom-form">   
    
<form action="index.php?ctrl=cinema&action=addMovie" method="POST"enctype="multipart/form-data" >

    <label for="movieTitle">Titre du film :</label>
    <input type="text" id="movieTitle" name="movieTitle" placeholder="Titre du film" required>
    <br> 
    
    <label for="releaseDate">Année de sortie :</label>
    <input type="number" id="releaseDate" name="releaseDate" min=1900 max=2030 placeholder="Année de sortie" required>
    <br>

    <label for="duration">Durée (en minutes) :</label>
    <input type="number" id="duration" name="duration" min=1 max=300 placeholder="Durée en minutes" required>
    <br>

    <label for="synopsis">Synopsis :</label>
    <textarea id="synopsis" name="synopsis" placeholder="Résumé du film" required></textarea>
    <br>

    <label for="rating">Note :</label>
    <input type="number" id="rating" name="rating" min=0 max=10 placeholder="Note" required>
    <br>

  






    <!-- <label for="user"> Réalisateur :</label>
    <input type="text" id="director" name="director" placeholder="Réalisateur" required>
    <br>  -->

    
    <!-- <label for="affiche_film">URL de l'affiche :</label>
    <input type="url" id="affiche_film" name="affiche_film" placeholder="Lien de l'affiche" required>
    <br> -->
    <!-- <label for="trailer">Lien de la bande-annonce :</label>
    <input type="url" id="trailer" name="trailer" placeholder="URL du trailer">
    <br> -->
    
     <label for="category">Catégorie :</label>
    <select name="category_id" id= "category_id" required>
        <?php foreach ($categories as $category) { ?>
            <option value="<?= $category->getId() ?>"><?=$category->getCategoryName() ?></option>
        <?php } ?>
    </select> 

    <label>Sélectionner une image à télécharger:</label>
    <input type="file" name="fileToUpload" id="fileToUpload">

    <br>
     

    <button type="submit" name="submit">Ajouter le film</button>


    
</form>

</div> 