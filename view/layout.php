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
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">

        <link rel="stylesheet" href="<?= PUBLIC_DIR ?>/css/style.css">
        <title>Projet Examen</title>
    </head>
         <!-- Swiper JS -->
         <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

         <!-- Inclusion de ton fichier JavaScript -->
         <script src="js/swiper-config.js"></script>

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
                         <a href="index.php?ctrl=cinema&action=addEventForm">Créer un évènement</a>
                        <a href="index.php?ctrl=cinema&action=listEvents">Réserver</a>
                        <a href="index.php?ctrl=security&action=logout">Déconnexion</a>
                    </div>
                </div>
            <?php } else { ?>
                <a href="index.php?ctrl=security&action=loginForm">Connexion</a>
                <a href="index.php?ctrl=security&action=registerForm">Inscription</a>
            <?php } ?>
            
            <?php if(App\Session::isAdmin()) { ?>
                <a href="index.php?ctrl=cinema&action=listUSers">Gestion utilisateurs</a>
            <?php } ?>
        </div>
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
      <h3 id="quick-nav-heading" itemprop="name">Quick Nav</h3>
      <ul>
        <li><a href="#" itemprop="url">Home</a></li>
        <li><a href="#" itemprop="url">Contents</a></li>
        <li><a href="#" itemprop="url">Creations</a></li>
        <li><a href="#" itemprop="url">Services</a></li>
        <li><a href="#" itemprop="url">Store</a></li>
      </ul>
    </div>
    <div class="footer-col" role="navigation" aria-labelledby="know-heading">
      <h3 id="know-heading" itemprop="name">Know</h3>
      <ul>
        <li><a href="#" itemprop="url">About</a></li>
        <li><a href="#" itemprop="url">Mission</a></li>
        <li><a href="#" itemprop="url">Services</a></li>
        <li><a href="#" itemprop="url">Social</a></li>
        <li><a href="#" itemprop="url">Get in touch</a></li>
      </ul>
    </div>
    <div class="footer-col" role="navigation" aria-labelledby="contents-heading">
      <h3 id="contents-heading" itemprop="name">Contents</h3>
      <ul>
        <li><a href="#" itemprop="url">Inside SDP</a></li>
        <li><a href="#" itemprop="url">Blog</a></li>
        <li><a href="#" itemprop="url">Verses / Poems</a></li>
        <li><a href="#" itemprop="url">Visual Narratives</a></li>
        <li><a href="#" itemprop="url">Topics Index</a></li>
        <li><a href="#" itemprop="url">More</a></li>
      </ul>
    </div>
    <div class="footer-col" role="navigation" aria-labelledby="resources-heading">
      <h3 id="resources-heading" itemprop="name">Resources</h3>
      <ul>
        <li><a href="#" itemprop="url">Graphics</a></li>
        <li><a href="#" itemprop="url">Free codes</a></li>
        <li><a href="#" itemprop="url">Helpful sites</a></li>
        <li><a href="#" itemprop="url"> Freebies</a></li>
        <li><a href="#" itemprop="url"> Templates</a></li>
        <li><a href="#" itemprop="url"> Mockups</a></li>
      </ul>
    </div>
    <div class="footer-col" role="navigation" aria-labelledby="support-heading">
      <h3 id="support-heading" itemprop="name">Support</h3>
      <ul>
        <li><a href="#" itemprop="url">Contact</a></li>
        <li><a href="#" itemprop="url">Web chat</a></li>
        <li><a href="#" itemprop="url">E-mail</a></li>
      </ul>
    </div>
    <div class="footer-col social" role="navigation" aria-labelledby="social-heading">
      <h3 id="social-heading" itemprop="name">Social</h3>
      <ul class="social-icons">
        <li><a href="#" aria-label="Facebook" itemprop="url"><i class="fa-brands fa-facebook"></i></a></li>
        <li><a href="#" aria-label="Twitter" itemprop="url"><i class="fa-brands fa-x-twitter"></i></a></li>
        <li><a href="#" aria-label="Mastodon" itemprop="url"><i class="fa-brands fa-mastodon"></i></a></li>
      </ul>
    </div>
    <div class="clearfix"></div>
  </div><div class="footer-bottom">
  <p>© 2024 <a style='color:inherit' href="https://www.sdavidprince.space"></a>Evènements Ciné</p>
  <ul class="footer-bottom-links">
    <li><a href="#">Legal</a></li>
    <li><a href="#">Credits</a></li>
    <li><a href="#">Sponsor/Advertise</a></li>
  </ul>
</div>

</footer>
<!-- END OF FOOTER -->

                <!-- <div class="footer">
                <p>&copy; <?= date_create("now")->format("Y") ?> - <a href="#">Règlement du forum</a> - <a href="#">Mentions légales</a></p>
                        </div>
            </footer> -->
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