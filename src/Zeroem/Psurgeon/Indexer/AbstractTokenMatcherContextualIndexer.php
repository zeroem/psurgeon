<?php

namespace Zeroem\Psurgeon\Indexer;

use Zeroem\Psurgeon\TokenMatcher\TokenMatcherInterface;
use Zeroem\Psurgeon\Indexer\Entity\FileIndex;
use Zeroem\Psurgeon\Indexer\IndexerInterface;
use Zeroem\Psurgeon\TokenNode;

abstract class AbstractTokenMatcherContextualIndexer implements IndexerInterface
{
  /**
   * @var TokenMatcherInterface;
   */
  private $matcher;

  public function __construct(TokenMatcherInterface $matcher) {
    $this->matcher = $matcher;
  }

  public function canIndex(Context $context, TokenNode $node) {
    return $this->matcher->match($node);
  }

  public function isContextual() {
    return true;
  }
}
