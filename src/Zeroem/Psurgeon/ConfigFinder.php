<?php

namespace Zeroem\Psurgeon;

class ConfigFinder
{
  public static function find() {
    $dir = getcwd();

    do {
      $configDir = $dir.DIRECTORY_SEPARATOR.'.psurgeon';
      if(is_dir($configDir)) {
        return $configDir;
      }
      $dir = dirname($dir);
    } while(dirname($dir) != $dir);

    return false;
  }
}
