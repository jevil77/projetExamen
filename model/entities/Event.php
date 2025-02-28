<?php
namespace Model\Entities;

use App\Entity;

/*
    En programmation orientée objet, une classe finale (final class) est une classe que vous ne pouvez pas étendre, c'est-à-dire qu'aucune autre classe ne peut hériter de cette classe. En d'autres termes, une classe finale ne peut pas être utilisée comme classe parente.
*/

final class Event extends Entity{

    private $id;    // INT
    private $eventName;   // VARCHAR
    private $eventDateTime; // DATETIME
    private $placeAvailable; // INT
    private $theatre; // VARCHAR
    private $city; // VARCHAR
    private $postalCode; // INT
    private $imagePath;
    private $user;
    private $movie;


    // chaque entité aura le même constructeur grâce à la méthode hydrate (issue de App\Entity)
     // Constructeur de la classe Movie.
    // Prend un tableau de données et les hydrate
    public function __construct($data){         
        $this->hydrate($data);        
    }


    // Getter et Setter pour chaque attribut


    

    
    
    

    /**
     * Get the value of idEvent
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of idEvent
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of eventName
     */ 
    public function getEventName()
    {
        return $this->eventName;
    }

    /**
     * Set the value of eventName
     *
     * @return  self
     */ 
    public function setEventName($eventName)
    {
        $this->eventName = $eventName;

        return $this;
    }

    /**
     * Get the value of eventDateTime
     */ 
    public function getEventDateTime()
    {
        return $this->eventDateTime;
    }

    /**
     * Set the value of eventDateTime
     *
     * @return  self
     */ 
    public function setEventDateTime($eventDateTime)
    {
        $this->eventDateTime = $eventDateTime;

        return $this;
    }

    /**
     * Get the value of placeAvailable
     */ 
    public function getPlaceAvailable()
    {
        return $this->placeAvailable;
    }

    /**
     * Set the value of placeAvailable
     *
     * @return  self
     */ 
    public function setPlaceAvailable($placeAvailable)
    {
        $this->placeAvailable = $placeAvailable;

        return $this;
    }

    /**
     * Get the value of theatre
     */ 
    public function getTheatre()
    {
        return $this->theatre;
    }

    /**
     * Set the value of theatre
     *
     * @return  self
     */ 
    public function setTheatre($theatre)
    {
        $this->theatre = $theatre;

        return $this;
    }

    /**
     * Get the value of city
     */ 
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set the value of city
     *
     * @return  self
     */ 
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get the value of postalCode
     */ 
    public function getPostalCode()
    {
        return $this->postalCode;
    }

    /**
     * Set the value of postalCode
     *
     * @return  self
     */ 
    public function setPostalCode($postalCode)
    {
        $this->postalCode = $postalCode;

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


    public function __toString(){
        return $this->eventName;
    }

    

    
}

// Entité : une entité représente une table de la base de données sous forme de classe PHP.
// Elle permet de manipuler des données sous forme d'objets.