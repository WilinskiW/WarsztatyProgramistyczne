<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zad1</title>
</head>
<body>
<form method="get" action="">
    <label for="birthday">Birthday:</label>
    <input type="date" id="birthday" name="birthday">
    <input type="submit" value="Submit">
</form>

<?php
$birthDay = null;
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["birthday"])) {
    $birthDay = $_GET["birthday"];
}

if ($birthDay) {
    echo "<p>Urodziłeś się w " . jakiTydzien($birthDay) . ".</p>";
    echo "<p>Masz tyle lat: " . ileLat($birthDay) . ".</p>";
    echo "<p>Twoje najbliższe urodziny: " . najblizszeUrodziny($birthDay) . ".</p>";
}

function jakiTydzien($birthDay) {
    $daysOfWeek = ["Niedzielę", "Poniedziałek", "Wtorek", "Środę", "Czwartek", "Piątek", "Sobotę"];
    $timestamp = strtotime($birthDay);
    $dayOfWeek = date("w", $timestamp);
    return $daysOfWeek[$dayOfWeek];
}

function ileLat($birthDay) {
    $birthDate = new DateTime($birthDay);
    $currentDate = new DateTime();
    $age = $currentDate->diff($birthDate);
    return $age->y;
}

function najblizszeUrodziny($birthDay) {
    $currentDate = new DateTime();
    $currentYear = $currentDate->format("Y");
    $nextBirthday = DateTime::createFromFormat("Y-m-d", $currentYear . '-' . date("m-d", strtotime($birthDay)));

    if ($nextBirthday < $currentDate) {
        $nextBirthday->modify('+1 year');
    }

    return $nextBirthday->format('Y-m-d');
}
?>

</body>
</html>
