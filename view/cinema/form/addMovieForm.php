

<h1>crotte</h1>



    
    
<div class="form">   
    
<form action="index.php?ctrl=cinema&action=addMovie" method="POST">

    <label for="movieTitle">Titre du film :</label>
    <input type="text" id="movieTitle" name="movieTitle" placeholder="Titre du film" required>
    <br>
    
    <label for="releaseDate">Année de sortie :</label>
    <input type="number" id="releaseDate" name="releaseDate" placeholder="Année de sortie" required>
    <br>

    <label for="duration">Durée (en minutes) :</label>
    <input type="number" id="duration" name="duration" placeholder="Durée en minutes" required>
    <br>

    <label for="synopsis">Synopsis :</label>
    <textarea id="synopsis" name="synopsis" placeholder="Résumé du film" required></textarea>
    <br>

    <label for="rating">Note :</label>
    <input type="number" id="rating" name="rating" placeholder="Note" required>
    <br>

    <label for="director"> Réalisateur :</label>
    <input type="text" id="director" name="director" placeholder="Réalisateur" required>
    <br>

    
    <!-- <label for="affiche_film">URL de l'affiche :</label>
    <input type="url" id="affiche_film" name="affiche_film" placeholder="Lien de l'affiche" required>
    <br> -->
    <!-- <label for="trailer">Lien de la bande-annonce :</label>
    <input type="url" id="trailer" name="trailer" placeholder="URL du trailer">
    <br> -->

     

    <button type="submit" name="submit">Ajouter le film</button>


    
</form>