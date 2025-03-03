<?php



namespace Model\Managers;

use App\Manager;
use App\DAO;

class LikerManager extends Manager{

    // on indique la classe POO et la table correspondante en BDD pour le manager concerné
    protected $className = "Model\Entities\Liker";
    protected $tableName = "liker";

    public function __construct(){
        parent::connect();
    }




}
