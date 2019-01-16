<?php

// Empeche d'utiliser <h1> dans un pseudo par ex
function str_secur($string) {
    return trim(htmlspecialchars($string));
}

// Debug lisible des variables
function debug($var) {
    echo '<pre>';
    var_dump($var);
    echo '</pre>';
}

function getUserLanguage() {
    if(isset($_GET['lang']) AND !empty($_GET['lang'])) {
        $lang = str_secur(strtolower($_GET['lang']));
        $availableLanguages = ['en', 'fr'];
        return (in_array($lang, $availableLanguages)) ? $lang : DEFAULT_LANGUAGE;
        }else {
            return (isset($_SESSION['lang']) AND !empty($_SESSION['lang'])) ? $_SESSION['lang'] : DEFAULT_LANGUAGE;
        }
    }

function getPageLanguage($lang, $page) {
    $dataPage = [];
    foreach($page as $p) {
        $jsonString = file_get_contents('_lang/'.$lang.'/'.$p.'.json');
        $json = json_decode($jsonString);
        $dataPage[$p] = $json;
    }
    return (object) $dataPage;

}