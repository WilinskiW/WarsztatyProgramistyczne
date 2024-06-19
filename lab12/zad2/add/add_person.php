<?php
require_once "../prepare_db.php";
if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $firstname = $_GET['firstname'];
    $secondname = $_GET['secondname'];

        $stmt = $GLOBALS['connection']->prepare(
            "INSERT INTO persons (firstname, secondname) 
             VALUES ('$firstname','$secondname');"
        );
        $stmt->execute();

}
header('Location: ../index.php');
exit;
?>
