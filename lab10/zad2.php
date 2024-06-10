<?php
$cookie_name = 'has_voted';
$cookie_lifetime = time() + (86400 * 365);
$has_voted = isset($_COOKIE[$cookie_name]);
$poll_results = [
    'option1' => 0,
    'option2' => 0,
    'option3' => 0
];
$results_file = 'poll_results.json';
if (file_exists($results_file)) {
    $poll_results = json_decode(file_get_contents($results_file), true);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !$has_voted) {
    $selected_option = $_POST['option'];
    if (array_key_exists($selected_option, $poll_results)) {
        $poll_results[$selected_option]++;
        file_put_contents($results_file, json_encode($poll_results));
        setcookie($cookie_name, '1', $cookie_lifetime);
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    }
}

?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Sonda internetowa</title>
</head>
<body>
<h1>Sonda internetowa</h1>

<?php if ($has_voted): ?>
    <p>Dziękujemy za udział w sondzie!</p>
    <h2>Wyniki sondy:</h2>
    <ul>
        <li>Opcja 1: <?= $poll_results['option1'] ?> głosów</li>
        <li>Opcja 2: <?= $poll_results['option2'] ?> głosów</li>
        <li>Opcja 3: <?= $poll_results['option3'] ?> głosów</li>
    </ul>
<?php else: ?>
    <form method="post" action="">
        <p>Jaki jest Twój ulubiony kolor?</p>
        <input type="radio" id="option1" name="option" value="option1" required>
        <label for="option1">Czerwony</label><br>
        <input type="radio" id="option2" name="option" value="option2">
        <label for="option2">Zielony</label><br>
        <input type="radio" id="option3" name="option" value="option3">
        <label for="option3">Niebieski</label><br><br>
        <button type="submit">Głosuj</button>
    </form>
<?php endif; ?>
</body>
</html>

