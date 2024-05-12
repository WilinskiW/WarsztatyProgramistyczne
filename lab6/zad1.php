<?php
wypiszLiczbyPierwszeZprzedzialu(0,100);
function wypiszLiczbyPierwszeZprzedzialu($poczatek, $koniec)
{
    for ($i = $poczatek; $i <= $koniec; $i++) {
        $x = true;
        if ($i > 1) {
            for ($j = 2; $j <= sqrt($i); $j++) {
                if ($i % $j == 0) {
                    $x = false;
                    break;
                }
            }
            if ($x) {
                echo $i , " ";
            }
        }
    }
}
?>