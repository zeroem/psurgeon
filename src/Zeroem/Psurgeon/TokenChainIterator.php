<?php

namespace Zeroem\Psurgeon;

class TokenChainIterator implements \Iterator
{
  private $chain;
  private $pointer;
  private $index;
  
  public function __construct(TokenChain $chain) {
    $this->chain = $chain;
    $this->pointer = $this->chain->getHead();
  }

  public function current() {
    return $this->pointer;
  }

  public function key() {
    return $this->pointer;
  }

  public function valid() {
    return null !== $this->pointer;
  }

  public function rewind() {
    $this->pointer = $this->chain->getHead();
  }

  public function next() {
    if(null !== $this->pointer) {
      $this->pointer = $this->pointer->getNext();
      $this->index++;
    }
  }
}
