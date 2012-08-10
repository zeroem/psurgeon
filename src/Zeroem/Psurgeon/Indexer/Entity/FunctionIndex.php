<?php

namespace Zeroem\Psurgeon\Indexer\Entity;

class FunctionIndex
{
  public $id;
  public $file_id;
  public $function_name;
  public $line_number;

  public function __construct($file_id, $function_name, $line_number=0) {
    $this->file_id = $file_id;
    $this->function_name = $function_name;
    $this->line_number = $line_number;

    $this->id = md5($this->function_name);
  }
}
