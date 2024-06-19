<?php
require_once "../prepare_db.php";
if ($_SERVER['REQUEST_METHOD'] == "GET") {
    if(!is_numeric($person_id = $_GET['person_id'])){
        die();
    }

    $model = $_GET['model'];
    $price = $_GET['price'];
    $year = $_GET['year'];


    $stmt = $GLOBALS['connection']->prepare(
        "INSERT INTO cars (model, price, year, Person_id) 
         VALUES ('$model','$price','$year',$person_id);"
    );
    $stmt->execute();

}
header('Location: ../index.php');
exit;

