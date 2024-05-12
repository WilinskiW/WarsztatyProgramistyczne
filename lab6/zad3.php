<?php
function mnozenie($m1, $m2) {
    $k1 = count($m1);
    $w1 = count($m1[0]);
    $k2 = count($m2);
    $w2 = count($m2[0]);
    $mnoz = array();

    if ($k1 != $w2) {
        return "Nieprawidłowe wymiary. Nie można pomnożyć";
    }

    for ($i = 0; $i < $w1; $i++) {
        for ($j = 0; $j < $k2; $j++) {
            $mnoz[$i][$j] = 0;
        }
    }
    for ($i = 0; $i < $w1; $i++) {
        for ($j = 0; $j < $k2; $j++) {
            for ($k = 0; $k < $w1; $k++) {
                $mnoz[$i][$j] += $m1[$i][$k] * $m2[$k][$j];
            }
        }
    }
    return $mnoz;
}

function wydrukujMacierz($m)
{
    for($i=0; $i<count($m); $i++){
        for($j=0; $j<count($m[0]); $j++){
            echo $m[$i][$j] . "\t";
        }
        echo "\n";
    }
}

$macierz1 = array(
    array(1, 2),
    array(3, 4),
);
$macierz2 = array(
    array(5, 6),
    array(7, 8),
);

wydrukujMacierz(mnozenie($macierz1, $macierz2));
?>
