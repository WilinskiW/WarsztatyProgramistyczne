<?php
// Ścieżka do pliku z odnośnikami
$file_path = 'linki.txt';

// Sprawdzenie, czy plik istnieje
if (!file_exists($file_path)) {
    die("Plik $file_path nie istnieje.");
}

// Odczyt zawartości pliku
$lines = file($file_path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

// Inicjalizacja tablicy do przechowywania odnośników
$links = [];

foreach ($lines as $line) {
    // Rozdzielenie wiersza według separatora ";"
    list($url, $description) = explode(';', $line);
    $links[] = [
        'url' => $url,
        'description' => $description
    ];
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Lista odnośników</title>
</head>
<body>
<h1>Lista odnośników</h1>
<ul>
    <?php foreach ($links as $link): ?>
        <li><a href="<?= htmlspecialchars($link['url']) ?>" target="_blank"><?= htmlspecialchars($link['description']) ?></a></li>
    <?php endforeach; ?>
</ul>
</body>
</html>
