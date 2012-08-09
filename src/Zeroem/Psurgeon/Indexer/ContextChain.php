<?php

namespace Zeroem\Psurgeon\Indexer;

class ContextChain
{
  private $stack = array();

  public function push(Context $context) {
    array_unshift($this->stack, $context);
  }

  public function pop() {
    return array_shift($this->stack);
  }

  public function getNamespace() {
    return $this->find('namespace');
  }

  public function getFile() {
    return $this->find('file');
  }

  public function getClass() {
    return $this->find('class');
  }

  public function getFunction() {
    return $this->find('function');
  }

  private function find($element) {
    foreach($this->stack as $context) {
      if(isset($context->$element)) {
        return $context->$element;
      }
    }

    return null;
  }
}
