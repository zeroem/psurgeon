<?php

namespace Zeroem\Psurgeon\Indexer\Entity;

class ClassIndex
{
  public $id;
  public $namespace_id;
  public $file_id;
  public $class_name;

  public function __construct($class_name,$file_id, $namespace_id) {
    $this->id = md5($namespace_id.$class_name);
    $this->class_name = $class_name;
    $this->file_id = $file_id;
    $this->namespace_id = $namespace_id;
  }
}
