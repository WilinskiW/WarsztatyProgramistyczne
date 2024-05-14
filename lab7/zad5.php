<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zad5</title>
</head>
<body>
<h1>Kalkulator</h1>
<hr>
<h2>Prosty</h2>
<form name="kalkulator prosty" method="POST">
    <input type="number" name="pole1">
    <select name="operacja">
        <option value=1>Dodawanie</option>
        <option value=2>Odejmowanie</option>
        <option value=3>Mnożenie</option>
        <option value=4>Dzielenie</option>
    </select>
    <input type="number" name="pole2"><br>
    <button type="submit">Oblicz</button>
</form>

<h2>Zaawansowany</h2>
<form name="kalkulator zaawansowany" method="POST">
    <input type="text" name="pole3">
    <select name="operacja2">
        <option value=1>Cos</option>
        <option value=2>Sin</option>
        <option value=3>Tg</option>
        <option value=4>binarne na dziesietne</option>
        <option value=5>dziesietne na binarne</option>
        <option value=6>szesnastkowe na dziesietne</option>
        <option value=7>dziesietne na szesnastkowe</option>
    </select><br>
    <button type="submit">Oblicz</button>
</form>
<?php
if (isset($_POST['pole1'])) {
    $a = $_POST['pole1'];
    $b = $_POST['pole2'];
    $c = $_POST['operacja'];

    switch ($c) {
        case '1':
            echo $a + $b;
            break;
        case '2':
            echo $a - $b;
            break;
        case '3':
            echo $a * $b;
            break;
        case '4':
            if ($b == 0) {
                echo "Nie można dzielić przez 0";
            } else {
                echo $a / $b;
            }
            break;

    }
}

if (isset($_POST['pole3'])) {
    $d = $_POST['pole3'];
    $e = $_POST['operacja2'];
    switch ($e) {
        case '1':
            echo cos($d);
            break;
        case '2':
            echo sin($d);
            break;
        case '3':
            echo tan($d);
            break;
        case '4':
            $f = 0;
            for ($i = 0; $i < strlen($d); $i++) {
                $f += (pow(2, $i) * $d[strlen($d) - $i - 1]);
            }
            echo $f;
            break;
        case '5':
            $f = '';
            while ($d >= 1) {
                if ($d % 2 == 1) {
                    $f = $f . "1";
                    $d = $d / 2;
                } elseif ($d % 2 == 0) {
                    $f = $f . "0";
                    $d = $d / 2;
                } else {
                    return;
                }
            }
            echo strrev($f);
            break;
        case '6':
            $f = 0;
            for ($i = 0; $i < strlen($d); $i++) {
                $g = $d[strlen($d) - $i - 1];
                if ($g == 'A' || $g == 'B' || $g == 'C' || $g == 'D' || $g == 'E' || $g == 'F') {
                    $g = ord($g) - 55;
                }
                $f += (pow(16, $i) * $g);
            }
            echo $f;
            break;
        case '7':
            $f = '';
            while ($d >= 1) {
                $g = $d % 16;
                if ($g > 9) {
                    $g = chr($g + 55);
                }
                $f = $f . ($g);
                $d = $d / 16;
            }
            echo strrev($f);
            break;
    }
}
?>
</body>
</html>