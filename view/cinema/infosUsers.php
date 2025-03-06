


<?php
    $user = $result["data"]['user']; 
    // var_dump('hello');
    //var_dump($result["data"]['user']);
?>
<?php
if (isset($user) && $user) {
    // L'utilisateur est valide, on peut appeler getName()
    echo $user->getName();
} else {
    // Si l'utilisateur n'est pas défini ou valide, afficher un message d'erreur
    echo "Utilisateur non trouvé ou non connecté.";
}
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