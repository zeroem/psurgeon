<?php

namespace Zeroem\Psurgeon\Indexer;

class Indexer
{
  private $pdo;
  private $statements = array();

  public function __construct($pdo) {
    $this->pdo = $pdo;
  }

  public function register($obj) {
    $statement = $this->getPreparedStatement($obj);

    $result = $statement->execute((array)$obj);
  }

  private function getPreparedStatement($obj) {
    $class = get_class($obj);

    if(!isset($this->statements[$class])) {
      $keys = array_keys(get_class_vars($class));

      $columns = array();
      $values = array();
      foreach( $keys as $key) {
        $columns[] = $key;
        $values[] = ':' . $key;
      }

      $column_part = '(' . implode(',',$columns) . ')';
      $value_part = '(' . implode(',',$values) . ')';

      $sql = 'insert into ' . $this->getTableName($obj) . ' ' . $column_part . ' values ' . $value_part;

      $this->statements[$class] = $this-pdo->prepare($sql);
    }

    return $this->statements[$class];
  }

  private function getTableName($obj) {
    $class = get_class($obj);

    $classStart = strrpos($class, "\\");

    if(false !== $classStart) {
      $table = substr($class,$classStart+1);
    } else {
      $table = $class;
    }

    return $table;
  }
}
