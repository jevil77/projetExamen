<?php
namespace Controller;

use App\AbstractController;
use App\ControllerInterface;
use Model\Managers\UserManager;

class SecurityController extends AbstractController{
    // contiendra les méthodes liées à l'authentification : register, login et logout



    public function registerForm(){
        var_dump('hello');

        return [
            "view" => VIEW_DIR."security/register.php",
            "meta_description" => "Formulaire d'inscription"
         
        ];


    }



    public function register () {

        
        
        if(isset($_POST["submit"])) {

            var_dump($_POST);
            
        
               $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
               $firstName = filter_input(INPUT_POST, "firstName", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
               $pseudo = filter_input(INPUT_POST, "pseudo", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
               $role = filter_input(INPUT_POST, "role", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
               $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
               $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
               $password_confirm = filter_input(INPUT_POST, "password_confirm", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
               
        
        
        
            if($name && $firstName && $pseudo && $role && $email && $password && $password_confirm) {
            
     
               $userManager = new UserManager();
            
               $user = $userManager->findOneByEmail($email);
       
            
            
             
                if ($user) {
                    //echo "Un compte avec cet email existe déjà.";

                    $this->redirectTo("security", "loginForm");
                    exit;
                
                } else {
                    
                    if($password == $password_confirm && strlen($password) >= 5) {
                    
                
                
                    $userManager->add([
                        "name" => $name,
                        "firstName" => $firstName,
                        "pseudo" => $pseudo,
                        "role" => $role,
                        "email" => $email,
                        
                        "password" => password_hash($password, PASSWORD_DEFAULT),
                       
                     ]);
                    
                

                    
                    
                    
                    }
                     $this->redirectTo("security", "loginForm");
                     exit;

                        
        
                }

                         
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

                        // var_dump($mail,$password);die;


                        if($email && $password) {

                           $user = $userManager->findOneByEmail($email);
                    
                           if($user){
                        
                                $hash = $user->getPassword();
                    

                    

                                if(password_verify($password, $hash)){
 
                                 $_SESSION["user"] = $user;
                                 $_SESSION["message"] = "Bienvenue ! ";
                                 // $_SESSION["user"] = $user;
                                 $this->redirectTo( "home","listUsers");
                                 var_dump($_SESSION);
                                 
                                
                                
                          
                                       
                                }   else {

                                        echo "Un problème est survenu";
                                        // $this->redirectTo("security", "login");
                                         
                                }    
                            
                            
                            }
                        
                        
                        }
                    
                
    
               



                }



            

       
            }





    public function logout () {

            unset($_SESSION["user"]);

            $this->redirectTo("home");

         
    }

}
    
        






    
    
 