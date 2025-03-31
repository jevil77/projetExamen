<?php
    $categories = $result["data"]['categories']; 
    
?>

<h1>Catégories</h1>

<?php
foreach($categories as $category ){ ?>
    <p><a href="index.php?ctrl=cinema&action=listMoviesByCategory&id=<?= $category->getId() ?>"><?= $category->getCategoryName() ?></a></p>
<?php } ?>


<!-- Vérifie si le user a le ROLE_ADMIN -->
<?php if (App\Session::getUser()->getRole() == 'ROLE_ADMIN'){ ?>

<a href="index.php?ctrl=admin&action=addCategoryForm"class="btn-add-movie">Ajouter une Catégorie</a>

<?php } ?>
  
