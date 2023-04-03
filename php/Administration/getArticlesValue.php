<?php
$dbHost = "CONTENT_REMOVED_FOR_SECURITY_PURPOSES";
$dbUser = "CONTENT_REMOVED_FOR_SECURITY_PURPOSES";
$dbPass = "CONTENT_REMOVED_FOR_SECURITY_PURPOSES";
$dbName = "CONTENT_REMOVED_FOR_SECURITY_PURPOSES";

function getArticlesValue($value, $id) {
    global $dbHost;
    global $dbUser;
    global $dbPass;
    global $dbName;

    if (!isset($dbHost) || !isset($dbName) || !isset($dbPass) || !isset($dbUser)) {
        trigger_error('Les variables globales nécessaires à la connexion à la base de données ne sont pas définies.', E_USER_ERROR);
    }
    $db = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);
    mysqli_set_charset($db, 'utf8');
    if (!$db) {
        trigger_error('Impossible de se connecter à la base de données.', E_USER_ERROR);
    }
    $result = mysqli_query($db, "SELECT $value FROM articles WHERE Id='$id'");
    if (!$result) {
        trigger_error('Impossible d\'exécuter la requête .', E_USER_ERROR);
    }
    $row = mysqli_fetch_assoc($result);
    if (!$row) {
        trigger_error('Aucun résultat trouvé.', E_USER_ERROR);
    }
    $res = $row[$value];
    mysqli_close($db);
    return $res;
}

function getArticleMainContent($lang, $id) {
    global $dbHost;
    global $dbUser;
    global $dbPass;
    global $dbName;

    $queryValue = 'Main'.strtoupper($lang);

    if (!isset($dbHost) || !isset($dbName) || !isset($dbPass) || !isset($dbUser)) {
        trigger_error('Les variables globales nécessaires à la connexion à la base de données ne sont pas définies.', E_USER_ERROR);
    }
    $db = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);
    mysqli_set_charset($db, 'utf8');
    if (!$db) {
        trigger_error('Impossible de se connecter à la base de données.', E_USER_ERROR);
    }
    $result = mysqli_query($db, "SELECT $queryValue FROM articles WHERE Id='$id'");
    if (!$result) {
        trigger_error('Impossible d\'exécuter la requête .', E_USER_ERROR);
    }
    $row = mysqli_fetch_assoc($result);
    if (!$row) {
        trigger_error('Aucun résultat trouvé.', E_USER_ERROR);
    }
    $res = $row[$queryValue];
    mysqli_close($db);
    return $res;
}
?>