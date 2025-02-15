<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">        
    <link rel="stylesheet" href="<?= PUBLIC_DIR ?>/css/style.css">


    <title>Document</title>
</head>
<body>
    
</body>
</html>





<?php
    $movies = $result["data"]['movies']; 
?>

<h1>Liste des films</h1>

<?php
foreach($movies as $movie){ ?>
    <p><a href="index.php?ctrl=cinema&action=infosMovies&id="><?= $movie ?></a> par <?= $movie->getDirector() ?></p>
<?php } ?>




<a href="index.php?ctrl=cinema&action=addMovieForm">Ajouter un film</a>


