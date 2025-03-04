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


    public function hasLiked($user_id, $movie_id): bool {
        $sql = "SELECT COUNT(*) AS total FROM liker WHERE user_id = :user_id AND movie_id = :movie_id";
    
        $result = DAO::select($sql, ['user_id' => $user_id, 'movie_id' => $movie_id], false);
    
        return $result && $result['total'] > 0;
    }
    
     


}
