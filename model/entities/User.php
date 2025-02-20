<?php
namespace Model\Entities;

use App\Entity;

/*
    En programmation orientée objet, une classe finale (final class) est une classe que vous ne pouvez pas étendre, c'est-à-dire qu'aucune autre classe ne peut hériter de cette classe. En d'autres termes, une classe finale ne peut pas être utilisée comme classe parente.
*/

final class User extends Entity{

    private $id;         // INT
    private $name;            // VARCHAR
    private $firstName;       // VARCHAR
    private $pseudo;          // VARCHAR
    private $role;            // VARCHAR
    private $email;           // VARCHAR
    private $password;        // VARCHAR
    private $creationDate;    // DATETIME
    private $event;




    // Constructeur de la classe Movie.
    // Prend un tableau de données et les hydrate

    public function __construct($data){         
        $this->hydrate($data);        
    }

    /**
     * Get the value of idUser
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of idUser
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

     /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of firstName
     */ 
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set the value of firstName
     *
     * @return  self
     */ 
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

/**
     * Get the value of pseudo
     */ 
    public function getPseudo()
    {
        return $this->pseudo;
    }

    /**
     * Set the value of pseudo
     *
     * @return  self
     */ 
    public function setPseudo($pseudo)
    {
        $this->pseudo = $pseudo;

        return $this;
    }
    
     /**
     * Get the value of role
     */ 
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Set the value of role
     *
     * @return  self
     */ 
    public function setRole($role)
    {
        $this->role = $role;

        return $this;
    }

/**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

     /**
     * Get the value of password
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

      /**
     * Get the value of dateAdded
     */ 
    public function getCreationDate()
    {
        return $this->creationDate;
    }

    /**
     * Set the value of dateAdded
     *
     * @return  self
     */ 
    public function setCreationDate($creationDate)
    {
        $this->creationDAte = $creationDate;

        return $this;
    }


    /**
     * Get the value of event
     */ 
    public function getEvent()
    {
        return $this->event;
    }

    /**
     * Set the value of event
     *
     * @return  self
     */ 
    public function setEvent($event)
    {
        $this->event = $event;

        return $this;
    }

    
    public function __toString() {
        return $this->pseudo;
    }// Vérifie si l'utilisateur en session est administrateur (hasRole)

    public function hasRole($role){


        if($role == "ROLE_ADMIN"){


 return true;


      
    
    } else {

            return false;


    }

}
  




    

   

   

    
}