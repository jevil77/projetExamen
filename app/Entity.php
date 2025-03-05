<?php
namespace App;

// La classe abstraite Entity permet d'hydrater automatiquement les objets à partir d'un tableau de données
// Elle est la classe parente des entités du projet
// Elle ne peut être instancié directement, elle est la base d'autres classes. Toutes les entités hériteront de cette méthode d'hydratation

abstract class Entity{

    protected function hydrate($data){
        // Parcourt les données
        foreach($data as $field => $value){
            // field = topic_id
            // fieldarray = ['topic','id'] // Gère les clés étrangères, divise le nom du champ avec un _
            $fieldArray = explode("_", $field);
            // Vérifie si il s'agit d'une clé étrangère
            if(isset($fieldArray[1]) && $fieldArray[1] == "id"){
                // manName = TopicManager , nom du manager
                $manName = ucfirst($fieldArray[0])."Manager";
                // FQCName = Model\Managers\TopicManager; chemin complet
                $FQCName = "Model\Managers\\".$manName;
                
                // man = new Model\Managers\TopicManager, instancie dynamiquement
                $man = new $FQCName();
                // value = Model\Managers\TopicManager->findOneById(1), récupère l'entité liée
                $value = $man->findOneById($value);
            }

            // Fabrication du nom du setter à appeler (ex: setName)
            $method = "set".ucfirst($fieldArray[0]);
            
            // vérifie si setName est une méthode qui existe dans l'entité (this)
            if(method_exists($this, $method)){
                // $this->setName("valeur")
                $this->$method($value);
            }
        }
    }
    // Renvoie le nom de la classe de l'objet
    public function getClass(){
        return get_class($this);
    }
}

// L'objectif ici est de faciliter l'initialisation des objets en remplissant automatiquement leurs propriétés grâce à hydrate().
// Facilite l'initialisation des objets en remplissant les propriétés grâce à hydrate