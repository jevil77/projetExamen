<?php

//Permet d'organiser le code et regroupe classes, fonctions et constantes afin d'éviter des conflits de nom

namespace Model\Entities;

// Importe la classe Entity qui se trouve dans App
use App\Entity;


// Final car elle ne peut pas être étendue
// Class, mot-clé qui définit une classe en PHP
// Post, nom de la classe
//Extends permet à la classe Post d'hériter de la classe Entity

final class Post extends Entity{


    private $id_post;         // INT
    private $text;            // TEXT
    private $dateAdded;       // DATETIME
    private $user;           
    private $movie; 



    // Constructeur de la classe Movie.
    // Prend un tableau de données et les hydrate
    public function __construct($data){         
        $this->hydrate($data);        
    }

     // Getter et Setter pour chaque attribut



     
    /**
     * Get the value of id_post
     */ 
    public function getId_post()
    {
        return $this->id_post;
    }

    /**
     * Set the value of id_post
     *
     * @return  self
     */ 
    public function setId_post($id_post)
    {
        $this->id_post = $id_post;

        return $this;
    }


    

    /**
     * Get the value of text
     */ 
    public function getText()
    {
        return $this->text;
    }

    /**
     * Set the value of text
     *
     * @return  self
     */ 
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }



    

    /**
     * Get the value of dateAdded
     */ 
    public function getDateAdded()
    {
        return $this->dateAdded;
    }

    /**
     * Set the value of dateAdded
     *
     * @return  self
     */ 
    public function setDateAdded($dateAdded)
    {
        $this->dateAdded = $dateAdded;

        return $this;
    }


    /**
     * Get the value of user
     */ 
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set the value of user
     *
     * @return  self
     */ 
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }


     /**
     * Get the value of movie
     */ 
    public function getMovie()
    {
        return $this->movie;
    }

    /**
     * Set the value of movie
     *
     * @return  self
     */ 
    public function setMovie($movie)
    {
        $this->movie = $movie;

        return $this;
    }



   // retourne le titre du film lorsque l'objet est converti en chaîne de caractères.
   public function __toString(){
    return $this->title;
}



    

   
}