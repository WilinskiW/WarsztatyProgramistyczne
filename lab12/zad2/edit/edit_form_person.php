<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $firstname = $_POST['firstname'];
    $secondname = $_POST['secondname'];
} else {
    die("ERROR:");
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
<h1>Edit Person</h1>
<form method="post" action="save_edits_persons.php">
    <input class="text" type="hidden" name="origin_id" value="<?php echo $id ?>" required><br>
    <label>ID:</label><input class="text" type="text" name="id" value="<?php echo htmlspecialchars($id); ?>" required><br>
    <label>Firstname:</label><input class="text" type="text" name="firstname" value="<?php echo htmlspecialchars($firstname); ?>" required><br>
    <label>Secondname:</label><input class="text" type="text" name="secondname" value="<?php echo htmlspecialchars($secondname); ?>" required><br>
    <input class="submit" type="submit" value="Save Changes">
</form>
</body>
</html>
