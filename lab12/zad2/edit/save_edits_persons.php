<?php
require_once "../prepare_db.php";
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $originId = $_POST['origin_id'];
    $edit_id = $_POST['id'];
    $edit_firstname = $_POST['firstname'];
    $edit_secondname = $_POST['secondname'];

    $stmt = $GLOBALS['connection']->prepare(
        "UPDATE persons 
         SET id='$edit_id', firstname='$edit_firstname', secondname='$edit_secondname'
         WHERE id='$originId'"
    );
    $stmt->execute();
}
header('Location: ../index.php');
?>