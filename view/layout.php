<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php if($meta_description){?>
            <meta name="description" content="<?= $meta_description ?>">

       <?php } ?>
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <script src="https://cdn.tiny.cloud/1/zg3mwraazn1b2ezih16je1tc6z7gwp5yd4pod06ae5uai8pa/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />
        <script src="https://kit.fontawesome.com/ccbe9956fa.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="<?= PUBLIC_DIR ?>/css/style.css">
        <title>FORUM</title>
    </head>
    <body>
        <div id="wrapper"> 


       
            <div class="navbar">
                <!-- c'est ici que les messages (erreur ou succès) s'affichent-->
                <h3 class="message" style="color: red"><?= App\Session::getFlash("error") ?></h3>
                <h3 class="message" style="color: green"><?= App\Session::getFlash("success") ?></h3>
                <header>
                    <nav>
                        <div class="nav-link a">
                            <a href="/">Accueil</a>
                            <?php
                            if(App\Session::isAdmin()){
                                ?>
                                <a href="index.php?ctrl=home&action=users">Voir la liste des gens</a>
                            <?php } ?>
                        </div>
                        <div class="nav-link a">
                        <?php
                            // si l'utilisateur est connecté 
                            if(App\Session::getUser()){
                                ?>
                                <a href="index.php?ctrl=security&action=profile"><span class="fas fa-user"></span>&nbsp;<?= App\Session::getUser()?></a>
                                <a href="index.php?ctrl=security&action=logout">Déconnexion</a>
                                <a href="index.php?ctrl=cinema&action=bookEventForm">Réserver une séance</a>
                                <?php
                            }
                            else{
                                ?>
                                <a href="index.php?ctrl=security&action=loginForm">Connexion</a>
                                <a href="index.php?ctrl=security&action=registerForm">Inscription utilisateur</a>
                                <a href="index.php?ctrl=security&action=registerRealisateurForm">Inscription réalisateur</a>
                                <a href="index.php?ctrl=cinema&action=index">Catégories</a>
                            <?php
                            }
                        ?>
                        <a href="index.php?ctrl=home&action=home"><i class="fa-solid fa-house"></i></a>
                        <a href="index.php?ctrl=cinema&action=listUsers">Liste des utilisateurs</a>
                        <a href="index.php?ctrl=cinema&action=listMovies">Liste des films</a>
                <?php        if (isset($_SESSION['user'])) { ?>
                        <a href="index.php?ctrl=cinema&action=addEventForm&id=<?= App\Session::getUser()->getId() ?>">Evènements</a>
                <?php    } ?>
                        <a href="index.php?ctrl=cinema&action=addEventForm">Créer un évènement</a>

                        <a href="index.php?ctrl=cinema&action=listEvents">Liste des évènements</a>


                        </div>


                        
                       </nav>
                </header>
                        </div>   
                <main id="forum">
                    <?= $page ?>


                    
                   
                    
                </main>
            
            
            <footer>
                <div class="footer">
                <p>&copy; <?= date_create("now")->format("Y") ?> - <a href="#">Règlement du forum</a> - <a href="#">Mentions légales</a></p>
                        </div>
            </footer>
        </div>
        <script
            src="https://code.jquery.com/jquery-3.4.1.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
            crossorigin="anonymous">
        </script>
        <script>
            $(document).ready(function(){
                $(".message").each(function(){
                    if($(this).text().length > 0){
                        $(this).slideDown(500, function(){
                            $(this).delay(3000).slideUp(500)
                        })
                    }
                })
                $(".delete-btn").on("click", function(){
                    return confirm("Etes-vous sûr de vouloir supprimer?")
                })
                tinymce.init({
                    selector: '.post',
                    menubar: false,
                    plugins: [
                        'advlist autolink lists link image charmap print preview anchor',
                        'searchreplace visualblocks code fullscreen',
                        'insertdatetime media table paste code help wordcount'
                    ],
                    toolbar: 'undo redo | formatselect | ' +
                    'bold italic backcolor | alignleft aligncenter ' +
                    'alignright alignjustify | bullist numlist outdent indent | ' +
                    'removeformat | help',
                    content_css: '//www.tiny.cloud/css/codepen.min.css'
                });
            })
        </script>
        <script src="<?= PUBLIC_DIR ?>/js/script.js"></script>
    </body>
</html>