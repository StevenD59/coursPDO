<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Test Tableau</title>
</head>
<body>

<?php
require_once('config/define.php');
require_once('db.php');
require_once('config/connect.php');
require_once('secure.php');

if (isset($GetSecure['delete'])) {//Le delete & modif toujours mettre avant de select
  $id=$GetSecure['id_user'];
  if ($dbh->delete('user', [ 'id_user' => $id ])) {//Je supprime de la table user l'id selectionner en cliquant sur le bouton
      header('location:index.php');
  }
}



$sql = "SELECT id_user, nom, prenom FROM user";
$stmt = $dbhOld->query($sql);
$result = $stmt -> fetchAll();
$count = $stmt->rowcount();
?>
<?= "il y a $count utilisateurs" ?> 
<table class="table container">
  <thead>
    <tr>
      <!-- <th scope="col">id</th> -->
      <th scope="col">Nom</th>
      <th scope="col">Prenom</th>
    </tr>
  </thead>
  <tbody>
  <?php
  foreach($result as $element)
  {
      echo "<tr>
      <td><a href='listes.php?id_user=".$element['id_user']."'>".$element['nom']."</a></td>
      <td>".$element['prenom']."</td>
      <td><a href='edit_user.php?id_user=".$element['id_user']."'>Modifier<a></td>
      <td><button name='delete'><a href='index.php?id_user=".$element['id_user']."&delete'>Supprimer<a><button></td>
    </tr>";
  }






  
?>


  </tbody>
</table>

</body>
</html>