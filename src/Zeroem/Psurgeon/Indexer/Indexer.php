<?php

namespace Zeroem\Psurgeon\Indexer;

use Zeroem\Psurgeon\Tokenizer;
use Zeroem\Psurgeon\Indexer\Entity\FileIndex;

class Indexer
{
  /**
   * @var IndexerInterface
   */
  private $indexers= array();

  public function index($filename) {
    $context = new ContextChain();
    $blocks = array();

    $tokenizer = new Tokenizer();
    $indexes = array();
    $nextBlockAction = null;

    $content = file_get_contents($filename);
    $context->push(new FileIndex($filename, md5($content)));

    $tokenChain = $tokenizer->tokenize($content);
    $node = $tokenChain->getHead();

    while(null !== $node) {
      foreach($this->indexers as $indexer) {
        if($indexer->canIndex($contextChain, $node)) {
          $index = $indexer->index($contextChain, $node);

          $indexes[] = $index;
          if($indexer->isContextual()) {
            $this->context->push($index);
            $nextBlockAction = array($this->context, 'pop');
          }
        }
      }

      if('{' === $node->getToken()->getText() ) {
        array_push($blocks, $nextBlockAction);
        $nextBlockAction = null;
      } else if( '}' === $node->getToken()->getText() ) {
        $action = array_pop($blocks);

        if(is_callable($action)) {
          call_user_func($action);
        }
      }
    }

    return $indexes;
  }

  public function addIndexer($indexer) {
    $this->indexers[] = $indexer;
  }
}
