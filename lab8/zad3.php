<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ciag = $_POST['ciag'];
    $operacja = $_POST['operacja'];

    switch ($operacja) {
        case "odwrocenie":
            $result = strrev($ciag);
            break;
        case "wielkie":
            $result = strtoupper($ciag);
            break;
        case "male":
            $result = strtolower($ciag);
            break;
        case "ile":
            $result = strlen($ciag);
            break;
        case "biale":
            $result = trim($ciag);
            break;
        default:
            $result = '';
            break;
    }
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>3</title>
    <link rel="stylesheet">
    <style>
        input {margin: 0; padding: 0}
    </style>
</head>
<body>
<div class="container">
    <h1>Prosty</h1>
    <form method="post" action="">
        <input type="text" id="ciag" name="ciag" class="ciag">
        <select name="operacja">
            <option value="odwrocenie">Odwrócenie ciągu znaków</option>
            <option value="wielkie">Zamiana wszystkich liter na wielkie</option>
            <option value="male">Zamiana wszystkich liter na małe</option>
            <option value="ile">Liczenie liczby znaków</option>
            <option value="biale">Usuwanie białych znaków z początku i końca ciągu</option>
        </select>
        <button type="submit" value="wykonaj" class="wykonaj">Wykonaj</button>
    </form>
    <?php
    if (isset($result)) {
        echo "<p>$result</p>";
    }
    ?>
</div>
</body>
</html>