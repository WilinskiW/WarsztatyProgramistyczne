<?php
require_once "../prepare_db.php";
if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $id = $_GET['delete-person'];
    $stmt = $GLOBALS['connection']->prepare(
        "DELETE FROM Persons WHERE id='$id'"
    );
    $stmt->execute();

}
header('Location: ../index.php');
exit;

