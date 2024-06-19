<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Zad1</title>
</head>
<body>

<?php
$mysqli = mysqli_connect("localhost", "root", "", "lab12");
$create = ("
    CREATE TABLE Student(
    StudentID INT PRIMARY KEY,
    Firstname VARCHAR(255),
    Secondname VARCHAR(255),
    Salary INT,
    DateOfBirth DATE
    )");
try {
    $mysqli->query($create);
    echo "Utworzono tabelę"."<br><br>";
}
catch (Exception $e){
    echo "Tabela już istnieje. Resetuje"."<br><br>";
}
?>

<form method="post">
    <input type="submit" name="reset" value="reset">
</form>

<?php
if(isset($_POST['reset'])) {
    $drop = "DROP TABLE Student";
    $mysqli->query($drop);
}
?>

</body>
</html>