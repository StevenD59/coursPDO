<?php
require_once('config/define.php');
require_once('config/connect.php');
require_once('secure.php');

$id_user = $_GET['id_user'];
$stmt = $dbh->prepare('SELECT * FROM liste WHERE id_user=?');
$stmt->execute(array($id_user));
$result = $stmt -> fetchAll();

echo '<ul>';
foreach ($result as $element){
    echo "<li><a href='liste_article.php?id_liste=".$element['id_liste']."'>".$element['nom']."</a></li>";
}
echo '</ul>';

?>