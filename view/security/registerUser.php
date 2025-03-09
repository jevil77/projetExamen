

<h1>Formulaire d'inscription</h1>



<div class="cinema-form">
<form action="index.php?ctrl=security&action=registerUser" method="POST">
    
        <label for="pseudo">Pseudo</label>
        <input type="text" id="pseudo" name="pseudo" placeholder="Entrez votre pseudo" required><br><br>

        
        <label for="email">Mail :</label>
        <input type="email" id="email" name="email" placeholder="Entrez votre mail" required><br><br>
        
        <label for="password">Mot de passe :</label>
        <input type="password" id="password" name="password" placeholder="Entrez votre mot de passe" required><br><br>

        <label for="password_confirm">Confirmez le mot de passe :</label>
        <input type="password" id="password_confirm" name="password_confirm" placeholder="Confirmez votre mot de passe" required><br><br>
        
        <button type="submit" name="submit">S'inscrire</button>
    </form>

</div>
    
