<?php



namespace Model\Managers;

use App\Manager;
use App\DAO;

class ParticipateManager extends Manager{

    // on indique la classe POO et la table correspondante en BDD pour le manager concerné
    protected $className = "Model\Entities\Participate";
    protected $tableName = "participate";

    public function __construct(){
        parent::connect();
    }




}