<?php
$dsn = 'mysql:dbname=shopping_list;host=127.0.0.1';
$user = 'root';
$password = '';

try {
    
    $dbhOld = new PDO($dsn, $user, $password);
    $dbhOld->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo 'Connexion échouée : ' . $e->getMessage();
}

$dbh = Db::getInstance();
?>