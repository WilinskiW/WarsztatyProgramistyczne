<?php

$input = 'WQWsa1214:.sa./++:"?';
$znaki = '\/:*?"<>|+-';

$count=0;
for($i=0; $i<strlen($input); $i++){
    if(strpos($znaki, $input[$i]) !== false){
        $j=$i-1;
        $input=str_replace($input[$i], '', $input, $j);
        $i--;
    }
}
echo $input;