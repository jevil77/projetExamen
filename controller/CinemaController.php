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
    //var_dump('hello');die;

        



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
            // var_dump($category,$movieTitle);
            // if ($category_id === false || empty($category_id)) {
            //     die("Erreur : Veuillez sélectionner une catégorie.");
            // }


            
            

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
                //  'user_id' => App\Session::getUser()->getId()
                 // Récupère l'id du user en session
                'user_id' => $user->getId() 
            ];


           
            // $data = ['movieTitle' => $movieTitle,
            //          'releaseDate'=> $releaseDate,
            //          'duration'=> $duration, 
            //          'synopsis'=> $synopsis,
            //          'rating' => $rating,
            //          'category_id' => $category,
            //          'user_id' => $user=Session::getUser()
                     
                    
            //        ];
            //var_dump($movieTitle, $releaseDate, $duration, $synopsis, $rating, $director);
            $movieManager->add($data);
            //var_dump($movieTitle);
            var_dump($data);
            //var_dump("Le film a été ajouté avec succès");die;
            $this->redirectTo("cinema", "listMovies");
                     exit;
 //var_dump($movieTitle);

            
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
             $eventDateTime = filter_input(INPUT_POST, "eventDateTime", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
             $placeAvailable = filter_input(INPUT_POST, "placeAvailable", FILTER_VALIDATE_INT);
             $theatre = filter_input(INPUT_POST, "theatre",FILTER_SANITIZE_FULL_SPECIAL_CHARS);
             $city = filter_input(INPUT_POST, "city",FILTER_SANITIZE_FULL_SPECIAL_CHARS);
             $postalCode = filter_input(INPUT_POST,"postalCode",FILTER_VALIDATE_INT);
            


            //  var_dump($eventName, $eventDateTime, $placeAvailable, $theatre, $city, $postalCode);

            $user = Session::getUser();

            $data = [

              'eventName' => $eventName,
              'eventDateTime' => $eventDateTime,
              'placeAvailable' => $placeAvailable,
              'theatre' => $theatre,
              'city' => $city,
              'postalCode' => $postalCode,
              
              "user_id" => $user->getId()
              

              
            
            
            ];
            
            // var_dump($data);
            
           
              $eventManager->add($data);
            //   var_dump($data);

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