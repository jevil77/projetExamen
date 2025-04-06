<?php

// Organise les classes, Model\manager appartient au dossier Manager qui fait partie du Model, s'occupent de la gestion des entités
namespace Model\Managers;

use App\Manager;
use App\DAO;

class UserManager extends Manager{

    // on indique la classe POO et la table correspondante en BDD pour le manager concerné
    // cette classe gère l'entité "user" située dans Model\Entities
    protected $className = "Model\Entities\User";

    // Intéragit avec la table "user" présente en base de données
    protected $tableName = "user";

    // Le constructeur (_construct) est une méthode qui s'exécute automatiquement lorsqu'un objet est créé
    public function __construct(){
        parent::connect();
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

    // Cette méthode permet de trouver un utilisateur avec son adresse email an base de données
    public function findOneByEmail($email)
    {
        $sql = "SELECT * 
                FROM " . $this->tableName . " u 

                WHERE u.email = :email";
                
                // :email : paramètre sécurisé permettant d'éviter les injections SQL

        return $this->getOneOrNullResult(
            DAO::select($sql, ['email' => $email], false),
            $this->className
        );
    }


    public function setBanStatus($userId, $status) {
       
        $sql = "UPDATE " . $this->tableName . " u
        SET ban = :ban WHERE id_user = :id";
    
       
        return DAO::update($sql, [
            'ban' => $status,
            'id' => $userId
        ]);
    }
    
    





    
}






