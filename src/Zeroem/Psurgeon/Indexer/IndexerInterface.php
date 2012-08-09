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
  function canIndex(ContextChain $context, TokenNode $node);

  /**
   * Generate an Index Entity based on the give node and context
   *
   * @param ContextChain $context the current context
   * @param TokenNode $node the node to index
   *
   * @return Index
   */
  function index(ContextChain $context, TokenNode $node);
}
