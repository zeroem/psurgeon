<?php

namespace Zeroem\Psurgeon\Entity;

/**
 * @Entity
 */
class 
{
  /**
   * @Column(type="text", unique=true)
   */
  private $path;

  /**
   * @Column(type="text")
   */
  private $signature;

  /**
   * @ManyToMany(targetEntity="NamespaceIndex", inversedBy="files")
   */
  private $namespaces;

  /**
   * @OneToMany(targetEntity="ClassIndex", fetch='LAZY')
   */
  private $classes;

  /**
   * @OneToMany(targetEntity="FunctionIndex", fetch='LAZY')
   */
  private $functions;
}

