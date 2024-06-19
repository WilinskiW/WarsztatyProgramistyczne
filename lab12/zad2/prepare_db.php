<?php
$connection = new PDO("mysql:host=localhost;dbname=lab12", "root", "");
$GLOBALS['connection'] = $connection;
$create_persons_query = ("
    CREATE TABLE IF NOT EXISTS Persons(
        id INT PRIMARY KEY AUTO_INCREMENT,
        firstname VARCHAR(255) NOT NULL,
        secondname VARCHAR(255) NOT NULL
    )
    ");

$create_cars_query = ("
    CREATE TABLE IF NOT EXISTS Cars(
        id INT PRIMARY KEY AUTO_INCREMENT,
        model VARCHAR(255) NOT NULL,
        price FLOAT NOT NULL,
        year INT NOT NULL ,
        Person_id INT NOT NULL,
        FOREIGN KEY (Person_id) REFERENCES Persons(id)
    )
    ");

try {
    $connection->query($create_persons_query);
} catch (Exception $e) {
}

try {
    $connection->query($create_cars_query);
} catch (Exception $e) {

}
