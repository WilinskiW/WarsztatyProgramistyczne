<?php
$connection = new PDO("mysql:host=localhost;dbname=lab12", "root", "");
$db_query = ("
    CREATE TABLE IF NOT EXISTS Users(
        id INT PRIMARY KEY AUTO_INCREMENT,
        firstname VARCHAR(255) NOT NULL,
        lastname VARCHAR(255) NOT NULL,
        email VARCHAR(255) NOT NULL,
        password VARCHAR(255) NOT NULL
    )
    ");

try {
    $connection->query($db_query);
} catch (Exception $e) {
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Zad3</title>
</head>
<body>
<h1>Registration form</h1>
<form method="post">
    <label>First name:</label><input type="text" name="firstname" required><br>
    <label>Last name:</label><input type="text" name="lastname" required><br>
    <label>Email:</label><input type="text" name="email" required><br>
    <label>Password:</label><input type="password" name="password" required><br>
    <input type="submit" value="Register">
</form>
</body>
</html>

<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hash = password_hash($password,PASSWORD_DEFAULT);

    try {
        $connection->query("INSERT INTO users (firstname, lastname, email, password) 
                              VALUES ('$firstname','$lastname','$email','$hash')");
    }
    catch (PDOException $e){
        echo "ERROR";
    }
}
?>
