<?php

namespace Zeroem\Psurgeon;

class TokenChain implements \Countable
{
  private $head = null;
  private $tail = null;

  private $count = 0;

  public function appendToken(Token $token) {
    $node = new TokenNode($token);

    if(!isset($this->head)) {
      $this->head = $this->tail = $node;
    } else {
      $this->tail->setNext($node);
      $node->setPrevious($this->tail);
      $this->tail = $node;
    }

    $this->count++;

    return $this;
  }

  public function getHead() {
    return $this->head;
  }

  public function count() {
    return $this->count;
  }
}

