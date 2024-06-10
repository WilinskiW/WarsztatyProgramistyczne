<?php
session_start();
$correct_login = 'admin';
$correct_password = 'password';

if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = $_POST['login'];
    $password = $_POST['password'];

    if ($login === $correct_login && $password === $correct_password) {
        // Logowanie udane
        $_SESSION['loggedin'] = true;
    } else {
        // Logowanie nieudane
        $error_message = "Błędny login lub hasło.";
    }
}
$is_logged_in = isset($_SESSION['loggedin']) && $_SESSION['loggedin'];
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Formularz logowania</title>
</head>
<body>
<?php if ($is_logged_in): ?>
    <h1>Witaj, <?= htmlspecialchars($correct_login) ?>!</h1>
    <p>Jesteś zalogowany.</p>
    <a href="?logout">Wyloguj</a>
<?php else: ?>
    <h1>Logowanie</h1>
    <?php if (isset($error_message)): ?>
        <p style="color: red;"><?= htmlspecialchars($error_message) ?></p>
    <?php endif; ?>
    <form method="post" action="">
        <label for="login">Login:</label>
        <input type="text" id="login" name="login" required><br><br>
        <label for="password">Hasło:</label>
        <input type="password" id="password" name="password" required><br><br>
        <button type="submit">Zaloguj</button>
    </form>
<?php endif; ?>
</body>
</html>
