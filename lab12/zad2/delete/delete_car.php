<?php
require_once "../prepare_db.php";
if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $id = $_GET['delete-car'];
    $stmt = $GLOBALS['connection']->prepare(
        "DELETE FROM Cars WHERE id='$id'"
    );
    $stmt->execute();

}
header('Location: ../index.php');
exit;

