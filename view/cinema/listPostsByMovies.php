<?php
    $movie = $result["data"]['movies']; 
    $posts = $result["data"]['posts']; 
?>



<h1>Liste des posts par films</h1>


<?php 
if (empty($posts)) { ?>
    <p>Aucun post dans ce topic !</p>
<?php } else { ?>

<?php foreach($posts as $post ){ ?>
    <?= $post->getText()?></a> Par <?= $post->getUser() ?> le <?=$post->getDateAdded()?></p>
<?php } ?>
<?php } ?>







<!-- <div class="form">
<form action="index.php?ctrl=forum&action=addPostToTopic&id=<?= $topic->getId() ?>" method="POST">


    <label for="post">Post :</label>
    <textarea id="texte" name="texte" placeholder="Commentaires" required></textarea>
    <br>

    <button type="submit" name="submit">Ajouter le Commentaire</button>
</form>
  -->



