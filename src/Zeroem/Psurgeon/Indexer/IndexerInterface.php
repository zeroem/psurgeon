<?php

namespace Zeroem\Psurgeon\Indexer;

use Zeroem\Psurgeon\TokenNode;

interface IndexerInterface
{
  /**
   * Determine whether or not the indexer can handle this node
   * in the give context
   *
   * @param ContextChain $context the current context
   * @param TokenNode $node the node to index
   *
   * @return boolean
   */
  public function canIndex(ContextChain $context, TokenNode $node);

  /**
   * Generate one or more Index Entities based on the give node and context
   *
   * @param ContextChain $context the current context
   * @param TokenNode $node the node to index
   *
   * @return Zeroem\Psurgeon\Indexer\Entity\*
   */
  public function index(ContextChain $context, TokenNode $node);

  /**
   * Whether or not to push the Indexer Entity onto the ContextChain
   * 
   * @return boolean
   */
  public function isContextual();
}
