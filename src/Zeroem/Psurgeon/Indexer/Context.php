<?php

namespace Zeroem\Psurgeon\Indexer;

class Context
{
  public $file;
  public $namespace;
  public $class;
  public $function;

  public function __construct($file=null, $namespace=null, $class=null, $function=null) {
    $this->file = $file;
    $this->namespace = $namespace;
    $this->class = $class;
    $this->function = $function;
  }
}
