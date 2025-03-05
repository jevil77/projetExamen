<?php
namespace App;

abstract class Manager{

    // La classe Manager fournit des méthodes communes pour tous les managers(CategoryManager, EventManager, MovieManager...)
    
    // Connection avec la base de données
    protected function connect(){
        DAO::connect();
    }

    /**
     * get all the records of a table, sorted by optionnal field and order
     * 
     * @param array $order an array with field and order option
     * @return Collection a collection of objects hydrated by DAO, which are results of the request sent
     */

     // Retourne une collection d'objet de la classe spécifiée dans le Manager (id passé en paramètre)
     // Récupère toutes les entrées d'une table
    public function findAll($order = null){

        $orderQuery = ($order) ?                 
            "ORDER BY ".$order[0]. " ".$order[1] :
            "";

        $sql = "SELECT *
                FROM ".$this->tableName." a
                ".$orderQuery;
        // Exécute la requête DAO et retourne une collection d'objets hydatés
        return $this->getMultipleResults(
            DAO::select($sql), 
            $this->className
        );
    }
     

    // Retourne un objet de la classe spécifié dans le Manager
    // Récupère un enregistrement par son id
    public function findOneById($id){

        $sql = "SELECT *
                FROM ".$this->tableName." a
                WHERE a.id_".$this->tableName." = :id
                ";
        // Retourne un objet ou false si il n'y a pas de résultat
        return $this->getOneOrNullResult(
            DAO::select($sql, ['id' => $id], false), 
            $this->className
        );
    }
    
    // Ajoute un enregistrement en base de données
    //$data = ['username' => 'Squalli', 'password' => 'dfsyfshfbzeifbqefbq', 'email' => 'sql@gmail.com'];

    public function add($data){
        //$keys = ['username' , 'password', 'email'] Récupère le nom des colonnes
        $keys = array_keys($data);
        //$values = ['Squalli', 'dfsyfshfbzeifbqefbq', 'sql@gmail.com'] Récupère les valeurs associées
        $values = array_values($data);
        // Implode transforme en "username,password,email"
        $sql = "INSERT INTO ".$this->tableName."
                (".implode(',', $keys).") 
                VALUES
                ('".implode("','",$values)."')";
                //"'Squalli', 'dfsyfshfbzeifbqefbq', 'sql@gmail.com'"
        /*
            INSERT INTO user (username,password,email) VALUES ('Squalli', 'dfsyfshfbzeifbqefbq', 'sql@gmail.com') 
        */
        // Exécution de la requête
        try{
            return DAO::insert($sql);
        }
        // gestion des erreurs
        catch(\PDOException $e){
            echo $e->getMessage(); 
            die();
        }
    }
    
    // Supprime un enregistrement en base de données en focntion de son id
    public function delete($id){
        $sql = "DELETE FROM ".$this->tableName."
                WHERE id_".$this->tableName." = :id
                ";
                // exécution de la requête
            return DAO::delete($sql, ['id' => $id]); 
    }
    // Génère un ensemble d'objets à partir d'un tableau de données
    private function generate($rows, $class){
        foreach($rows as $row){
            // Retourne un générateur au lieu de créer un tableau
            yield new $class($row);
        }
    }
    

    // Si la requête renvoie plusieurs enregistrements 
    // Cette méthode convertit plusieurs enregistrements d'une requête en objets
    protected function getMultipleResults($rows, $class){
        // $rows est le résultat d'une requête, si il n'est pas vide on appelle generate
        if(is_iterable($rows)){
            // Transforme chaque enregistrement en objet de la classe
            return $this->generate($rows, $class);
        }
        // Si $rows n'est pas itérable
        else return null;
    }

    // Si la requête renvoie un seul enregistrement de la base de données
    protected function getOneOrNullResult($row, $class){

        if($row != null){
            // Création d'un nouvel objet de la classe spécifié
            return new $class($row);
        }
        return false;
    }
    
    // Méthode pour extraire une seule valeur scalaire (pouvant être décrite par un seul nombre et l'unité correspondante)
    protected function getSingleScalarResult($row){
        // vérification si $row n'est pas null
        if($row != null){
            // Retourne un tableau avec les valeurs de $row
            $value = array_values($row);
            // Retourne la première valeur
            return $value[0];
        }
        // Si pas de résultat en bdd retourne false
        return false;
    }

}

// Tous les Managers héritent de la classe abstraite "App\Manager"