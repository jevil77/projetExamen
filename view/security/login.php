<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>


<h1>Formulaire de connexion</h1>

<form action="index.php?ctrl=security&action=login" method="POST">

    <label for="email">Email :</label>
    <input type="email" id="email" name="email" placeholder="Entrez votre email" required><br><br>
   
    <label for="password">Mot de passe :</label>
    <input type="password" id="password" name="password" placeholder="Entrez votre mot de passe" required><br><br>

    <button type="submit" name="submit">Se connecter</button>
</form>






    
</body>
</html>