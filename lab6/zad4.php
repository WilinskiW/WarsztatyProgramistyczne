<?php
function obliczSume($liczba) {

    while (true) {
        $suma = 0;
        while ($liczba > 0) {
            $suma += $liczba % 10;
            $liczba = (int)($liczba / 10);
        }

        if ($suma >= 10) {
            $liczba = $suma;
        } else {
            return $suma;
        }
    }
}

$liczba = 21214;
echo "Suma cyfr liczby $liczba: " . obliczSume($liczba);