<?php

namespace Zeroem\Psurgeon\Indexer;

use Zeroem\Psurgeon\TokenNode;
use Zeroem\Psurgeon\TokenChain;
use Zeroem\Psurgeon\Indexer\Entity\ClassIndex;
use Zeroem\Psurgeon\TokenMatcher\TextMatcher;
use Zeroem\Psurgeon\TokenMatcher\TokenMatcher;

class ClassIndexer extends AbstractTokenMatcherContextualIndex
{
  public function __construct() {
    self::__construct(new TokenMatcher(T_CLASS));
  }

  public function index(ContextChain $context, TokenNode $node) {
    $token = $node->getToken();
    $line_number = $token->getLine();
    $file_id = $context->getFile()->id;
    $namespace_id = $context->getNamespace()->id;

    $class_name = self::getClassName($node);

    return new ClassIndex($file_id, $namespace_id,$class_name, $line_number);
  }

  private static function getClassName(TokenNode $node) {
    $brace = new TextMatcher('{');
    $string = new TokenMatcher(T_STRING);

    $nameNode = TokenChain::find($node,$string,$brace);

    if(false !== $nameNode) {
      return $nameNode->getToken()->getText();
    }

    return null;
  }

}

