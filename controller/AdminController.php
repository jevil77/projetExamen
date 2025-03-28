<?php
namespace Controller;

use App\Session;
use App\AbstractController;
use App\ControllerInterface;
use Model\Managers\CategoryManager;



class AdminController extends AbstractController{







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
             
             // Filtre les données
             $categoryName = filter_input(INPUT_POST, "categoryName", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
           
             // Prépare les données pour l'ajout en base de données
             $data = ['categoryName'=> $categoryName];
             //  Ajoute les données en base de données
             $categoryManager->add($data);}   
       // Redirige après l'ajout
       header("Location: index.php?ctrl=cinema&action=index");
      }     



      
      








        









     }



















