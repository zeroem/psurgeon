<?php

namespace Zeroem\Psurgeon\Indexer\Entity;

use Zeroem\Psurgeon\Indexer\IdGenerator;

class FunctionIndex
{
  public $id;
  public $file_id;
  public $function_name;
  public $line_number;
  public $namespace_id;

  public function __construct($file_id, $function_name, $namespace_id, $line_number=0) {
    $this->file_id = $file_id;
    $this->function_name = $function_name;
    $this->line_number = $line_number;
    $this->namespace_id = $namespace_id;

    $this->id = IdGenerator::generate($this);
  }
}
