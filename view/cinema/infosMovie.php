<?php
// error_log();
// Importation de la classe Session situé dans la namespace App
use App\Session as Session;
// Récupère un objet movie
$movie = $result["data"]['movie']; 
$posts = $result["data"]['post'];
// var_dump($posts);


// Instance de LikerManager
$likerManager = new \Model\Managers\LikerManager();
// Compte le nombre de likes

$likeCount = $likerManager->countLikes($movie->getId());
var_dump($likerManager, $likeCount);
// Récupère l'utilisateur connecté
$user = \App\Session::getUser();
// Vérifie si l'utilisateur a déjà liké le film
$hasLiked = $user ? $likerManager->hasLiked($user->getId(), $movie->getId()) : false;
?>

<div class="movie-card">
<img src="<?= $movie->getImagePath() ?>" alt="<?= $movie->getMovieTitle() ?>" class="movie-poster">
<div class="movie-info">
    <h3><?= $movie->getMovieTitle() ?> (<?= $movie->getReleaseDate() ?>)</h3>
    <p><strong>Durée :</strong> <?= $movie->getDuration() ?> min</p>
    <p><strong>Note :</strong> <?= $movie->getRating() ?>/10</p>
    <p><strong>Réalisé par :</strong> <?= $movie->getUser() ?></p>
    <p><strong>Synopsis :</strong> <?= $movie->getSynopsis() ?></p>

 <div class="align-icons">
    <button class="like-btn" data-movie-id="<?= $movie->getId() ?>">
        <span class="like-icon"><?= $hasLiked ? '❤️' : '🤍' ?></span>
        <span class="like-count"><?= $likeCount ?></span>
    </button>
    <button class="like-btn">
    <a href="index.php?ctrl=cinema&action=addToWatchlist&id=<?= $movie->getId() ?>" class="btn-add-movie"><i class="fa-solid fa-plus fa-lg" style="color: #ffffff;"></i></a>
   </button>
   <button class="like-btn">
    <a href="index.php?ctrl=cinema&action=addPost&id=<?= $movie->getId() ?>" ><i class="fa-regular fa-comment fa-xl" style="color: #e50914;"></i></a>
   </button>
</div>

    
</div>
</div>


<h2>Poster un commentaire</h2>

<form  action="index.php?ctrl=cinema&action=addPostToMovie&id=<?= $movie->getId() ?>" method="POST" >

    <textarea name="text" rows="3" required placeholder="Écrire un message..."></textarea>

    <button type="submit" name="submit" >Envoyer</button>

</form>


<?php if (empty($posts)) { ?>
    <p>Aucun commentaire pour ce film, soyez le premier à le commenter ! </p>
    <?php } else { ?>
<?php foreach($posts as $post ){ ?>
    <p><a href="#"><?= $post->getText() ?> par <?= $post->getUser()->getPseudo() ?> le  <?=(new DateTime($post->getDateAdded()))->format('d/m/Y H:i')?></p>
<?php } ?>
<?php } ?>



<script>
document.addEventListener("DOMContentLoaded", function() {
    const likeBtn = document.querySelector(".like-btn");

    if (likeBtn) {
        likeBtn.addEventListener("click", function() {
            const movieId = this.getAttribute("data-movie-id");

            fetch(`index.php?ctrl=cinema&action=toggleLikeMovie&id=${movieId}`, {
                method: "GET",
                headers: {
                    "X-Requested-With": "XMLHttpRequest"
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === "success") {
                    // Met à jour l'affichage du bouton
                    const likeIcon = this.querySelector(".like-icon");
                    const likeCount = this.querySelector(".like-count");

                    likeIcon.textContent = data.liked ? "❤️" : "🤍";
                    likeCount.textContent = data.likeCount;
                } else {
                    alert(data.message);
                }
            })
            .catch(error => console.error("Erreur lors du like:", error));
        });
    }
});
</script>
 