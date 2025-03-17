<?php
    $users = $result["data"]['users']; 
    //var_dump($utilisateurs);?>



<h1>Liste des utilisateurs</h1>


<div class="profil-card">
    <div class="profil-info-card">
  <?php foreach($users as $user ){ ?>
    <p><a href="index.php?ctrl=cinema&action=infosUser&id=<?=$user->getId()?>"><?= $user->getPseudo()?></a></p>
   <?php } ?>
  </div>
</div>