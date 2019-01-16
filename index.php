<?php

// Inclusion des fichiers principaux
include_once '_config/db.php';
include_once '_functions/functions.php';
include_once '_classes/Autoloader.php';
Autoloader::register();

// Définition de la page courante
if (isset($_GET['page']) and !empty($_GET['page'])) {
    $page = trim(strtolower($_GET['page']));
} else {
    $page = 'home';
}

// Tableau contenant toutes les pages
$allPages = scandir('controllers/');


// $_SESSION['lang'] = getUserLanguage();

// Vérification de l'existence de la page
if (in_array($page . '_controller.php', $allPages)) {

   // $lang = getPageLanguage($_SESSION['lang'], ['header'], $page, ['footer']);
   // debug($lang);

    // Inclusion de la page
    include_once 'models/' . $page . '_model.php';
    include_once 'controllers/' . $page . '_controller.php';
    include_once 'views/' . $page . '_view.php';

} else {

    echo "Erreur 404 - La page cherchée n'existe pas";

}
