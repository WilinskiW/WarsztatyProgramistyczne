<?php
session_start();
$data_file = 'users.txt';
function validate_password($password) {
    return strlen($password) >= 6 &&
        preg_match('/[A-Z]/', $password) &&
        preg_match('/\d/', $password) &&
        preg_match('/\W/', $password);
}
function is_email_unique($email, $data_file) {
    if (!file_exists($data_file)) {
        return true;
    }
    $file = fopen($data_file, 'r');
    while (($line = fgetcsv($file)) !== false) {
        if ($line[2] == $email) {
            fclose($file);
            return false;
        }
    }
    fclose($file);
    return true;
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['register'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    if (!validate_password($password)) {
        $register_error = "Hasło musi mieć co najmniej 6 znaków, zawierać wielką literę, cyfrę oraz znak specjalny.";
    }
    elseif (!is_email_unique($email, $data_file)) {
        $register_error = "Email jest już zarejestrowany.";
    } else {
        $file = fopen($data_file, 'a');
        fputcsv($file, [$first_name, $last_name, $email, password_hash($password, PASSWORD_DEFAULT)]);
        fclose($file);
        $register_success = "Rejestracja zakończona sukcesem.";
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (file_exists($data_file)) {
        $file = fopen($data_file, 'r');
        while (($line = fgetcsv($file)) !== false) {
            if ($line[2] == $email && password_verify($password, $line[3])) {
                $_SESSION['loggedin'] = true;
                $_SESSION['user'] = $line[0];
                break;
            }
        }
        fclose($file);
    }
    if (!isset($_SESSION['loggedin'])) {
        $login_error = "Błędny email lub hasło.";
    }
}

if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Formularz rejestracji i logowania</title>
</head>
<body>
<?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']): ?>
    <h1>Witaj, <?= htmlspecialchars($_SESSION['user']) ?>!</h1>
    <p>Jesteś zalogowany.</p>
    <a href="?logout">Wyloguj</a>
<?php else: ?>
    <h1>Rejestracja</h1>
    <?php if (isset($register_error)): ?>
        <p style="color: red;"><?= htmlspecialchars($register_error) ?></p>
    <?php elseif (isset($register_success)): ?>
        <p style="color: green;"><?= htmlspecialchars($register_success) ?></p>
    <?php endif; ?>
    <form method="post" action="">
        <label for="first_name">Imię:</label>
        <input type="text" id="first_name" name="first_name" required><br><br>
        <label for="last_name">Nazwisko:</label>
        <input type="text" id="last_name" name="last_name" required><br><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>
        <label for="password">Hasło:</label>
        <input type="password" id="password" name="password" required><br><br>
        <button type="submit" name="register">Zarejestruj</button>
    </form>

    <h1>Logowanie</h1>
    <?php if (isset($login_error)): ?>
        <p style="color: red;"><?= htmlspecialchars($login_error) ?></p>
    <?php endif; ?>
    <form method="post" action="">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>
        <label for="password">Hasło:</label>
        <input type="password" id="password" name="password" required><br><br>
        <button type="submit" name="login">Zaloguj</button>
    </form>
<?php endif; ?>
</body>
</html>

