
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
        <script src="https://kit.fontawesome.com/ccbe9956fa.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- Swiper CSS -->
        <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"> -->
        <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
         <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">



        <link rel="stylesheet" href="<?= PUBLIC_DIR ?>/css/style.css">
        <title>Projet Examen</title>
    </head>
         <!-- Swiper JS -->
         <!-- <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script> -->

         <!-- Inclusion de ton fichier JavaScript -->
         <!-- <script src="js/swiper-config.js"></script> -->

    <body>
       


       
<header>
    <nav class="navbar">
        <!-- Logo Acceuil -->
        <div class="nav-left">
            <a href="index.php?ctrl=index" class="home-icon"><i class="fa-solid fa-house"></i> Accueil</a>
        </div>

        <!-- Liens principaux avec menu déroulant -->
        <div class="nav-center">
            
            <a href="index.php?ctrl=cinema&action=listMovies">Films</a>
            <div class="dropdown">
                <button class="dropbtn">Catégories <i class="fa-solid fa-chevron-down"></i></button>
                <div class="dropdown-content">
                    <a href="index.php?ctrl=cinema&action=index">Tous les genres</a>
                    <a href="index.php?ctrl=cinema&action=listMoviesByCategory&id=2">Thriller</a>
                    <a href="index.php?ctrl=cinema&action=listMoviesByCategory&id=4">Horreur</a>
                    <a href="index.php?ctrl=cinema&action=listMoviesByCategory&id=3">Drame</a>
                </div>
            </div>
            <a href="index.php?ctrl=cinema&action=listEvents">Événements</a>
        </div>

        <!-- Partie user avec menu déroulant -->
        <div class="nav-right">
            <?php if(App\Session::getUser()) { ?>
                <div class="dropdown">
                    <button class="dropbtn">
                        <i class="fa-solid fa-user"></i> Profil <i class="fa-solid fa-chevron-down"></i>
                    </button>
                    <div class="dropdown-content">
                        <a href="index.php?ctrl=cinema&action=infosUser&id=<?= App\Session::getUser()->getId() ?>">Mon profil</a>
                        <?php if (App\Session::getUser()->getRole() == 'ROLE_REALISATEUR') { ?>
                        <a href="index.php?ctrl=cinema&action=addEventForm&id=<?= App\Session::getUser()->getId() ?>">Créer un évènement</a>
                        <?php } ?>
                        <a href="index.php?ctrl=cinema&action=listEvents">Réserver</a>
                        <a href="index.php?ctrl=security&action=logout">Déconnexion</a>
                    </div>
                    
                </div>
            <?php } else { ?>
                <a href="index.php?ctrl=security&action=loginForm">Connexion</a>
                <div class="dropdown">
                  <button class="dropbtn">
                      <i class="fa-solid"></i> Inscription <i class="fa-solid fa-chevron-down"></i>
                    </button>
                    <div class="dropdown-content">
                    <a href="index.php?ctrl=security&action=registerUserForm">Utilisateur</a>
                    <a href="index.php?ctrl=security&action=registerRealisateurForm">Réalisateur</a>
                </div>
            </div>
            
            <?php } ?>
            
        </div>
        <?php if (App\Session::isAdmin()) { ?>
          <a href="index.php?ctrl=cinema&action=listUsers">Gestion utilisateurs</a>
            <?php } ?>
           
        
    </nav>
   
</header>

                
                         
                <main>
                    <?= $page ?>
                </main>
            
            
            <footer>

            <!-- Fontawesome 6 is used for footer social icons -->
<!-- FOOTER START -->
<footer class="footer" role="contentinfo" itemscope itemtype="http://schema.org/WPFooter">
  <div class="footer-container">
    <div class="footer-col" role="navigation" aria-labelledby="quick-nav-heading" itemscope itemtype="http://schema.org/SiteNavigationElement">
    
      <ul>
        <li><a href="#" itemprop="url"></a></li>
        <li><a href="#" itemprop="url"></a></li>
        <li><a href="#" itemprop="url"></a>Mentions légales</li>
        <li><a href="#" itemprop="url"></a></li>
        <li><a href="#" itemprop="url"></a></li>
      </ul>
    </div>
    <div class="footer-col" role="navigation" aria-labelledby="know-heading">
      
      <ul>
        <li><a href="#" itemprop="url"></a></li>
        <li><a href="#" itemprop="url"></a></li>
        <li><a href="#" itemprop="url"></a>Conditions d'utilisation</li>
        <li><a href="#" itemprop="url"></a></li>
        <li><a href="#" itemprop="url"></a></li>
      </ul>
    </div>
    <div class="footer-col" role="navigation" aria-labelledby="contents-heading">
      
      <ul>
        <li><a href="#" itemprop="url"></a></li>
        <li><a href="#" itemprop="url"></a></li>
        <li><a href="#" itemprop="url"></a>Politique de confidentialité</li>
        <li><a href="#" itemprop="url"></a></li>
        <li><a href="#" itemprop="url"></a></li>
        <li><a href="#" itemprop="url"></a></li>
      </ul>
    </div>
    <div class="footer-col" role="navigation" aria-labelledby="resources-heading">
      
      <ul>
        <li><a href="#" itemprop="url"></a></li>
        <li><a href="#" itemprop="url"></a></li>
        <li><a href="#" itemprop="url"></a>A propos de nous</li>
        <li><a href="#" itemprop="url"></a></li>
        <li><a href="#" itemprop="url"></a></li>
        <li><a href="#" itemprop="url"></a></li>
      </ul>
    </div>
    <div class="footer-col" role="navigation" aria-labelledby="support-heading">
      
      <ul>
        <li><a href="#" itemprop="url"></a></li>
        <li><a href="#" itemprop="url"></a></li>
        <li><a href="#" itemprop="url"></a>Contacts</li>
        
      </ul>
    </div>
    <div class="footer-col social" role="navigation" aria-labelledby="social-heading">
      
      <ul class="social-icons">
      
        <li><a href="#" aria-label="Facebook" itemprop="url"><i class="fa-brands fa-facebook"></i></a></li>
        <li><a href="#" aria-label="Twitter" itemprop="url"><i class="fa-brands fa-x-twitter"></i></a></li>
        <li><a href="#" aria-label="Mastodon" itemprop="url"><i class="fa-brands fa-mastodon"></i></a></li>
      </ul>
    </div>
    <div class="clearfix"></div>
  </div><div class="footer-bottom">
  <p>© 2025 <a style='color:inherit' href="https://www.sdavidprince.space"></a>Ciné Events</p>
  <ul class="footer-bottom-links">
    <li><a href="#"></a></li>
    <li><a href="#"></a></li>
    <li><a href="#"></a></li>
  </ul>
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
        <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
        <script src="<?= PUBLIC_DIR ?>/js/script.js"></script>
    </body>
</html>