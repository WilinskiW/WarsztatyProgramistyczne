<?php
obliczSumyCiagu(1,3,5);
function obliczSumyCiagu($a1, $q, $n)
{
    echo "Suma aryt: " . ((2*$a1 + ($n-1)*$q)*$n)/2;
    echo "\nSuma geo: " . $a1*((1-pow($q, $n))/(1-$q));
}
?>
