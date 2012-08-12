<?php

namespace Zeroem\Psurgeon;

use Zeroem\Psurgeon\TokenMatcher\TokenMatcherInterface;

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

  public function getTail() {
    return $this->tail;
  }

  public function count() {
    return $this->count;
  }

  public static function find(
    TokenNode $start,
    TokenMatcherInterface $target,
    TokenMatcherInterface $terminal=null
  ) {
    $pointer = $start;

    do {
      $token = $pointer->getToken();
      if($target->match($token)) {
        return $pointer;
      } else if(isset($terminal) && $terminal->match($token)) {
        return false;
      }
    } while($pointer = $pointer->getNext());

    return false;
  }
}

