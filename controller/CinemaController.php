<?php



namespace Controller;

// Active l'affichage des erreurs (à enlever en production)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
 
// Capture tout ce que PHP affiche
ob_start();


use App\Session;
use App\AbstractController;
use App\ControllerInterface;
use Model\Managers\CategoryManager;
use Model\Managers\MovieManager;
use Model\Managers\ParticipateManager;
use Model\Managers\PostManager;
use Model\Managers\EventManager;
use Model\Managers\UserManager;
use Model\Managers\LikerManager;
use Model\Managers\WatchlistManager;



class CinemaController extends AbstractController implements ControllerInterface{

    public function index() {
        // Créer une nouvelle instance de CategoryManager
        $categoryManager = new CategoryManager();
        
        // Récupérer la liste de toutes les catégories triées par nom (descendant)
        $categories = $categoryManager->findAll(["categoryName", "DESC"]);
    
        // Le controller communique avec la vue "listCategories" pour lui envoyer la liste des catégories
        return [
            "view" => VIEW_DIR . "cinema/listCategories.php",
            "meta_description" => "Liste des catégories de films",
            "data" => [
                "categories" => $categories
            ]
        ];
    }

    
    public function listMoviesByCategory($id) {
         
        // créer une nouvelle instance de MovieManager 
        $movieManager = new MovieManager();
        $categoryManager = new CategoryManager();
        // récupère une catégorie spécifique depuis la base de données
        $category = $categoryManager->findOneById($id);
        // récupère les films appartenant à une catégorie
        $movies = $movieManager->findMoviesByCategory($id);

        // le controller communique avec la vue "listMovies" pour lui envoyer la liste des films par catégorie
        return [
            "view" => VIEW_DIR."cinema/listMoviesByCategory.php",
            "meta_description" => "Liste des films par catégorie : ".$category,
            "data" => [
                "category" => $category,
                "movies" => $movies
            ]
        ];
    }



    // public function listPostsByMovies($id) {

    //     // Nouvelle instance de PostManager et MovieManager
    //     $postManager = new PostManager();
    //     $movieManager = new MovieManager();
    //     // Récupère les commentaires associés à un film
    //     $posts = $postManager->findPostsByMovies($id);
    //     // Récupère les détails d'un film
    //     $movie = $movieManager->findOneById($id);
    //     // Renvoie à la vue la liste des posts par film
    //     return [
    //         "view" => VIEW_DIR."cinema/infosMovies.php",
    //         "meta_description" => "Liste des posts par film : ",
    //         "data" => [
    //             "movie" => $movie,
    //             "post" => $posts
    //         ]
    //     ];
    // }


    public function listUsers() {
        // Nouvelle instance de UserManager
        $userManager = new UserManager();
        // Récupère tous les utilisateurs
        $users = $userManager->findAll();
        // Renvoie à la vue la liste des utilisateurs
        return [
            "view" => VIEW_DIR."cinema/listUsers.php",
            "meta_description" => "Liste des utilisateurs :",
            "data" => ["users" => $users,]
        ];
    }

    
    
    public function infosUser($id){

       // Nouvelle instance de UserManager
        $userManager = new UserManager();
      
        // Récupère les informations d'un utilisateur
        $user = $userManager->findOneById($id);


        $watchlistManager = new WatchlistManager();
        $watchlist = $watchlistManager->getUserWatchlist($user->getId());

        // Renvoie à la vue les informations d'un utilisateur
         return [
           "view" => VIEW_DIR."cinema/infosUser.php",
           "meta_description" => " Infos des Utilisateurs:",
           "data" => [
                      "user" => $user,
                      "watchlist" => $watchlist,
                      "id" => $id

                    ]
        ];
    }
   
    
    public function addCategoryForm(){
        // Affiche un formulaire permettant d'ajouter une catégorie
        return [
            "view" => VIEW_DIR."cinema/form/addCategoryForm.php",
            "meta_description" => "Liste des catégories de films",
        ];
    }




