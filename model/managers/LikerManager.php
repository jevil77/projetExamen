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

    // Vérifie si un utilisateur a déjà liké un film en retournant un booléen
    public function hasLiked($user_id, $movie_id): bool {
        // Requête SQL qui compte le nombre d'enregistrements dans la table liker en bdd
        // SELECT COUNT compte le nombre de lignes en bdd (renomme le compte 'total') dans la table liker où un utilisateur(user_id) a liké un film: (movie_id)
        // :user_id et :movie_id évite les injections SQL et augmente la sécurité
        $sql = "SELECT COUNT(*) AS total FROM liker WHERE user_id = :user_id AND movie_id = :movie_id";
        // $sql est la requête a exécuter. ['user_id' => $user_id, 'movie_id' => $movie_id] tableau associatif des valeurs pour les param :user_id et :movie_id. False 
        $result = DAO::select($sql, ['user_id' => $user_id, 'movie_id' => $movie_id], false);
        // Vérifie si la valeur totale est supérieur à 0, si c'est le cas le film a été liké
        return $result && $result['total'] > 0;
    }

    // Ajoute un like à la base de données
    public function addLike($user_id, $movie_id) {
        try {
            // Requête SQL : nouvelle entrée dans la table liker en bdd avec l'id du user qui like et l'id du film liké
            $sql = "INSERT INTO liker (user_id, movie_id) VALUES (:user_id, :movie_id)";
            // Enregistre des messages d'erreur dans le fichier de logs du serveur. . var_expor est une représentation textuelle de la variable
            error_log("addLike() - user_id: " . var_export($user_id, true) . " | movie_id: " . var_export($movie_id, true));
            // insertion dans la base de données avec la méthode DAO::insert
            return DAO::insert($sql, [
                "user_id" => (int) $user_id,
                "movie_id" => (int) $movie_id
            ]);
        // Gère les erreurs SQL avec la bdd. PDOException : classe d'exception de PDO (PHP Data Objects)
        } catch (\PDOException $e) {
            error_log("Erreur SQL dans addLike(): " . $e->getMessage());
            // Permet de savoir que l'insertion du like a échoué sans afficher d'erreur à l'utilisateur
            return false;
        }
    }

    // Supprime un like de la base de données d'un utilisateur pour un film donné
    public function removeLike($user_id, $movie_id) {
        $sql = "DELETE FROM liker WHERE user_id = :user_id AND movie_id = :movie_id";
        // Prend en charge l'exécuton de la requête SQL
        return DAO::delete($sql, [
            "user_id" => $user_id,
            "movie_id" => $movie_id
        ]);
    }

    // Compte le nombre de likes pour un film donné en base de sonnées. COUNT(*) compte le nombre d'enregistrement
    public function countLikes($movie_id): int {
        $sql = "SELECT COUNT(*) AS likeCount FROM liker WHERE movie_id = :movie_id";
    // DAO::select : exécute la requête SQL pour récupérer le résultat en bdd. ['movie_id' => $movie_id] : lie le paramètre :movie_id à la valeur $movie_id passé en argument.
    // False : on attend une ligne avec le total des likes
        $result = DAO::select($sql, ['movie_id' => $movie_id], false);
    // Retourne la valeur de likeCount en la convertissant en entier (INT)
    return $result ? (int) $result['likeCount'] : 0;
    }
}
 