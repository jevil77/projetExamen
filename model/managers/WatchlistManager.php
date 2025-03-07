<?php



namespace Model\Managers;

use App\Manager;
use App\DAO;

class WatchlistManager extends Manager{

    // on indique la classe POO et la table correspondante en BDD pour le manager concerné
    protected $className = "Model\Entities\Watchlist";
    protected $tableName = "watchlist";

    public function __construct(){
        parent::connect();
    }


    public function isInWatchlist($user_id, $movie_id): bool {
        // Requête SQL qui vérifie si un film est dans la watchlist d'un utilisateur
        // :user_id et :movie_id évitent les injections SQL et augmentent la sécurité
        $sql = "SELECT COUNT(*) AS total FROM watchlist WHERE user_id = :user_id AND movie_id = :movie_id";
    
        // $result contient le résultat de la requête. La méthode select renvoie false si aucune correspondance n'est trouvée.
        $result = DAO::select($sql, ['user_id' => $user_id, 'movie_id' => $movie_id], false);
    
        // Vérifie si le total est supérieur à 0, si oui, le film est dans la watchlist
        return $result && $result['total'] > 0;
    }


    public function getUserWatchlist($user_id) {

        $sql="SELECT * FROM movie JOIN watchlist ON movie.id_movie = watchlist.movie_id WHERE watchlist.user_id = :user_id";

        $result = DAO::select($sql, ['user_id' => $user_id]);

        return $result;
    
    }

   
    


    }
