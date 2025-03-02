<?php

namespace Model\Managers;

use App\Manager;
use App\DAO;

class EventManager extends Manager {


    protected $className = "Model\Entities\Event";
    protected $tableName = "event";






    public function __construct() {
        parent::connect();
    }



    public function findFiveLastEvents(){


        $sql = "SELECT *
                FROM " . $this->tableName . " e
                ORDER BY e.eventDateTime DESC
                LIMIT 5";
    
        return $this->getMultipleResults(
            DAO::select($sql, [], true), 
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



    public function updatePlaces($event_id, $newPlaceAvailable) {
        $sql = "UPDATE events SET place_available = :newPlaceAvailable WHERE id = :event_id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            "newPlaceAvailable" => $newPlaceAvailable,
            "event_id" => $event_id
        ]);
    }
    


    


    


   
    
    

    
}
