<?php
namespace Model\Entities;

use App\Entity;

/*
    En programmation orientée objet, une classe finale (final class) est une classe que vous ne pouvez pas étendre, c'est-à-dire qu'aucune autre classe ne peut hériter de cette classe. En d'autres termes, une classe finale ne peut pas être utilisée comme classe parente.
*/

final class Category extends Entity{

    private $idCategory;    // INT
    private $categoryName;   // VARCHAR

    // chaque entité aura le même constructeur grâce à la méthode hydrate (issue de App\Entity)
     // Constructeur de la classe Movie.
    // Prend un tableau de données et les hydrate
    public function __construct($data){         
        $this->hydrate($data);        
    }


    // Getter et Setter pour chaque attribut

    // Récupère la valeur de id_movie
    /**
     * Get the value of id_category
     */ 
    public function getIdCategory()
    {
        return $this->idCategory;
    }


    // Définit la valeur de id_movie

    /**
     * Set the value of id_category
     *
     * @return  self
     */ 
    public function setIdCategory($idCategory)
    {
        $this->idCategory = $idCategory;

        return $this;
    }



    /**
     * Get the value of categoryName
     */ 
    public function getCategoryName()
    {
        return $this->categoryName;
    }

    /**
     * Set the value of categoryName
     *
     * @return  self
     */ 
    public function setCategoryName($categoryName)
    {
        $this->categoryName = $categoryName;

        return $this;
    }


   
    public function __toString(){
        return $this->categoryName;
    }

    

    
}






// Entité : une entité représente une table de la base de données sous forme de classe PHP.
// Elle permet de manipuler des données sous forme d'objets.