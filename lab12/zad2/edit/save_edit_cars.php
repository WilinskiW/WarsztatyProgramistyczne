<?php
require_once "../prepare_db.php";
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $originId = $_POST['origin_id'];
    $edit_id = $_POST['id'];
    $edit_model = $_POST['model'];
    $edit_price = $_POST['price'];
    $edit_year = $_POST['year'];
    $edit_person_id = $_POST['person_id'];

    $stmt = $GLOBALS['connection']->prepare("
    UPDATE cars SET id='$edit_id', model='$edit_model', 
                    price='$edit_price', year='$edit_year', Person_id='$edit_person_id' WHERE id='$originId'"
    );
    $stmt->execute();
}
header('Location: ../index.php');
?>
