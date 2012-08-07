<?php

namespace Zeroem\Psurgeon\Indexer;

interface IndexerInterface
{
  function registerClass($className, $fileName, $namespace=null);
  function registerMethod($classId, $methodName)
}
