<?php

function myTruncate($string, $limit=30, $break=" ", $pad="..")
{
  // return with no change if string is shorter than $limit
  if(mb_strlen($string) <= $limit) return $string;

  // is $break present between $limit and the end of the string?
  if(false !== ($breakpoint = mb_strpos($string, $break, $limit))) {
    if($breakpoint < mb_strlen($string) - 1) {
      $string = mb_substr($string, 0, $breakpoint) . $pad;
    }
  }

  return $string;
}


?>
