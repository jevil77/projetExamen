<?php



namespace Model\Managers;

use App\Manager;
use App\DAO;

class MovieManager extends Manager{

    // on indique la classe POO et la table correspondante en BDD pour le manager concerné
    protected $className = "Model\Entities\Movie";
    protected $tableName = "movie";

    public function __construct(){
        parent::connect();
    }

    // récupérer tous les films d'une catégorie spécifique (par son id)
    public function findMoviesByCategory($id) {

        $sql = "SELECT * 
                FROM ".$this->tableName." t 
                WHERE t.category_id = :id";
       
        // la requête renvoie plusieurs enregistrements --> getMultipleResults
        return  $this->getMultipleResults(
            DAO::select($sql, ['id' => $id]), 
            $this->className
        );
    }



    public function findOneById($id){

        $sql = "SELECT *
                FROM ".$this->tableName." a
                WHERE a.id_".$this->tableName." = :id
                ";
                
        return $this->getOneOrNullResult(
            
            DAO::select($sql, ['id' => $id], false), 
            $this->className
        );

    }


    public function add($data){
        //$keys = ['username' , 'password', 'email']
        $keys = array_keys($data);
        //$values = ['Squalli', 'dfsyfshfbzeifbqefbq', 'sql@gmail.com']
        $values = array_values($data);
        //"username,password,email"
        $sql = "INSERT INTO ".$this->tableName."
                (".implode(',', $keys).") 
                VALUES
                ('".implode("','",$values)."')";
                //"'Squalli', 'dfsyfshfbzeifbqefbq', 'sql@gmail.com'"
        /*
            INSERT INTO user (username,password,email) VALUES ('Squalli', 'dfsyfshfbzeifbqefbq', 'sql@gmail.com') 
        */
        try{
            return DAO::insert($sql);
        }
        catch(\PDOException $e){
            echo $e->getMessage(); 
            die();
        }
    }


    

    public function findFiveLastMovies(){


    $sql = "SELECT *
            FROM " . $this->tableName . " m
            ORDER BY m.releaseDate DESC
            LIMIT 5";

    return $this->getMultipleResults(
        DAO::select($sql, [], true), 
        $this->className
    );
   }



   public function findMoviesByUser($id){

    $sql = "SELECT *
            FROM ".$this->tableName." m
            WHERE m.user_id = :user_id";
            
            
            return $this->getMultipleResults(    
                DAO::select($sql, ['user_id' => $id], true), 
                $this->className
            );    
        }    
        
        
        
        
        
        
     }