<?php
namespace Controller;

use App\Session;
use App\AbstractController;
use App\ControllerInterface;
use Model\Managers\CategoryManager;
use Model\Managers\MovieManager;
use Model\Managers\PostManager;
use Model\Managers\EventManager;
use Model\Managers\UserManager;

class CinemaController extends AbstractController implements ControllerInterface{

    public function index() {
        
        // créer une nouvelle instance de CategoryManager
        $categoryManager = new CategoryManager();
        // récupérer la liste de toutes les catégories grâce à la méthode findAll de Manager.php (triés par nom)
        $categories = $categoryManager->findAll(["categoryName", "DESC"]);
    
        // le controller communique avec la vue "listCategories" (view) pour lui envoyer la liste des catégories (data)
        return [
            "view" => VIEW_DIR."cinema/listCategories.php",
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



    public function listPostsByMovies($id) {

        $postManager = new PostManager();
        $movieManager = new MovieManager();
        $posts = $postManager->findPostsByMovies($id);
        $movies = $movieManager->findOneById($id);
        

        
       

        return [
            "view" => VIEW_DIR."cinema/listPostsByMovies.php",
            "meta_description" => "Liste des posts par film : ".$movies,
            "data" => [
                "movies" => $movies,
                "posts" => $posts
            ]
        ];
        var_dump($post);
    }



    public function listUsers() {

        $userManager = new userManager();
        $users = $userManager->findAll();

        return [
            "view" => VIEW_DIR."cinema/listUsers.php",
            "meta_description" => "Liste des utilisateurs :",
            "data" => [
                
                "users" => $users,
                
            ]
        ];

  }

    public function infosUsers($id){
        
        $userManager = new userManager();
        $user = $userManager->findOneById($id);

        return [
           "view" => VIEW_DIR."cinema/infosUsers.php",
           "meta_description" => " Infos des Utilisateurs:",
           "data" => [
            
              "user" => $user,
        
            ]
        ];
    }



    public function addCategoryForm(){

        return [
            "view" => VIEW_DIR."cinema/form/addCategoryForm.php",
            "meta_description" => "Liste des catégories de films",
         
        ];


    }




    public function addCategory(){

        if(isset($_POST['submit'])) {


               // créer une nouvelle instance de CategoryManager 
               $categoryManager = new CategoryManager();
               // récupérer les noms des catégories
               $category = $categoryManager->findAll(["categoryName","DESC"]);
               var_dump('hello');
               // filtrer les données
               $categoryName = filter_input(INPUT_POST, "categoryName", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
              
               $data = ['categoryName'=> $categoryName];

               $categoryManager->add($data);
            
            }   
    
         header("Location: index.php?ctrl=cinema&action=index");


    }     



    public function listMovies() {

        $movieManager = new MovieManager();
        $movies = $movieManager->findAll();

        return [
            "view" => VIEW_DIR."cinema/listMovies.php",
            "meta_description" => "Liste des films :",
            "data" => [
                
                "movies" => $movies,
                
            ]
        ];

  }


    public function infosMovies($id) {

        $movieManager = new MovieManager();
        $movie = $movieManager->findOneById($id);
        

        return [
           "view" => VIEW_DIR."cinema/infosMovies.php",
           "meta_description" => " Infos des films:",
           "data" => [
            
              "movie" => $movie,
        
            ]
        ];
    
    }


    public function addMovieForm(){

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
        
        if(isset($_POST["submit"])) {
            // var_dump($_POST);

            $movieManager = new MovieManager();
            //var_dump('hello');

            
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
           
          


            // Récupére le user en session dans la variable $user
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
           
        
            $movieManager->add($data);
          
            //var_dump($_POST,$_FILES);die;
          
           
            $this->redirectTo("cinema", "listMovies");
                     exit;


            
        }


    }



    public function addEventform($id){

        $movieManager = new MovieManager();
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





 

            if(isset($_POST["submit"])) {
           


            $eventManager = new EventManager();




             $eventName = filter_input(INPUT_POST, "eventName", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
             $eventDateTime = filter_input(INPUT_POST, "eventDateTime",FILTER_VALIDATE_INT);
             $placeAvailable = filter_input(INPUT_POST, "placeAvailable", FILTER_VALIDATE_INT);
             $theatre = filter_input(INPUT_POST, "theatre",FILTER_SANITIZE_FULL_SPECIAL_CHARS);
             $city = filter_input(INPUT_POST, "city",FILTER_SANITIZE_FULL_SPECIAL_CHARS);
             $postalCode = filter_input(INPUT_POST,"postalCode",FILTER_VALIDATE_INT);
             $movieId =filter_input(INPUT_POST,"movie_id",FILTER_VALIDATE_INT);



             

             if (!isset($_FILES["fileToUpload"]) || $_FILES["fileToUpload"]["error"] !== 0) {
                die("Erreur : Aucun fichier n'a été uploadé ou une erreur s'est produite.");
            }
    
            //var_dump($_POST,$_FILES);

             
             $target_dir = "public/uploads/";
             $imagePath = $target_dir . basename($_FILES["fileToUpload"]["name"]);
             $uploadOk = 1;
             $imageFileType = strtolower(pathinfo($imagePath,PATHINFO_EXTENSION));
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

             //var_dump($_FILES);


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
                echo "Le fichier " . (basename($_FILES["fileToUpload"]["name"])) . " a été uploadé avec succès.";
            } else {
                die("Erreur lors de l'upload du fichier.");
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
            
            
            
            $eventManager->add($data);
                        //var_dump($_POST,$_FILES);

               
              $this->redirectTo("cinema", "listMovies");
              exit;


           






        }






    }



    // public function deleteMovie($id){


    //      $movieManager = new MovieManager();

    //      $id = $movieManager->findOneById($id);

    //      $id->delete($id);


    //      $this->redirectTo("cinema", "listMovies");
    //      exit;









    // }


       


    
    
   

    


}