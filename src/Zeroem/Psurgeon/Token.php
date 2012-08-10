<?php

namespace Zeroem\Psurgeon;

class Token
{
  /**
   * T_* token constant
   * @var integer
   */
  private $type;

  /**
   * @var string
   */
  private $text;

  /**
   * @var integer
   */
  private $line;
  /**
   * @var string
   */
  private $name;


  public function __construct($text=null, $type=null, $line=null) {
    $this->text = $text;
    $this->type = $type;
    $this->line = $line;

    if(isset($this->type)) {
      $this->name = token_name($this->type);
    } else {
      $this->name = '_SINGLE_CHARACTER_';
    }
  }

  public function getType() {
    return $this->type;
  }

  public function getText() {
    return $this->text;
  }

  public function getLine() {
    return $this->line;
  }

  public function getName() {
    return $this->name;
  }

  public function __toString() {
    return $this->text;
  }
}

