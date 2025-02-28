<?php
namespace Model\Entities;

use App\Entity;




final class Participate extends Entity {



    private $id;
    private $reservePlace;
    private $user;
    private $event;


    public function __construct($data){         
        $this->hydrate($data);        
    }



    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of reservePlace
     */ 
    public function getReservePlace()
    {
        return $this->reservePlace;
    }

    /**
     * Set the value of reservePlace
     *
     * @return  self
     */ 
    public function setReservePlace($reservePlace)
    {
        $this->reservePlace = $reservePlace;

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



    public function __toString(){
        return $this->getReservePlace;
    }






}