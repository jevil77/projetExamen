<?php if (isset($_SESSION["message"])) {
            echo "<p>" . $_SESSION["message"] . "</p>";} ?>


<!-- Récupère le message en session et l'affiche dans la vue -->

<h3 class="message" style="color: red"><?= App\Session::getFlash("error") ?></h3>
<h3 class="message" style="color: green"><?= App\Session::getFlash("success") ?></h3>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>


<h1>Formulaire de connexion</h1>

<div class="cinema-form">

   <form action="index.php?ctrl=security&action=login" method="POST">

    <label for="email">Email :</label>
    <input type="email" id="email" name="email" placeholder="Entrez votre email" required><br><br>
   
    <label for="password">Mot de passe :</label>
    <input type="password" id="password" name="password" placeholder="Entrez votre mot de passe" required><br><br>

    <button type="submit" name="submit">Se connecter</button>
   </form>

</div>





    
</body>
</html>