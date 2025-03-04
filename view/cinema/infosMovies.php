
<?php
// error_log();
use App\Session as Session;

$movie = $result["data"]['movie']; 
$likerManager = new \Model\Managers\LikerManager();
$likeCount = $likerManager->countLikes($movie->getId());
$user = \App\Session::getUser();
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

    <!-- Bouton de like -->
    <button class="like-btn" data-movie-id="<?= $movie->getId() ?>">
        <span class="like-icon"><?= $hasLiked ? '❤️' : '🤍' ?></span>
        <span class="like-count"><?= $likeCount ?></span>
    </button>
</div>
</div>


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
 