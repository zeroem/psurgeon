<?php

namespace Zeroem\Psurgeon\Indexer\Entity;

use Zeroem\Psurgeon\Indexer\IdGenerator;

class MethodIndex
{
  public $id;
  public $file_id;
  public $namespace_id;
  public $class_id;
  public $method_name;
  public $line_number;

  public function __construct($file_id,$class_id, $method_name, $namespace_id=null, $line_number=0) {
    $this->class_id = $class_id;
    $this->method_name = $method_name;
    $this->line_number = $line_number;
    $this->file_id = $file_id;
    $this->namespace_id = $namespace_id;

    $this->id = IdGenerator::generate($this);
  }
}

