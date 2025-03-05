<?php
namespace App;

/*
    En programmation orientée objet, une classe abstraite est une classe qui ne peut pas être instanciée directement. Cela signifie que vous ne pouvez pas créer un objet directement à partir d'une classe abstraite.
    Les classes abstraites : 
    -- peuvent contenir à la fois des méthodes abstraites (méthodes sans implémentation) et des méthodes concrètes (méthodes avec implémentation).
    -- peuvent avoir des propriétés (variables) avec des valeurs par défaut.
    -- une classe peut étendre une seule classe abstraite.
    -- permettent de fournir une certaine implémentation de base.
*/

abstract class AbstractController{

    public function index() {}



// Cette méthode permet de rediriger l'utilisateur vers une autre page en construisant dynamiquement une URL.

    public function redirectTo($ctrl = null, $action = null, $id = null){

        $url = $ctrl ? "?ctrl=".$ctrl : "";               // contrôleur cible
        $url.= $action ? "&action=".$action : "";         // action à exécuter
        $url.= $id ? "&id=".$id : "";                     // identifiant d'un élément

        header("Location: $url");                         // redirection vers la nouvelle url
        die();
    }



// Cette méthode sert à restreindre l'accès ,à certains utilisateurs, à certaines pages 
    public function restrictTo($role){
        // Vérifie si l'utilisateur est connecté et si il possède le rôle requis sinon il est redirigé
        if(!Session::getUser() || !Session::getUser()->hasRole($role)){
            $this->redirectTo("security", "login");
        }
        return;
    }

}

// Tous les contrôleurs qui héritent de AbstractController peuvent utiliser redirectTo sans réécrire à chaque fois le code