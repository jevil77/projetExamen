<?php
    $user = $result["data"]['user']; 
    // var_dump('hello');
    var_dump($result["data"]['user']);
?>




<?php  { ?>




    <p><a href="index.php?ctrl=cinema&action=infosUsers&id"><?= ($user->getIdUser()."".$user->getName()."   ". $user->getFirstName()."  ". $user->getPseudo()."  ".$user->getRole()."  ".$user->getEmail())?></a></p>

<?php } ?>