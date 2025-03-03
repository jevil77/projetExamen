<?php
namespace Model\Entities;

use App\Entity;




final class Liker extends Entity {



    private $user_id;
    private $movie_id;




    /**
     * Get the value of user_id
     */ 
    public function getUser_id()
    {
        return $this->user_id;
    }

    /**
     * Set the value of user_id
     *
     * @return  self
     */ 
    public function setUser_id($user_id)
    {
        $this->user_id = $user_id;

        return $this;
    }

    /**
     * Get the value of movie_id
     */ 
    public function getMovie_id()
    {
        return $this->movie_id;
    }

    /**
     * Set the value of movie_id
     *
     * @return  self
     */ 
    public function setMovie_id($movie_id)
    {
        $this->movie_id = $movie_id;

        return $this;
    }
}

