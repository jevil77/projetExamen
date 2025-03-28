<?php
namespace Controller;


// Importation des classes nécessaires
// Fournit des méthodes utiles à tous les contrôleurs, gestion des vues
use App\AbstractController;
// Impose certaines méthodes aux contrôleurs
use App\ControllerInterface;
// UserManager est utilisé pour interagir avec les utilisateurs de la base de données
use Model\Managers\UserManager;
use Model\Managers\MovieManager;
use Model\Managers\EventManager;


// Homecontroller hérite des fonctions de AbstractController et implémente les méthodes définies dans ControllerInterface
class HomeController extends AbstractController implements ControllerInterface {
    

    // Cette méthode affiche la page d'accueil
    // view : chemin du fichier de la vue
    // meta-description : description pour le référencement SEO (Search Engine Optimization / Optimisation pour les moteurs de recherche)
    public function index(){


        $movieManager = new MovieManager();

        $movies = $movieManager->findFiveLastMovies();

        $eventManager = new EventManager();

        $events = $eventManager->findFiveLastEvents();




       
        return [
            "view" => VIEW_DIR."home.php",
            "meta_description" => "Page d'accueil",
            "data" => [

                "movie" => $movies,
                "event" => $events
                 

            ]
        ];
    }
   
    // Méthode qui vérifie que l'utilisateur a le rôle de ROLE_USER
    public function users() {
         $this->restrictTo("ROLE_USER");

         $manager = new UserManager();
         $users = $manager->findAll(['register_date', 'DESC']);

        return [
             "view" => VIEW_DIR . "security/users.php",
             "meta_description" => "Liste des utilisateurs du forum",
             "data" => [
                 "users" => $users
             ]
        ];
    }


    public function test() {

    }






    
 
    
    






}
