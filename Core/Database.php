<?php

namespace Core;

use PDO;

class Database{

  private $statement;
  public $connection;
  
  public function __construct($config) {
    $dsn = 'Mysql:' . http_build_query($config, "", ";");

    $this->connection = new PDO($dsn, /* username */ null, /* password */ null, [
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
  }

  public function query($query, $params = []){
    $this->statement = $this->connection->prepare($query);
    $this->statement->execute($params);
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
  
}


?>  