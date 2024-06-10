<?php
$counter_file = 'counter.txt';
if (!file_exists($counter_file)) {
    $count = 1;
    file_put_contents($counter_file, $count);
} else {
    $count = (int)file_get_contents($counter_file);
    $count++;
    file_put_contents($counter_file, $count);
}
echo "Liczba odwiedzin: " . $count;
?>
