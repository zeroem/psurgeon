<?php

namespace Zeroem\Psurgeon\Indexer\Entity;

class NamespaceIndex
{
  public $id;
  public $namespace;
  public $file_id;

  public function __construct($namespace, $file_id) {
    $this->id = md5($namespace);
    $this->namespace = $namespace;
    $this->file_id = $file_id;
  }
}
