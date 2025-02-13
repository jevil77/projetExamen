<?php
namespace Model\Managers;

use App\Manager;
use App\DAO;

class PostManager extends Manager{



     // on indique la classe POO et la table correspondante en BDD pour le manager concerné
     protected $className = "Model\Entities\Post";
     protected $tableName = "post";
 
     public function __construct(){
         parent::connect();
     }

    // récupère les posts par films (par leur id)

     public function findPostsByMovies($id) {

        $sql = "SELECT * 
                FROM ".$this->tableName." p
                 WHERE p.movie_id = :id
                ORDER BY p.dateAdded ASC";


     // la requête renvoie plusieurs enregistrements --> getMultipleResults
        return  $this->getMultipleResults(
            DAO::select($sql, ['id' => $id]), 
            $this->className
        );
     }





    }