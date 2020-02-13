<?php
require_once('config/define.php');
require_once('config/connect.php');
require_once('secure.php');

$sql = 'SELECT *  FROM shopping_article 
INNER JOIN article ON shopping_article.id_article = article.id_article
WHERE id_liste='.$_GET['id_liste'];
$stmt = $dbh->query($sql);
$result = $stmt -> fetchAll();

echo '<ul>';
foreach ($result as $element){
    echo "<li><a href='liste_article.php?id_liste=".$element['id_liste']."'>".$element['nom']." Quantité:".$element['quantite_article']."</a></li>";
}
echo '</ul>';

?>