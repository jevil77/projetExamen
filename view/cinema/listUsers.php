<?php
    $users = $result["data"]['users']; 
    //var_dump($utilisateurs);?>



<h1>Liste des utilisateurs</h1>


<div class="container1">
    <div class="profil-card"> 
        
  <?php foreach($users as $user ){ ?>
    <p><a href="index.php?ctrl=cinema&action=infosUser&id=<?=$user->getId()?>"><?= $user->getPseudo()?></a></p>
    <p> 
    <?php if ($user->getBan()) { ?>
    <a href="index.php?ctrl=admin&action=unbanUser&id=<?= $user->getId() ?>" class="btn-ban">Débannir</a>
<?php } else { ?>
    <a href="index.php?ctrl=admin&action=banUser&id=<?= $user->getId() ?>" class="btn-ban">Bannir</a>
<?php } ?>

</p>

   <?php } ?>
</div>
</div>

