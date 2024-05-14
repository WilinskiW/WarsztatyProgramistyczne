<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zad3</title>
</head>
<body>
<?php
zad3(5, 9, 13, 24);
function zad3($a, $b, $c, $d){
    $tablica=array();
    for($i=$a; $i<=$b; $i++){
        $tablica+=array($i=>$c);
        if($c<$d){
            $c++;
        }
    }
    print_r($tablica);
}
?>
</body>
</html>
