<?php

namespace Zeroem\Psurgeon\Indexer\Entity;

class FileIndex
{
  public $id;
  public $file_path;
  public $content_signature;
  public $index_date;

  public function __construct($file_path,$content_signature) {
    $this->file_path = $file_path;
    $this->id = md5($file_path);
    $this->content_signature = $content_signature;
    $this->index_date = time();
  }
}
