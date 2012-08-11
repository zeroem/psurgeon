<?php

namespace Zeroem\Psurgeon\Indexer;

abstract class IdGenerator
{
  private static $ids = array('namespace','class','method','function');

  static function generate($obj) {
    $str = '';
    foreach(self::$ids as $id) {
      if(property_exists($obj,$id)) {
        $str .= $obj->$id;
      } else {
        $id_id = $id.'_id';
        if(property_exists($obj,$id_id)) {
          $str .= $obj->$id_id;
        }
      }
    }

    return md5($str);
  }
}
