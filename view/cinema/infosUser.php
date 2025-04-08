


<?php
    $user = $result["data"]['user']; 
    $watchlist = $result['data']['watchlist'];
    $events = $result['data']['events'];

    
?>

    
<?php
$images = [
    'public/img/pexelsmyatezhny.jpg',
    'public/img/pexelsnathanengel.jpg',
    'public/img/pexelspixabay.jpg',
];

$randomImage = $images[array_rand($images)]; // Sélection aléatoire
?>


<div class="user-card" style="background-image: url('<?= $randomImage; ?>');">
    <span class="user-info-holder">
        <h2 class="name"><?= $user->getFirstName() ?> <?= $user->getName() ?></h2>
        <span class="skill">Rôle : <?= $user->getRole() ?></span>
        
        <p><i class="fa-solid fa-envelope fa-xl" style="color: #e63946;"></i> <?= $user->getEmail() ?></p>
        <p><i class="fa-solid fa-user fa-xl" style="color: #e63946;"></i> <?= $user->getPseudo() ?></p>
      <div class="social">
        <i class="fa-brands fa-facebook fa-xl" style="color: #e63946;"></i>
        <i class="fa-brands fa-instagram fa-xl" style="color: #e63946;"></i>
       </div>
       
    </span>
</div>


<h1> Watchlist </h1>


<div class="watchlist img">

<?php if (!empty($watchlist)) { ?>

    <?php foreach ($watchlist as $movie) {?>
        <div class="film">        
        <a href="index.php?ctrl=cinema&action=infosMovie&id=<?= $movie['id_movie'] ?>"> 
        <p><?=$movie['movieTitle'] ?></p>
           <img src=" <?=$movie['imagePath'] ?>" alt="affiche de film"></a>
    
        </div>
    
    
    <?php }?> 

    <?php } else { ?>
        <p class="no-movies">Aucun film dans cette watchlist.</p>
<?php } ?>

</div>

<h1>Événements à venir</h1>



