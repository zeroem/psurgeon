<?php

namespace Zeroem\Psurgeon\Indexer;

use Zeroem\Psurgeon\Tokenizer;

class Indexer
{
  /**
   * @var IndexerInterface
   */
  private $indexers= array();

  public function index($filename) {
    $context = new ContextChain();
    $context->push(new Context($filename));

    $tokenizer = new Tokenizer();
    $indexes = array();

    $tokenChain = $tokenizer->tokenize(file_get_contents($filename));
    
    $node = $tokenChain->getHead();
    
    while(null !== $node) {
      foreach($this->indexers as $indexer) {
        if($indexer->canIndex($contextChain, $node)) {
          $indexes[] = $reactor->index($contextChain, $node);
        }
      }
    }

    return $indexes;
  }

  public function addIndexer($indexer) {
    $this->reactors[] = $something;
  }
}
