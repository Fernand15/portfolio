<?php


ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');         //Ces trois lignes permettent d'afficher les rapports d'erreurs
error_reporting(E_ALL);


class Database{

    private $dbh;
    public function connection(){
        $this->dbh = new PDO('mysql:host=localhost;dbname=florient_portfolio', 'florian', 'plop');
    }

    public function selectAll($table){
        $this->connection();
        $sql = "SELECT * FROM ".$table;
        $sth = $this->dbh->query($sql);
        //var_dump($sql);die;
        return $sth->fetchAll(PDO::FETCH_ASSOC);
    }}
?>