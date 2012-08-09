<?php

namespace Zeroem\Psurgeon;

class TokenNode
{
  /**
   * @var \Zeroem\Psurgeon\Token
   */
  private $token;

  /**
   * @var TokenNode
   */
  private $next;

  /**
   * @var TokenNode
   */
  private $previous;

  public function __construct(Token $token, TokenNode $previous = null, TokenNode $next = null) {
    $this->token = $token;
    $this->previous = $previous;
    $this->next = $next;
  }

  public function getToken() {
    return $this->token;
  }

  public function setToken(Token $token) {
    $this->token = $token;
    return $this;
  }

  public function getNext() {
    return $this->next;
  }

  public function setNext(TokenNode $node=null) {
    $this->next = $node;
    return $this;
  }

  public function getPrevious() {
    return $this->previous;
  }

  public function setPrevious(TokenNode $node=null) {
    $this->previous = $node;
    return $this;
  }

  public function hasNext() {
    return null !== $this->next;
  }

  public function hasPrevious() {
    return null !== $this->previous;
  }
}
