<?php
    $user = $result["data"]['user']; 
    // var_dump('hello');
    //var_dump($result["data"]['user']);
?>




<?php  { ?>
   <div class="user-card">
    <div class="user-info">
                <p>Nom : <?= $user->getName() ?></p>
                <p>Prénom : <?= $user->getFirstName() ?></p>
                <p>Pseudo : <?= $user->getPseudo() ?></p>
                <p>Rôle : <?= $user->getRole() ?></p>
                <p>Email : <?= $user->getEmail() ?></p>
                
            </div>
    </div>

    
    
<?php } ?>