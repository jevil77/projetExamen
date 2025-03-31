<?php
namespace Controller;

use App\Session;
use App\AbstractController;
use App\ControllerInterface;
use Model\Managers\UserManager;

class SecurityController extends AbstractController{
    // contiendra les méthodes liées à l'authentification : register, login et logout



    public function registerUserForm (){
        

        return [
            "view" => VIEW_DIR."security/registerUser.php",
            "meta_description" => "Formulaire d'inscription"
         
        ];


    }



    public function registerUser () {


         if(isset($_POST["submit"])) {

               $pseudo = filter_input(INPUT_POST, "pseudo", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
               $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
               $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
               $password_confirm = filter_input(INPUT_POST, "password_confirm", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
               
               $passwordRegex = "/^(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/";
               // preg_match teste si le mot de passe correspond aux critères, 
               // le bloc d'erreur est exécuté si le mot de pass ne correspond pas
               if (!preg_match($passwordRegex, $password)) {
                   Session::addFlash('error', 'Le mot de passe doit contenir au moins 8 caractères, une majuscule, un chiffre et un caractère spécial.');
                   $this->redirectTo("security", "registerUserForm");
                   exit;
               }
        
            if( $pseudo && $email && $password && $password_confirm) {
            
     
               $userManager = new UserManager();
            
               $user = $userManager->findOneByEmail($email);
       
            
            
             
                if ($user) { 
                    Session::addFlash('error', 'Un compte avec cet email existe déjà !');
                    $this->redirectTo("security", "registerUserForm");
                    exit;
                
                } else {
                    
                    if ($password !== $password_confirm) {
                        Session::addFlash('error', 'Les mots de passe ne correspondent pas.');
                        $this->redirectTo("security", "registerUserForm");
                        exit;
                    }
                    
                    if (strlen($password) < 5) {
                        Session::addFlash('error', 'Le mot de passe doit contenir au moins 5 caractères.');
                        $this->redirectTo("security", "registerUserForm");
                        exit;
                    }
                    
                    // Ajoute un utilisateur en base de données
                    $userManager->add([
                    
                        "pseudo" => $pseudo,
                        
                        "email" => $email,
                        // Hachage sécurisé du mot de passe avant insertion en base de données
                        "password" => password_hash($password, PASSWORD_DEFAULT),
                        "role" => "ROLE_USER"
                       
                     ]);
                    
                
                     //var_dump($_POST);die;
                    
                    
                    }
                     $this->redirectTo("security", "loginForm");
                     exit;

                        
        
                }

                         
            }

        

    }         




    public function registerRealisateurForm(){
      

        return [
            "view" => VIEW_DIR."security/registerRealisateur.php",
            "meta_description" => "Formulaire d'inscription"
         
        ];


    }


    public function registerRealisateur(){


        if(isset($_POST["submit"])) {

            //var_dump('hello');

            
        
               $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
               $firstName = filter_input(INPUT_POST, "firstName", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
               $pseudo = filter_input(INPUT_POST, "pseudo", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
               $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
               $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
               $password_confirm = filter_input(INPUT_POST, "password_confirm", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

               $passwordRegex = "/^(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/";
               // preg_match teste si le mot de passe correspond aux critères, le bloc d'erreur est exécuté si le mot de pass ne corrspond pas
               if (!preg_match($passwordRegex, $password)) {
                   Session::addFlash('error', 'Le mot de passe doit contenir au moins 8 caractères, une majuscule, un chiffre et un caractère spécial.');
                   $this->redirectTo("security", "registerRealisateurForm");
                   exit;
               }
               if( $name && $firstName && $pseudo && $email && $password && $password_confirm) {
            
     
                $userManager = new UserManager();
             
                $user = $userManager->findOneByEmail($email);

                if ($user) { 
                    Session::addFlash('error', 'Un compte avec cet email existe déjà !');
                    $this->redirectTo("security", "registerRealisateurForm");
                    exit;
                
                } else {
                    
                    if ($password !== $password_confirm) {
                        Session::addFlash('error', 'Les mots de passe ne correspondent pas.');
                        $this->redirectTo("security", "registerRealisateurForm");
                        exit;
                    }
                    
                    // if (strlen($password) < 5) {
                    //     Session::addFlash('error', 'Le mot de passe doit contenir au moins 5 caractères.');
                    //     $this->redirectTo("security", "registerRealisateurForm");
                    //     exit;
                    // }
                
                
                    $userManager->add([

                        "name" => $name,
                        "firstName" => $firstName,
                        "pseudo" => $pseudo,
                        "email" => $email,
                        "password" => password_hash($password, PASSWORD_DEFAULT),
                        "role" => "ROLE_REALISATEUR"
                       
                     ]);
                    
                
                     //var_dump($_POST);die;
                    
                    
                    }
                     $this->redirectTo("security", "loginForm");
                     exit;

                        
        
                }

                         
            

        }

    }         
               





    
    

            
    public function loginForm() {

            return [
            "view" => VIEW_DIR."security/login.php",
            "meta_description" => "Page de connexion"
         
            ];

        }


            public function login(){

                if(isset($_POST["submit"])) {

                    
               

                        $userManager = new UserManager();
                       
                        $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                        $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

                         
                        //Vérifie que les deux champs ont bien été remplis.
                        if($email && $password) {
                           //Instancie UserManager et cherche un utilisateur correspondant à l'email
                           $user = $userManager->findOneByEmail($email);
                        
                            
                           
                           if($user->getBan() == 0){
                                if($user){


                                //Récupère le mot de passe haché depuis la base de données.
                                $hash = $user->getPassword();
                    
                                // Vérification du mot de passe avec password_verify
                                if(password_verify($password, $hash)){
 
                                 $_SESSION["user"] = $user;
                                 $_SESSION["message"] = "Bienvenue ! ";
                                  //$_SESSION["user"] = $user;
                                 $this->redirectTo( "home","listUsers");
                                
                                 
                                
                                
                          
                                } else {
                                    Session::addFlash('error', 'Le mot de passe est incorrect !');
                                    $this->redirectTo("security", "loginForm");
                                    exit;
                                }
                            } else {
                                Session::addFlash('error', 'Aucun utilisateur trouvé avec cet email !');
                                $this->redirectTo("security", "loginForm");
                                exit;
                            }
                        
                    
                        
    
                        }  else {
                            Session::addFlash('error', "Vous n'avez pas été gentil, vous êtes ban");
                            $this->redirectTo("security", "loginForm");
                        }

                       
                       
               



                }



            

            }
            

            }



    public function logout () {

            unset($_SESSION["user"]);

            $this->redirectTo("home");

         
    }

}
    
        





