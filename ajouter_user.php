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


  if (isset($PostSecure['register'])) {

    $nom = $PostSecure['nom'];
    $prenom = $PostSecure['prenom'];
    // $stmt=$dbh->prepare("INSERT INTO user (nom, prenom) VALUES (:nom, :prenom)");
    $tab = ['nom' => $nom, 'prenom' => $prenom];
    $dbh->insert('user', $tab);
    // $stmt->bindParam(':nom', $nom, PDO::PARAM_STR);//1er param est la valeur attendu, 2e valeur = la valeur défini donc en l'occurence $nom.
    // $stmt->bindParam(':prenom', $prenom, PDO::PARAM_STR);//1er param est la valeur attendu, 2e valeur = la valeur défini donc en l'occurence prenom.
    // try{
    // $dbh->beginTransaction();
    // $stmt->execute();
    // $dbh->commit();
    // }catch(PDOException $e){
    //     $dbh->rollback();
    // }
    header('Location: index.php');
  }

  ?>
  <form method='POST'>
    <div class="form-group">
      <label for="exampleInputEmail1">Nom:</label>
      <input type="text" class="form-control" name="nom" aria-describedby="emailHelp" placeholder="Nom">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Prénom</label>
      <input type="text" class="form-control" name="prenom" placeholder="Prénom">
    </div>
    <button type="submit" name="register" class="btn btn-primary">S'enregistrer</button>
  </form>
</body>

</html>