<?php 

function distance($a,$b){
    $html = file_get_contents('http://www.distance.to/'.$a.'/'.$b);
    $distanceInKM = $html->find('span[class=value km]')[1];
    return $distanceInKM->plaintext;
  }

  echo distance('nairobi', 'eldoret');
?>