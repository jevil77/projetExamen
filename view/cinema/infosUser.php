


<?php
    $user = $result["data"]['user']; 
    $watchlist = $result['data']['watchlist'];
    
    
?>
<?php
// if (isset($user) && $user) {
//     // L'utilisateur est valide, on peut appeler getName()
//     echo $user->getName();
// } else {
//     // Si l'utilisateur n'est pas défini ou valide, afficher un message d'erreur
//     echo "Utilisateur non trouvé ou non connecté.";
// }
// ?>




<!-- <?php  { ?>
   <div class="user-card">
    <div class="user-info">
                <p>Nom : <?= $user->getName() ?></p>
                <p>Prénom : <?= $user->getFirstName() ?></p>
                <p>Pseudo : <?= $user->getPseudo() ?></p>
                <p>Rôle : <?= $user->getRole() ?></p>
                <p>Email : <?= $user->getEmail() ?></p>
                
            </div>

   

    
    </div> -->

    
    
<?php } ?>

<div class="user-card">
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
           <img src=" <?=$movie['imagePath'] ?>" alt=""></a>
    
        </div>
    
    
    <?php }?> 

    <?php } else { ?>
        <p class="no-movies">Aucun film dans cette watchlist.</p>
<?php } ?>

</div>