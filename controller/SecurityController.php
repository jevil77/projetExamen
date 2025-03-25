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

        //var_dump('hello');die;

        // if ($_SERVER["REQUEST_METHOD"] === "POST") {
        //     // Vérification de la case consentement
        //     if (!isset($_POST["consent"])) {
        //         $_SESSION["error"] = "Vous devez accepter les conditions d'utilisation.";
        //         header("Location: index.php?ctrl=security&action=registerRealisateur");
        //         exit();
        //     }
        
        
        
        if(isset($_POST["submit"])) {

            //var_dump('hello');

            
        
            //    $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            //    $firstName = filter_input(INPUT_POST, "firstName", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
               $pseudo = filter_input(INPUT_POST, "pseudo", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            //    $role = filter_input(INPUT_POST, "role", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
               $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
               $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
               $password_confirm = filter_input(INPUT_POST, "password_confirm", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
               
        
            //var_dump($pseudo,$email,$password);
        
            if( $pseudo  && $email && $password && $password_confirm) {
            
     
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
                    
                    if (strlen($password) < 5) {
                        Session::addFlash('error', 'Le mot de passe doit contenir au moins 5 caractères.');
                        $this->redirectTo("security", "registerRealisateurForm");
                        exit;
                    }
                
                
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
                        //var_dump("hello"); die;
                        $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                        $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

                         //var_dump($email,$password);


                        if($email && $password) {
                           
                           $user = $userManager->findOneByEmail($email);
                        //   var_dump($user);
                        
                           if($user){
                            
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
                        
                        }
                    
                
    
               



                }



            

       
            }





    public function logout () {

            unset($_SESSION["user"]);

            $this->redirectTo("home");

         
    }

}
    
        





