<?php
namespace App;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

 

define('DS', DIRECTORY_SEPARATOR); // Définition du séparateur de dossier pour la compatibilité multi-OS
define('BASE_DIR', dirname(__FILE__).DS); // Définition du répertoire de base
define('VIEW_DIR', BASE_DIR."view/");   // Chemin où se trouvent les vues
define('PUBLIC_DIR', "public/");     // Chemin où se trouvent les fichiers publics (CSS, JS, IMG)

define('DEFAULT_CTRL', 'Home'); // Nom du contrôleur par défaut
define('ADMIN_MAIL', "admin@gmail.com"); // Email de l'administrateur

require("app/Autoloader.php");

Autoloader::register();

// Démarre une session ou récupère la session actuelle
session_start();
use App\Session as Session;

//--------- REQUÊTE HTTP INTERCEPTÉE -----------
$ctrlname = DEFAULT_CTRL; // Contrôleur par défaut

if (isset($_GET['ctrl'])) {
    $ctrlname = $_GET['ctrl'];
}

// Construction du namespace du contrôleur
$ctrlNS = "controller\\" . ucfirst($ctrlname) . "Controller";

// Vérifie si le contrôleur existe
if (!class_exists($ctrlNS)) {
    $ctrlNS = "controller\\" . DEFAULT_CTRL . "Controller";
}

$ctrl = new $ctrlNS();

$action = "index"; // Action par défaut
if (isset($_GET['action']) && method_exists($ctrl, $_GET['action'])) {
    $action = $_GET['action'];
}

$id = $_GET['id'] ?? null;

// === 🚀 GESTION AJAX POUR LES LIKES ===
if ($action === "toggleLikeMovie") {
    $ctrl->$action($id);
    exit; // Stoppe l'exécution après avoir envoyé la réponse JSON
}

// Exécution classique du contrôleur
$result = $ctrl->$action($id);

/*-------- CHARGEMENT PAGE --------*/
if ($action == "ajax") { // Si l'action était AJAX
    // On affiche directement la réponse HTTP renvoyée par le contrôleur
    echo $result;
} else {
    ob_start(); // Démarre un buffer (tampon de sortie)
    $meta_description = $result['meta_description'];
    // La vue s'insère dans le buffer qui devra être vidé au milieu du layout
    include($result['view']);
    // Stocke la vue générée dans une variable
    $page = ob_get_contents();
    // Efface le tampon
    ob_end_clean();
    // Affiche le template principal (layout)
    include VIEW_DIR."layout.php";
}
 