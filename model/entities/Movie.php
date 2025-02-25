<?php
namespace Model\Entities;

use App\Entity;

/*
    En programmation orientée objet, une classe finale (final class) est une classe que vous ne pouvez pas étendre, c'est-à-dire qu'aucune autre classe ne peut hériter de cette classe. En d'autres termes, une classe finale ne peut pas être utilisée comme classe parente.
*/


// Cette classe représente un modèle pour un film dans la gestion de films. Structure orientée objet où chaque propriété correspond à un champ de la base de données
final class Movie extends Entity{

    private $id;      // INT
    private $movieTitle;    // VARCHAR
    private $releaseDate;   // INT
    private $duration;      // INT
    private $synopsis;      // TEXT
    private $rating;        // DECIMAL
    private $trailer;       // VARCHAR
    private $imagePath;   // VARCHAR
     // VARCHAR
    private $category;      // 
    private $user;          // 
    
    
    // Constructeur de la classe Movie.
    // Prend un tableau de données et les hydrate
    public function __construct($data){         
        $this->hydrate($data);        
    }


    

    // Getter et Setter pour chaque attribut


   
    // Récupère la valeur de id_movie
    /**
     * Get the value of id_movie
     */ 
    public function getId()
    {
        return $this->id;
    }
    
    // Définit la valeur de id_movie
    /**
     * Set the value of id_movie
     *
     * @return  self
     */ 
    public function setId($idMovie)
    {
        $this->id = $idMovie;

        return $this;
    }


    /**
     * Get the value of movieTitle
     */ 
    public function getMovieTitle()
    {
        return $this->movieTitle;
    }

    /**
     * Set the value of movieTitle
     *
     * @return  self
     */ 
    public function setMovieTitle($movieTitle)
    {
        $this->movieTitle = $movieTitle;

        return $this;
    }

    /**
     * Get the value of releaseDate
     */ 
    public function getReleaseDate()
    {
        return $this->releaseDate;
    }

    /**
     * Set the value of releaseDate
     *
     * @return  self
     */ 
    public function setReleaseDate($releaseDate)
    {
        $this->releaseDate = $releaseDate;

        return $this;
    }

    /**
     * Get the value of duration
     */ 
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * Set the value of duration
     *
     * @return  self
     */ 
    public function setDuration($duration)
    {
        $this->duration = $duration;

        return $this;
    }

    /**
     * Get the value of synopsis
     */ 
    public function getSynopsis()
    {
        return $this->synopsis;
    }

    /**
     * Set the value of synopsis
     *
     * @return  self
     */ 
    public function setSynopsis($synopsis)
    {
        $this->synopsis = $synopsis;

        return $this;
    }
    
 /**
     * Get the value of rating
     */ 
    public function getRating()
    {
        return $this->rating;
    }

    /**
     * Set the value of rating
     *
     * @return  self
     */ 
    public function setRating($rating)
    {
        $this->rating = $rating;

        return $this;
    }

     /**
     * Get the value of trailer
     */ 
    public function getTrailer()
    {
        return $this->trailer;
    }

    /**
     * Set the value of trailer
     *
     * @return  self
     */ 
    public function setTrailer($trailer)
    {
        $this->trailer = $trailer;

        return $this;
    }


     /**
     * Get the value of imagePath
     */ 
    public function getImagePath()
    {
        return $this->imagePath;
    }

    /**
     * Set the value of imagePath
     *
     * @return  self
     */ 
    public function setImagePath($imagePath)
    {
        $this->imagePath = $imagePath;

        return $this;
    }

    /**
     * Get the value of category
     */ 
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set the value of category
     *
     * @return  self
     */ 
    public function setCategory($category)
    {
        $this->category = $category;

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



    // retourne le titre du film lorsque l'objet est converti en chaîne de caractères.
    public function __toString(){
        return $this->movieTitle;
    }

    

    

   
}