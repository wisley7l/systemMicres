<?php
namespace Base32;

    public static function decode($encoded){
      $decoded = "";
      for( $i = 0; $i < strlen($encoded); $i++ ) {
        $b = ord($encoded[$i]);
        $a = $b ^ 123;  // <-- must be same number used to encode the character
        $decoded .= chr($a)
      }
      return $decoded
    }
