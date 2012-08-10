<?php

namespace Zeroem\Psurgeon\Indexer;

use Zeroem\Psurgeon\Indexer\Entity\FileIndex;
use Zeroem\Psurgeon\Indexer\AbstractTokenMatcherContextualIndexer;
use Zeroem\Psurgeon\TokenMatcher\Token\TokenMatcher;
use Zeroem\Psurgeon\TokenNode;

class FunctionIndexer extends AbstractTokenMatcherContextualIndexer
{
  public function __construct() {
    parent::__construct(new TokenMatcher(T_FUNCTION));
  }

  public function index(ContextChain $context, TokenNode $node) {
    $token = $node->getToken();
    $line_number = $token->getLine();
    $file_id = $context->getFile()->id;

    $function_name = self::getFunctionName($node);

    return new FunctionIndex($file_id, $function_name, $line_number);
  }

  private static function getFunctionName(TokenNode $node) {
    $name = null;

    $paren = new TextMatcher('(');
    $string = new TokenMatcher(T_STRING);

    $pointer = $node;
    while($pointer->hasNext()) {
      $pointer = $pointer->getNext();
      $token = $pointer->getToken();

      if($string->match($token)) {
        $name = $token->getText();
        break;
      } else if($paren->match($token)) {
        break;
      }  
    }

    if(!isset($name)) {
      $name = '__ANONYMOUS__';
    }

    return $name;
  }
}
