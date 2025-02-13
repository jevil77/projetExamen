<?php
    $categories = $result["data"]['categories']; 
    var_dump('hello');
?>

<h1>Catégories</h1>

<?php
foreach($categories as $category ){ ?>
    <p><a href="index.php?ctrl=cinema&action=listMoviesByCategory&id=<?= $category->getIdCategory() ?>"><?= $category->getCategoryName() ?></a></p>
<?php } ?>


  
