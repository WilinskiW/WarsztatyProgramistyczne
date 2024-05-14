<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zad2</title>
</head>
<body>
<?php
wskazDolara(array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10), 11);
function wskazDolara($tablica, $n)
{
    if ($n < 0 || $n > count($tablica)) {
        echo "BŁĄD";
        return;
    }

    for ($i = 0; $i < count($tablica); $i++) {
        if ($i == $n) {
            $tablica[$i] = "$";
        }
        echo $tablica[$i] . "<br>";
    }

}
?>
</body>
</html>
