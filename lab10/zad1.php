<?php
$visit_threshold = 5;
$cookie_name = 'visit_count';
$cookie_lifetime = time() + (86400 * 365);
if (isset($_POST['reset'])) {
    setcookie($cookie_name, '', time() - 3600);
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}
if (isset($_COOKIE[$cookie_name])) {
    $visit_count = $_COOKIE[$cookie_name] + 1;
} else {
    $visit_count = 1;
}
setcookie($cookie_name, $visit_count, $cookie_lifetime);
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Zad1</title>
</head>
<body>
<h1>Witaj na naszej stronie!</h1>
<p>Odwiedziłeś tę stronę: <?= $visit_count ?> razy.</p>

<?php if ($visit_count >= $visit_threshold): ?>
    <p>Gratulacje! Osiągnąłeś <?= $visit_threshold ?> odwiedzin!</p>
<?php endif; ?>

<form method="post" action="">
    <button type="submit" name="reset">Resetuj licznik odwiedzin</button>
</form>
</body>
</html>

