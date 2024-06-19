<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $model = $_POST['model'];
    $price = $_POST['price'];
    $year = $_POST['year'];
    $person_id = $_POST['person_id'];
} else {
    die("ERROR: Invalid request method");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit</title>
</head>
<style>
    body {
        display: flex;
        flex-direction: column;
        justify-content: center;
    }
</style>
<body>
<h1>Edit Car</h1>
<form method="post" action="save_edit_cars.php">
    <input class="text" type="hidden" name="origin_id" value="<?php echo $id?>" required><br>
    <label>ID:</label><input class="text" type="text" name="id" value="<?php echo htmlspecialchars($id); ?>" required><br>
    <label>Model:</label><input class="text" type="text" name="model" value="<?php echo htmlspecialchars($model); ?>" required><br>
    <label>Price:</label><input class="text" type="text" name="price" value="<?php echo htmlspecialchars($price); ?>" required><br>
    <label>Year:</label><input class="text" type="text" name="year" value="<?php echo htmlspecialchars($year); ?>" required><br>
    <label>Person_ID:</label><input class="text" type="text" name="person_id" value="<?php echo htmlspecialchars($person_id); ?>" required><br>
    <input class="submit" type="submit" value="Save Changes">
</form>
</body>
</html>
