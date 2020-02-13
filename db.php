<?php

class Db
{

    private static $_instance;
    private $_pdo;
    private $_stmt;
    private function __construct() //Construit l'objet 
    {
        try {
            $this->_pdo = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
            $this->_pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo 'Connexion échouée : ' . $e->getMessage();
        }
    }




    public function insert($table, $tab)
    {
        $fields = '';
        $values = '';
        $queryValue = [];
        foreach ($tab as $key => $value) {
            $fields .= "`$key`,";
            $values .= ":$key,";
            $queryValue[':' . $key] = $value;
        }
        $fields = rtrim($fields, ',');
        $values = rtrim($values, ',');

        $sql = "INSERT INTO $table ($fields)  VALUES ($values)";
        $this->query($sql, $queryValue);
    }





    public function update($table, $tab, $where)
    {


        $stringWhere = ''; //Je déclare la conditions vide car je vais la remplir moi meme.
        $stringSet = ''; //Je déclare le set vide car je vais la remplir moi meme.

        $values = '';
        $queryValue = [];
        foreach ($tab as $key => $value) {
            $stringSet .= "`$key` = :" . $key . ', ';

            $queryValue[':' . $key] = $value;
        }

        foreach ($where as $key => $value) {
            $stringWhere .= "`$key` = :" . $key . ' AND';

            $queryValue[':' . $key] = $value;
        }

        $stringSet = rtrim($stringSet, ', ');
        $stringWhere = rtrim($stringWhere, ' AND');

        $sql = "UPDATE $table SET $stringSet  WHERE $stringWhere ";


        $this->query($sql, $queryValue);
    }


    public function delete($table, $tab)
    {
        $where = '';

        $queryValue = [];
        foreach ($tab as $key => $value) {

            $where .= " `$key` = :$key  and";

            $queryValue[':' . $key] = $value;
        }

        $where = rtrim($where, 'and');

        $sql = "DELETE FROM $table WHERE $where";

        return $this->query($sql, $queryValue);
    }




    public function query($request, $tab)
    {

        $this->_stmt = $this->_pdo->prepare($request); //$this->_stmt = Je sélectionne l'attribu _stmt de la class qui possede l'objet pdo (qui lui retourne un pdo:statement d'ou l'attribut stmt) et qui prepare la requête.
        $this->_stmt->execute($tab); //il execute la requête préparé
        return $this->_stmt->fetchAll(); //il retourne la requête en résultat

    }

    public static function getInstance()
    {

        if (is_null(self::$_instance)) {
            self::$_instance = new Db();
        }

        return self::$_instance;
    }
}
