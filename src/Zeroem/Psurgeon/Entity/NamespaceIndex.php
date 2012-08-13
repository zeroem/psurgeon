<?php

namespace Zeroem\Psurgeon\Entity;

/**
 * @Entity
 */
class NamespaceIndex
{
  /**
   * @Column(type="text", unique=true)
   */
  private $name;

  /**
   * @ManyToMany(targetEntity="FileIndex", mappedBy="namespaces")
   */
  private $files;

  /**
   * @OneToMany(targetEntity="ClassIndex", inversedBy="namespace")
   */
  private $classes;

  /**
   * @OneToMany(targetEntity="FunctionIndex", inversedBy="namespace")
   */
  private $functions;
}

