<?php
    $users = $result["data"]['users']; 
    //var_dump($utilisateurs);?>



<?php foreach($users as $user ){ ?>
    <p><a href="index.php?ctrl=cinema&action=infosUsers&id=<?=$user->getId()?>"><?= $user->getPseudo()?></p>
<?php } ?>