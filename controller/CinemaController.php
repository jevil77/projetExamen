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
            "view" => VIEW_DIR."cinema/form/addCategorieForm.php",
            "meta_description" => "Liste des catégories de films",
         
        ];


    }




    public function addCategory(){

        if(isset($_POST['submit'])) {


               // créer une nouvelle instance de CategoryManager 
               $categoryManager = new CategoryManager();
               // récupérer les noms des catégories
               $category = $categoryManager->findAll(["categoryName"]);

               // filtrer les données
               $categoryName = filter_input(INPUT_POST, "categoryName", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
               
               $data = ['categoryName'=> $categoryName];

               $categorieManager->add($data);
            
            }   
    
         header("Location: index.php?ctrl=cinema&action=index");


    }     
    
    public function addCategory(){

        if(isset($_POST['submit'])) {


               // créer une nouvelle instance de CategoryManager 
               $categoryManager = new CategoryManager();
               // récupérer les noms des catégories
               $category = $categoryManager->findAll(["categoryName"]);

               // filtrer les données
               $categoryName = filter_input(INPUT_POST, "categoryName", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
               
               $data = ['categoryName'=> $categoryName];

               $categorieManager->add($data);
            
            }   
    
         header("Location: index.php?ctrl=cinema&action=index");


    }        


    public function addCategory(){

        if(isset($_POST['submit'])) {


               // créer une nouvelle instance de CategoryManager 
               $categoryManager = new CategoryManager();
               // récupérer les noms des catégories
               $category = $categoryManager->findAll(["categoryName"]);

               // filtrer les données
               $categoryName = filter_input(INPUT_POST, "categoryName", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
               
               $data = ['categoryName'=> $categoryName];

               $categorieManager->add($data);
            
            }   
    
         header("Location: index.php?ctrl=cinema&action=index");
         echo 'tt';


    }  




}