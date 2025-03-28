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
                    WHERE e.eventDateTime >= NOW()
                    ORDER BY e.eventDateTime DESC
                    LIMIT 5";
    
        return $this->getMultipleResults(
            DAO::select($sql, [], true), 
            $this->className
        );
       }

    public function findAllEvents()
       {
           $sql = "SELECT * 
                   FROM " . $this->tableName . " e
                   WHERE e.eventDateTime >= NOW() 
                   ORDER BY e.eventDateTime ASC"; 


               return $this->getMultipleResults(
               DAO::select($sql, [], true),
               $this->className
           );
       }
       
   
                


    





       // Cette fonction met à jour le nombre de places disponibles d'un évènement identifié par in id dans la base de données

       public function updatePlaces($event_id, $newPlaceAvailable) {
        $sql = "UPDATE event SET placeAvailable = :newPlaceAvailable WHERE id_event = :event_id";

        // Modifie placeAvailable avec une nouvelle valeur (:newPlaceAvailable).  Met à jour l'événement correspondant à l'id
       
        try {
            $result = DAO::update($sql, [
                'newPlaceAvailable' => $newPlaceAvailable,
                'event_id' => $event_id
            ]);
    
            if (!$result) {
                throw new \Exception("La mise à jour du nombre de places a échoué.");
            }
    
            return $result;
        } catch (\Exception $e) {
            error_log("Erreur lors de la mise à jour des places : " . $e->getMessage());
            return false;
        }
    }
     
    public function findEventsByUser($userId) {
        // Requête SQL pour récupérer les événements réservés par l'utilisateur 
        $sql = "
                SELECT *
                FROM " . $this->tableName . " e
                JOIN participate p ON e.id_event = p.event_id
                WHERE p.user_id = :user_id
                AND e.eventDateTime >= NOW() 
                ORDER BY e.eventDateTime ASC;
             ";
    
        // Utilisation de la méthode 'select' pour exécuter la requête
        return $this->getMultipleResults(
            DAO::select($sql, ['user_id' => $userId]),  
            $this->className
        );
    }
    
    
   
   
   
   
   
   
   
 }
    


    


    


   
    
    

    