    public function addCategory(){
        // Cette fonction permet d'ajouter une catégorie

        // Soumission du formulaire en méthode POST
        if(isset($_POST['submit'])) {
               // Nouvelle instance de CategoryManager 
               $categoryManager = new CategoryManager();
               // Récupére les noms des catégories
               $category = $categoryManager->findAll(["categoryName","DESC"]);
               var_dump('hello');
               // Filtre les données
               $categoryName = filter_input(INPUT_POST, "categoryName", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
               // Prépare les données pour l'ajout en base de données
               $data = ['categoryName'=> $categoryName];
               //  Ajoute les données en base de données
               $categoryManager->add($data);}   
         // Redirige après l'ajout
         header("Location: index.php?ctrl=cinema&action=index");
        }     
        
        
        
    public function listMovies() {
            // Cette fonction affiche la liste des films
            // Nouvelle instance MovieManager
            $movieManager = new MovieManager();
            // Récupère tous les films
            $movies = $movieManager->findAll();
            // Envoie à la vue la liste des films
            return [
                "view" => VIEW_DIR . "cinema/listMovies.php",
                "meta_description" => "Liste des films :",
                "data" => [
                    "movies" => $movies,
                ]
            ];
        }
        

  


    public function infosMovie($id) {
       
            // Affiche les informations des films
            // Nouvelle instance MovieManager
            $movieManager = new MovieManager();
            // // Récupère les films par leur id
            $movie = $movieManager->findOneById($id);
            // var_dump($movie);die;
            // if (!$movie) {
            //     die("Erreur : Film non trouvé en base de données.");
            // }
            // var_dump($movie);die;
            // var_dump($id);
            // Envoie à la vue les informations sur les films
            $postManager = new PostManager();
            $posts = $postManager->findPostsByMovie($id);

            return [
                "view" => VIEW_DIR . "cinema/infosMovie.php",
                "meta_description" => "Infos des films :",
                "data" => [
                    "movie" => $movie,
                    "post"  => $posts

                ]
            ];
        }


        
    public function addMovieForm(){
        // Affiche un formulaire permettant l'ajout d'un film
        // Nouvelle instance de CategoryManager pour sélectionner une catégorie de films dans le formulaire
        $categoryManager = new CategoryManager();
        $categories = $categoryManager->findAll(["categoryName", "ASC"]);
    
        return [
            "view" => VIEW_DIR."cinema/form/addMovieForm.php",
            "meta_description" => "Liste des films",
            "data" => [
            "categories" => $categories
            ]
         
        ];
    
    }
    


    public function addMovie(){
        // Cette fonction permet d'ajouter un film
        
        if(isset($_POST["submit"])) {
           
            // Nouvelle instance de MovieManager
            $movieManager = new MovieManager();
           

            // Filtrer les données envoyées dans le formulaire
            $movieTitle = filter_input(INPUT_POST, "movieTitle", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $releaseDate = filter_input(INPUT_POST, "releaseDate", FILTER_VALIDATE_INT);
            $duration = filter_input(INPUT_POST, "duration", FILTER_VALIDATE_INT);
            $synopsis = filter_input(INPUT_POST, "synopsis", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $rating = filter_input(INPUT_POST, "rating", FILTER_VALIDATE_FLOAT);
            $category = filter_input(INPUT_POST, "category_id", FILTER_VALIDATE_INT);
            
            // Il s'agit du fichier où sera stocké l'image
            $target_dir = "public/uploads/";
            // Spécifie le chemin d'accès du fichier à télécharger, ($_FILES["fileToUpload"]["name"]) récupère le nom du fichier envoyé, basename -> récupère seulement le nom 
            // du fichier, imagePath -> chemin complet
            $imagePath = $target_dir . basename($_FILES["fileToUpload"]["name"]);
            // Indique si l'upload est valide
            $uploadOk = 1;
            // Récupère l'extension du fichier
            $imageFileType = strtolower(pathinfo($imagePath,PATHINFO_EXTENSION));
            // Vérifie si le fichier est bien une image
            //$_FILES est une superglobale qui stocke les fichiers envoyés via le formulaire en POST avec enctype="multipart/form-data".
            if(isset($_POST["submit"])) {
              $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
              if($check !== false) {
                echo "Le fichier est une image " . $check["mime"] . ".";
                $uploadOk = 1;
              } else {
                echo "Le fichier n'est pas une image";
                $uploadOk = 0;
              }
            }
            // Vérifie si le fichier existe déjà
            if (file_exists($imagePath)) {
            echo "Désolé, le fichier existe déjà";
            $uploadOk = 0;
            }
            // Vérifie la taille du fichier
           if ($_FILES["fileToUpload"]["size"] > 500000) {
               echo "Désolé, votre fichier est trop volumineux.";
               $uploadOk = 0;
            }
            // Autorise certains types de fichiers
           if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
              echo "Désolé, seulement les fichiers de type JPG, JPEG, PNG & GIF sont autorisés.";
              $uploadOk = 0;
           }
           // Chemin temporaire où le fichier est stocké après l'upload
            // move_uploaded_file -> déplace le fichier temporaire vers le dossier définitif
           if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $imagePath)) {
               echo "Le fichier " . (basename($_FILES["fileToUpload"]["name"])) . " a été uploadé avec succès.";
           } else {
               die("Erreur lors de l'upload du fichier.");
           }
           
           // Récupère le user en session dans la variable $user
            $user = Session::getUser();
            if (!$user) {
                die("Erreur : Aucun utilisateur connecté.");
            }
            
            $data = [
                'movieTitle' => $movieTitle,
                'releaseDate' => $releaseDate,
                'duration' => $duration,
                'synopsis' => $synopsis,
                'rating' => $rating,
                'category_id' => $category,
                'imagePath' => $imagePath,
                //  'user_id' => App\Session::getUser()->getId()
                 // Récupère l'id du user en session
                'user_id' => $user->getId() 
            ];
           
            
           // Enregistre les données et informe l'utilisateur si le film a bien été ajouté
             if ($movieManager->add($data)) { 
                Session::addFlash('success',"Le film a bien été ajouté!");
            } else {
                 Session::addFlash('error','Une erreur est survenue, veuillez réessayer.');
            }
            // Redirige vers la liste de films
            $this->redirectTo("cinema", "listMovies");


           
        
 
             
     }


    }



