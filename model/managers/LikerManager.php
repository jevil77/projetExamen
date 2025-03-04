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


    public function hasliked($user_id, $movie_id) {

        $sql= "SELECT * FROM liker WHERE user_id = :user_id AND movie_id = :movie_id";

        return $this->getOneOrNullResult(
            DAO::select($sql, ['user_id' => $user_id,
                               'movie_id' => $movie_id
        
        ], true), 
            $this->className
        );

}




}
