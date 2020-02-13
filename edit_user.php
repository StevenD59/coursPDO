<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php

require_once('config/define.php');
require_once('db.php');
require_once('config/connect.php');
require_once('secure.php');

// if(isset($PostSecure['register'])){

    // $nom=$PostSecure['nom'];
    // $prenom=$PostSecure['prenom'];
    // $id=$GetSecure['id_user'];

    $stmt="SELECT nom, prenom FROM user WHERE id_user = {$GetSecure['id_user']}";
    $sql= $dbhOld->query($stmt);
    $result= $sql->fetch(PDO::FETCH_ASSOC); //FETCH récupère des lignes en utilisant un curseur précédemment ouvert.


    if(isset($PostSecure['register'])){
        $tab['nom'] = $PostSecure['nom'];
        $tab['prenom'] = $PostSecure['prenom'];
        $id = $GetSecure['id_user'];
        $where = ['id_user' => $id];
        $dbh->update('user', $tab, $where);
        // $stmt=$dbh->prepare("UPDATE user SET `nom` = :nom, `prenom` = :prenom WHERE id_user = {$GetSecure['id_user']}");
        // $stmt->bindParam(':nom', $nom1, PDO::PARAM_STR);//1er param est la valeur attendu, 2e valeur = la valeur défini donc en l'occurence $nom.
        // $stmt->bindParam(':prenom', $prenom1, PDO::PARAM_STR);//1er param est la valeur attendu, 2e valeur = la valeur défini donc en l'occurence prenom.
        // if($stmt->execute()){
        header('Location: index.php');
        }

?>
<form method='POST'>
  <div class="form-group">
    <label for="exampleInputEmail1">Nom:</label>
    <input type="text" class="form-control" name="nom" aria-describedby="emailHelp" value="<?= $result['nom']??'' ?>" placeholder="Nom">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Prénom</label>
    <input type="text" class="form-control" name="prenom" value="<?= $result['prenom']??'' ?>" placeholder="Prénom">
  </div>
  <button type="submit" name="register" class="btn btn-primary">Modifier</button>
</form>
</body>
</html>