    public function addEventform($id){
    
        // Formulaire pour créer un évènement
        // Nouvelle instance de MovieManager
        $movieManager = new MovieManager();
        // Recherche les films par utilisateur
        $movies = $movieManager->findMoviesByUser($id);

       

       

        
        return [
            "view" => VIEW_DIR."cinema/form/addEventForm.php",
            "meta_description" => "Liste des évènements",
            "data" => [
                "movies" => $movies

            ]
          ];
        }



    public function addEvent(){
            // Cette fonction permet de créer un évènement
            // Soumission du formulaire
            if(isset($_POST["submit"])) {

              
                
               
                
            // Nouvelle instance
            $eventManager = new EventManager();
            // Les données envoyées par le formulaire sont filtrés
             $eventName = filter_input(INPUT_POST, "eventName", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
             $eventDateTime = filter_input(INPUT_POST, "eventDateTime",FILTER_SANITIZE_FULL_SPECIAL_CHARS);
             $placeAvailable = filter_input(INPUT_POST, "placeAvailable", FILTER_VALIDATE_INT);
             $theatre = filter_input(INPUT_POST, "theatre",FILTER_SANITIZE_FULL_SPECIAL_CHARS);
             $city = filter_input(INPUT_POST, "city",FILTER_SANITIZE_FULL_SPECIAL_CHARS);
             $postalCode = filter_input(INPUT_POST,"postalCode",FILTER_VALIDATE_INT);
             $movieId =filter_input(INPUT_POST,"movie_id",FILTER_VALIDATE_INT);

            //new \DateTime($eventDate); crée un objet DateTime en utilisant la date passée dans $eventDate.
             $eventDate = new \DateTime($eventDateTime);
             //crée un objet DateTime représentant la date et l'heure actuelles au moment de l'exécution du script.
             $today = new \DateTime();
        
            
            // Vérifie si la date de l'évènement créé est bien supérieure à la date du jour
            // addFlash : ajoute un message en session
             if ($eventDate < $today) { Session::addFlash('error', 'Vous ne pouvez pas programmer un événement dans le passé.');
                

            // Redirige vers la page d'affichage du message enregistré en session
            $this->redirectTo('cinema','addEventForm');
            exit;
                
             }
       
             // s'assure qu'un fichier a bien été uploadé
             if (!isset($_FILES["fileToUpload"]) || $_FILES["fileToUpload"]["error"] !== 0) {
              Session::addFlash('error'," Aucun fichier n'a été uploadé ou une erreur s'est produite.");
              $this->redirectTo("cinema", "addEventform");
                exit;
            }
            // Fichier où sera stocké l'image
             $target_dir = "public/uploads/";
             $imagePath = $target_dir . basename($_FILES["fileToUpload"]["name"]);
             $imageFileType = strtolower(pathinfo($imagePath,PATHINFO_EXTENSION));
             $uploadOk = 1;
             // Vérifie si l'image est une vraie image
             if(isset($_POST["submit"])) {
               $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
               if($check !== false) {
                 echo "Le fichier est une image " . $check["mime"] . ".";
                 $uploadOk = 1;
               } else {
                 echo "Le fichier n'est pas une image";
                 $uploadOk = 0;
               }
             }
             // Vérifie si le fichier existe déjà
             if (file_exists($imagePath)) {
             echo "Désolé, le fichier existe déjà";
             $uploadOk = 0;
             }
             
             // Vérifie la taille du fichier
            if ($_FILES["fileToUpload"]["size"] > 500000) {
                echo "Désolé, votre fichier est trop volumineux.";
                $uploadOk = 0;
             }
             // Autorise certains types de fichiers
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
               echo "Désolé, seulement les fichiers de type JPG, JPEG, PNG & GIF sont autorisés.";
               $uploadOk = 0;
            }
            
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $imagePath)) {
                Session::addFlash('success',"Le fichier a été uploadé avec succès !");
                
            } else {
                Session::addFlash('error',"Erreur lors de l'upload du fichier.");
            }
            
