<?php

namespace Zeroem\Psurgeon\Indexer\Entity;

class MethodIndex
{
  public $id;
  public $class_id;
  public $method_name;
  public $line_number;

  public function __construct($class_id, $method_name, $line_number) {
    $this->class_id = $class_id;
    $this->method_name = $method_name;
    $this->line_number = $line_number;

    $this->id = md5($this->class_id.$this->method_name);
  }
}
