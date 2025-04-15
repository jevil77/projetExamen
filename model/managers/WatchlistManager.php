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

        // Requête SQL qui vérifie si un film est déjà présent 
        // dans la watchlist d'un utilisateur

        // Compte le nombre de lignes de la table watchlist avec l'alias total pour le résultat
        $sql = "SELECT COUNT(*) AS total 
        FROM watchlist 
        WHERE user_id = :user_id AND movie_id = :movie_id";
        // Filtre les lignes qui correspondent à un utilisateur et un film spécifiques
    
        // $result contient le résultat de la requête. La méthode select renvoie false si aucune correspondance n'est trouvée.
        $result = DAO::select($sql, ['user_id' => $user_id, 'movie_id' => $movie_id], false);
    
        // Vérifie si le total est supérieur à 0, si oui, le film est dans la watchlist
        return $result && $result['total'] > 0;
    }

    // Méthode du modèle métier qui permet de récupérer la watchlist d'un utilisateur
    // à partir de son identifiant unique
    public function getUserWatchlist($user_id) {
    // Méthode qui encapsule une requête SQL avec une jointure interne entre les tables movie et watchlist
    // Lien établit via FK movie_id ce qui permet d'associer chaque film à un user ayant ajouté ce film
        $sql="SELECT * 
        FROM movie 
        JOIN watchlist ON movie.id_movie = watchlist.movie_id 
        WHERE watchlist.user_id = :user_id";
    // filtre de manière ciblée en fonction de l'id

        $result = DAO::select($sql, ['user_id' => $user_id]);
    // méthode statique avec PDO / résultat sous forme de tableau associatif
        return $result;
    
    }

   
    


    }
