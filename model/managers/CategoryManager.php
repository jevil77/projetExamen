<?php
namespace Model\Managers;


// DAO(Data Access Object) facilite l'accès aux données de la base de données.
use App\Manager;
use App\DAO;

// Définit la classe CategoryManager qui hérite de la classe Manager
// extends manager signifie que CategoryManager va utiliser des méthodes définies dans la classe Manager. Cette classe va gérer les catégories (catégories de films)
class CategoryManager extends Manager{

    // on indique la classe POO et la table correspondante en BDD pour le manager concerné
    // cette classe gère l'entité "category" située dans Model\Entities
    protected $className = "Model\Entities\Category";

    // Intéragit avec la table "category" présente en base de données
    protected $tableName = "category";
    
    // Le constructeur (_construct) est une méthode qui s'exécute automatiquement lorsqu'un objet est créé
    public function __construct(){
        parent::connect();
    }
}


// Managers comme CategoryManager gère l'accès aux données