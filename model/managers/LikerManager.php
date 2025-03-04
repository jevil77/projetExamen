<?php

namespace Model\Managers;

use App\Manager;
use App\DAO;

class LikerManager extends Manager {

    protected $className = "Model\Entities\Liker";
    protected $tableName = "liker";

    public function __construct(){
        parent::connect();
    }

    // Vérifie si un utilisateur a déjà liké un film
    public function hasLiked($user_id, $movie_id): bool {
        $sql = "SELECT COUNT(*) AS total FROM liker WHERE user_id = :user_id AND movie_id = :movie_id";

        $result = DAO::select($sql, ['user_id' => $user_id, 'movie_id' => $movie_id], false);

        return $result && $result['total'] > 0;
    }

    // Ajoute un like à la base de données
    public function addLike($user_id, $movie_id) {
        try {
            $sql = "INSERT INTO liker (user_id, movie_id) VALUES (:user_id, :movie_id)";

            error_log("addLike() - user_id: " . var_export($user_id, true) . " | movie_id: " . var_export($movie_id, true));

            return DAO::insert($sql, [
                "user_id" => (int) $user_id,
                "movie_id" => (int) $movie_id
            ]);

        } catch (\PDOException $e) {
            error_log("Erreur SQL dans addLike(): " . $e->getMessage());
            return false;
        }
    }

    // Supprime un like de la base de données
    public function removeLike($user_id, $movie_id) {
        $sql = "DELETE FROM liker WHERE user_id = :user_id AND movie_id = :movie_id";

        return DAO::delete($sql, [
            "user_id" => $user_id,
            "movie_id" => $movie_id
        ]);
    }

    // Compte le nombre de likes pour un film donné
    public function countLikes($movie_id): int {
        $sql = "SELECT COUNT(*) AS likeCount FROM liker WHERE movie_id = :movie_id";

        $result = DAO::select($sql, ['movie_id' => $movie_id], false);

        return $result ? (int) $result['likeCount'] : 0;
    }
}
 