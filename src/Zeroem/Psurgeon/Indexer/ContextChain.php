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
    return $this->find('Namespace');
  }

  public function getFile() {
    return $this->find('File');
  }

  public function getClass() {
    return $this->find('Class');
  }

  public function getFunction() {
    return $this->find('Function');
  }

  private function find($element) {
    $class = "Zeroem\\Psurgeon\\Indexer\\Entity\\" . $element . "Indexer";
    foreach($this->stack as $context) {
      if($context instanceof $class) {
        return $context;
      }
    }

    return null;
  }
}
