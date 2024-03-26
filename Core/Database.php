<?php

namespace Core;

use PDO;

class Database{

  public $statement;
  public $connection;
  
  public function __construct() {
    $dsn = "{$_ENV['DB_DRIVER']}:host={$_ENV['DB_HOST']};port={$_ENV['DB_PORT']};dbname={$_ENV['DB_NAME']};charset={$_ENV['DB_CHARSET']}";

    $this->connection = new PDO($dsn, /* username */ $_ENV['DB_USERNAME'], /* password */ $_ENV['DB_PASSWORD'], [
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
  }

  public function query($query, $params = []){
    $this->statement = $this->connection->prepare($query);
    $this->statement->execute($params);

    return $this;
  }

  public function get(){
    return $this->statement->fetchAll();
  }


  public function find(){
    return $this->statement->fetch();
  }

  public function findOrFail(){

    $result = $this->find();

    if(! $result){
      abort();
    }

    return $result;
  }

  public function killConnection(){
    $this->connection = null;
  }

  public function lastInsertedId(){
    return $this->connection->lastInsertId();
  }
  
}


?>  