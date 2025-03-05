<?php
namespace App;

/**
 * Classe d'accès aux données de la BDD, abstraite
 * 
 * @property static $bdd l'instance de PDO que la classe stockera lorsque connect() sera appelé
 *
 * @method static connect() connexion à la BDD
 * @method static insert() requètes d'insertion dans la BDD
 * @method static select() requètes de sélection
 */
abstract class DAO{

    private static $host   = 'mysql:host=127.0.0.1;port=3306';
    private static $dbname = 'projet_examen';
    private static $dbuser = 'root';
    private static $dbpass = '';

    private static $bdd;

    /**
     * cette méthode permet de créer l'unique instance de PDO de l'application
     */
    public static function connect(){
        //self::$bdd : Propriété statique de la classe qui stocke l'objet PDO une fois connecté. new \PDO : instance de la classe PDO qui permet de se connecter à la bdd
        self::$bdd = new \PDO(
            // Adresse de l'hôte et nom de la bdd
            self::$host.';dbname='.self::$dbname,
            // User de la bdd
            self::$dbuser,
            // mdp bdd
            self::$dbpass,
            array(
                // paramètres supplémentaires: 
                // encodage pour caractères spéciaux
                \PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'",
                // mode gestion des erreurs
                \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                // mode par défaut pour récupérer les résultats des requêtes
                \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC
            )   
        );
    }
    // Méthode permettant d'insérer des données en bdd
    public static function insert($sql, $params = []) {
        try {
            // Prépare la requête à exécuter. $bdd : instance de connexion (méthode connect). $stmt : statement, objet PDOstatement qui représente la requête
            $stmt = self::$bdd->prepare($sql);
            // Exécute la requête préparée, elle prend un tableau de params qui remplace les valeurs des placeholders
            $stmt->execute($params);
    
            // Retourne l'ID du dernier enregistrement inséré
            return self::$bdd->lastInsertId();
        } catch (\PDOException $e) {
            error_log("❌ ERREUR SQL dans insert() : " . $e->getMessage());
            // Si une erreur se produit, une réponse JSON est envoyé au client
            die(json_encode(["error" => "Erreur SQL lors de l'insertion."])); // JSON pour AJAX
        }
    }
     
    // Met à jour des données en bdd
    public static function update($sql, $params){
        try{
            // Prépare la requête SQL
            $stmt = self::$bdd->prepare($sql);
            
            //on renvoie l'état du statement après exécution (true ou false)
            return $stmt->execute($params);
            
        }
        // Gestion des erreurs
        catch(\Exception $e){
            // Message d'erreur
            echo $e->getMessage();
        }
    }
    
    // Supprimer des données en bdd
    public static function delete($sql, $params){
        try{
            // Prépare la requête
            $stmt = self::$bdd->prepare($sql);
            
            //on renvoie l'état du statement après exécution (true ou false)
            return $stmt->execute($params);
            
        }
        // gestion des erreurs
        catch(\Exception $e){
            // Affiche la requête qui a échoué
            echo $sql;
            // Affiche le message d'erreur
            echo $e->getMessage();
            die();
        }
    }

    /**
     * Cette méthode permet les requêtes de type SELECT
     * 
     * @param string $sql la chaine de caractère contenant la requête elle-même
     * @param mixed $params=null les paramètres de la requête
     * @param bool $multiple=true vrai si le résultat est composé de plusieurs enregistrements (défaut), false si un seul résultat doit être récupéré
     * 
     * @return array|null les enregistrements en FETCH_ASSOC ou null si aucun résultat
     */

     // Permet une requête de sélection en bdd
    public static function select($sql, $params = null, bool $multiple = true):?array
    {
        try{
            // Prépare la requête SQL
            $stmt = self::$bdd->prepare($sql);
            $stmt->execute($params);
            // Récupère les résultats sous forme de . Si $multiple est true, données récupéré sous forme de tableau(plusieus lignes) sinon false(une seule ligne)
            $results = ($multiple) ? $stmt->fetchAll() : $stmt->fetch();
            // Ferme le curseur de la requête et libère les ressources. Si les résultats sont false retourne null sinon tableau avec le paramètre $multiple
            $stmt->closeCursor();
            return ($results == false) ? null : $results;
        }
        // Gestion des erreurs
        catch(\Exception $e){
            echo $e->getMessage();
        }
    }
}


// Donne toutes les méthodes qui interagissent avec la base de données