<?php

function getSplicedDesc(string $str): string
{

  $splicedStr = substr($str, 0, 15) . ' ...';

  return $splicedStr;
}

print_r(getSplicedDesc('Une super mega description de fou qui est beaucoup beaucoup trop longue'));
