<?php

namespace Zeroem\Psurgeon\Indexer\Entity;

use Zeroem\Psurgeon\Indexer\IdGenerator;

class FileIndex
{
  public $id;
  public $file;
  public $content_signature;
  public $index_time;

  public function __construct($file,$content_signature) {
    $this->file = $file;
    $this->content_signature = $content_signature;
    $this->index_time = time();
    $this->id = IdGenerator::generate($this);
  }
}