            $user = Session::getUser();
            if (!$user) {
                die("Erreur : Aucun utilisateur connecté.");
            }



            // Convertie la date dans un format accepté par la base de données. Remplace le T par un espace pour respecter le format YYYY-MM-DD HH:MM:SS attendu par MySQL
            $eventDateTime = !empty($_POST['eventDateTime']) ? str_replace("T", " ", $_POST['eventDateTime']) . ":00" : null;

           
            $data = [

              'eventName' => $eventName,
              'eventDateTime' => $eventDateTime,
              'placeAvailable' => $placeAvailable,
              'theatre' => $theatre,
              'city' => $city,
              'postalCode' => $postalCode,
              'imagePath' => $imagePath,
              'movie_id '=> $movieId,
              
              "user_id" => $user->getId()
            ];
            var_dump($_POST);

            if ($eventManager->add($data)) { 
                Session::addFlash('success',"L'évènement a bien été créé !");
            } else {
                 Session::addFlash('error','Une erreur est survenue, veuillez réessayer.');
            }
            
            }
            $this->redirectTo("cinema", "listEvents");
            exit;
        }

    

        public function listEvents() {


            $eventManager = new EventManager();
            $events = $eventManager->findAllEvents();
    
            return [
                "view" => VIEW_DIR."cinema/listEvents.php",
                "meta_description" => "Liste des évènements :",
                "data" => [
                    
                    "events" => $events,
                    
                ]
            ];



        }


        public function bookEventForm($id) {
            
            
            $eventManager = new EventManager();
            $event = $eventManager->findOneById($id);



            return [
                "view" => VIEW_DIR."cinema/form/bookEventForm.php",
                "meta_description" => "Réservation :",
                "data" => [

                    "event" => $event
                ]
                
            ];

         }




         public function bookEvent($id) {

            //Récupère le user connecté
            $user = Session::getUser();
        
            if (!$user) {
                    Session::addFlash('error', 'Utilisateur non connecté !');
                    $this->redirectTo("cinema", "bookEvent");
                exit;

            }
            
            //récupère l'id de l'utilisateur connecté
            $user_id = $user->getId();

            
            //Soumission du formulaire
            if (isset($_POST["submit"])) {  
                // Vérification et filtrage des données
                $reservePlace = filter_input(INPUT_POST, "reservePlace", FILTER_VALIDATE_INT);


                //Vérifie si le nombre de places sélectionnées est valide
                if (!$reservePlace || $reservePlace <= 0) {
                    die("Le nombre de places réservées est invalide.");
                }
        
                $participateManager = new ParticipateManager();
        
                // Ajout de la participation
                $data = [
                    'reservePlace' => $reservePlace,
                    'user_id' => $user_id,
                    'event_id' => $id
                ];
        
                if (!$participateManager->add($data)) {
                    die("Erreur lors de l'ajout de la participation.");
                }
                
                // Définir la variable
                $eventManager = new EventManager();      
                $event = $eventManager->findOneById($id);
        
                if (!$event) {
                    die("Événement introuvable.");
                }
        
                // Calcul du nouveau nombre de places disponibles
                $newPlaceAvailable = $event->getPlaceAvailable() - $reservePlace;
        
                if ($newPlaceAvailable < 0) {
                    Session::addFlash('error', 'Plus de places disponibles pour cet évènement');
                    $this->redirectTo("cinema", "listEvents",["id" => $user_id]);
                exit;
                }
        
                // Mise à jour du nombre de places disponibles
                if (!$eventManager->updatePlaces($id, $newPlaceAvailable)) {
                    die("Erreur lors de la mise à jour du nombre de places disponibles.");
                }
        
                if ($reservePlace) {  Session::addFlash('success', 'Votre réservation est validée');
                    $this->redirectTo("cinema", "listEvents",["id" => $user_id]);
                    exit;

                }
                // Redirection après traitement
                $this->redirectTo("cinema", "listEvents",["id" => $user_id]);
                exit;
            }
        }






        public function toggleLikeMovie($id) {
            // La fonction toggle est une fonction qui permet d'alterner entre deux états ou actions par un simple clic
            // Indique au navigateur que la réponse envoyée est au format JSON.
            // JSON Format de données textuel (Javascript Object Notation)
            header("Content-Type: application/json");
        
            try {
                $user = Session::getUser();
                // Récupère l'utilisateur connecté
                if (!$user) {
                    // Si l'utilisateur n'est pas connecté
                    // json_encode est utilisée pour transformer des données PHP en format JSON. Envoie une réponse structurée au client, généralement interface JS qui attend des réponses en JSON
                    echo json_encode(["status" => "error", "message" => "Vous devez être connecté pour liker."]);
                    exit;
                }
                
                // Récupère l'id de l'utilisateur connecté en appelant la méthode 
                $user_id = $user->getId();
                // Nouvelle instance du gestionnaire des likes
                $likerManager = new LikerManager();
                // Vérifie si l'utilisateur a déjà liké le film
                if ($likerManager->hasLiked($user_id, $id)) {
                    // Supprime le like si l'utilisateur a déjà liké
                    $likerManager->removeLike($user_id, $id);
                    //  on passe l'état du "like" à false pour indiquer que le film n'est plus liké
                    $liked = false;
                } else {
                    // Si l'utilisateur n'a pas encore liké, on ajoute le like
                    // Nouvel enregistrement dans la table liker
                    $likerManager->addLike($user_id, $id);
                    // Mise à jour de l'état du "like" pour indiquer que le film est maintenant liké
                    $liked = true;
                }
        
                $likeCount = $likerManager->countLikes($id);
                // Compte le nombre total de likes associés à un film
                // $likerManager : gère les interactions avec la BDD
                // Valeur stocké dans $likeCount

                // Convertit en chaîne de caractères JSON (JS le lit facilement)
                echo json_encode([
                    "status" => "success",
                    "liked" => $liked,
                    "likeCount" => $likeCount
                ]);
                // Ce bloc de code capte et gère les erreurs qui pourrait survenir lors de l'exécuton de try. $e objet qui contient les détails de l'erreur
            } catch (\Exception $e) {
                //Enregistre l'erreur dans les logs du serveur. $e-> message d'erreur de PHP
                error_log("Erreur SQL dans toggleLikeMovie(): " . $e->getMessage());
                // Convertit un tableau associatif en JSON et l'affiche en HTTP
                echo json_encode(["status" => "error", "message" => "Erreur SQL : " . $e->getMessage()]);
            }
            exit;
        }


        public function addToWatchlist($id) {

             $user = Session::getUser();
             //var_dump($user);die;
            // Récupérer l'utilisateur depuis la session
            if (!$user) {
                Session::addFlash('error', 'Vous devez être connecté pour ajouter un film à votre watchlist.');
                $this->redirectTo("cinema", "infosMovie");
                exit;
            }
             $user_id = $user->getId();
            
            $watchlistManager = new WatchlistManager();
            $movieManager = new MovieManager();
            
            // Récupération du film
            $movie = $movieManager->findOneById($id);
            if (!$movie) {
                Session::addFlash('error', 'Film non trouvé');
                 $this->redirectTo("cinema", "listMovies");
                 exit;

            }

            
            
            
            
            // Vérifie si le film a déjà été ajouté à la watchlist
            if ($watchlistManager->isInWatchlist($user_id, $id)) {

                Session::addFlash('error','Ce film est déjà dans votre watchlist !');
                $this->redirectTo("cinema", "listMovies");
                exit;
            }
        

            $data = [
                'user_id'=> $user_id,
                'movie_id'=> $id
            ];
            //var_dump($user_id,$id);

        
            // Vérifie si l'ajout a réussi
            if ($watchlistManager->add($data)) { 
                Session::addFlash('success','Le film a bien été ajouté à votre watchlist !');
            } else {
                 Session::addFlash('error','Une erreur est survenue, veuillez réessayer.');
            }
            

            $this->redirectTo("cinema", "listMovies");
            exit;


        } 


        public function addPostToMovie($id){
            
            
            $user = Session::getUser();
            
            $user_id = $user->getId();

            if(isset($_POST['submit'])){

                 $postManager = new PostManager();
                
                
                 $text = filter_input(INPUT_POST, "text", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                 
                 if ($text) {
                    $postManager->add([
                        "text" => $text,
                        "movie_id" => $id,
                        "user_id" => $user_id
                    ]);
                } 
               
                $this->redirectTo("cinema", "infosMovie", $id);
                exit;
            }
        }

        

}
    


   //  JavaScript Object Notation (JSON) est un format textuel standard permettant de représenter des données structurées en fonction de la syntaxe d'objet JavaScript.
   //  Il est couramment utilisé pour transmettre des données dans des applications Web (par exemple, pour envoyer des données du serveur au client, afin qu'elles puissent être affichées sur une page Web, ou vice versa). 
   // Vous le rencontrerez assez souvent, c'est pourquoi dans cet article, nous vous donnons tout ce dont vous avez besoin pour travailler avec JSON à l'aide de JavaScript, y compris l'analyse de JSON pour pouvoir accéder aux données qu'il contient et la création de JSON.