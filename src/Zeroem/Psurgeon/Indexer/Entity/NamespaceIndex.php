<?php

namespace Zeroem\Psurgeon\Indexer\Entity;

use Zeroem\Psurgeon\Indexer\IdGenerator;

class NamespaceIndex
{
  public $id;
  public $namespace;
  public $file_id;

  public function __construct($namespace, $file_id) {
    $this->namespace = $namespace;
    $this->file_id = $file_id;

    $this->id = IdGenerator::generate($this);
  }
}
