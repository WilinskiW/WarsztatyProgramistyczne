<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Zad2</title>
    <?php require_once "prepare_db.php" ?>
</head>
<body>
<h1>Manage MySQL Database</h1>
<section id="add-person">
    <h2>Add Person</h2>
    <form id="add-person-form" class="add-form" action="add/add_person.php">
        <input class="text" type="text" name="firstname" placeholder="First Name" required><br>
        <input class="text" type="text" name="secondname" placeholder="Last Name" required><br>
        <input class="submit" type="submit" value="Add Person">
    </form>
</section>
<section id="add-car">
    <h2>Add Car</h2>
    <form id="add-car-form" class="add-form" action="add/add_car.php">
        <input class="text" type="text" name="model" placeholder="Model" required><br>
        <input class="text" type="text" name="price" placeholder="Price" required><br>
        <input class="text" type="text" name="year" placeholder="Year" required><br>
        <select id="select-person" name="person_id">
            <option>Select Person</option>
            <?php
            $stmt = $GLOBALS['connection']->prepare("SELECT id FROM persons");
            $stmt->execute();
            $persons_id = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($persons_id as $row) {
                ?>
                <option><?php echo htmlspecialchars($row['id']); ?></option>
                <?php
            }
            ?>
        </select>
        <input class="submit" type="submit" value="Add Car">
    </form>
</section>
<section id="person-list">
    <h2>Persons</h2>
    <table id="persons-table" class="database-table">
        <thead>
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $stmt = $GLOBALS['connection']->prepare(
            "SELECT * FROM persons");
        $stmt->execute();
        $persons = $stmt->fetchAll();
        foreach ($persons as $person) {
            ?>
            <tr>
                <td><?php echo $person['id'] ?></td>
                <td><?php echo $person['firstname'] ?></td>
                <td><?php echo $person['secondname'] ?></td>
                <td class="actions">
                    <form class="delete-from" action="delete/delete_person.php">
                        <button type="submit" class="submit" name="delete-person"
                                value="<?php echo $person['id'] ?>">Delete
                        </button>
                    </form>
                    <form class="edit-form" method="post" action="edit/edit_form_person.php">
                        <input type="hidden" name="id" value="<?php echo htmlspecialchars($person['id']); ?>">
                        <input type="hidden" name="firstname"
                               value="<?php echo htmlspecialchars($person['firstname']); ?>">
                        <input type="hidden" name="secondname"
                               value="<?php echo htmlspecialchars($person['secondname']); ?>">
                        <input type="submit" class="submit" value="Edit">
                    </form>
                </td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
</section>
<section id="cars-list">
    <h2>Cars</h2>
    <table id="cars-table" class="database-table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Model</th>
            <th>Price</th>
            <th>Year</th>
            <th>Person ID</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $stmt = $GLOBALS['connection']->prepare(
            "SELECT * FROM Cars");
        $stmt->execute();
        $cars = $stmt->fetchAll();
        foreach ($cars as $car) {
            ?>
            <tr>
                <td><?php echo $car['id'] ?></td>
                <td><?php echo $car['model'] ?></td>
                <td><?php echo $car['price'] ?></td>
                <td><?php echo $car['year'] ?></td>
                <td><?php echo $car['Person_id'] ?></td>
                <td class="actions">
                    <form class="delete-from" action="delete/delete_car.php">
                        <button type="submit" class="submit" name="delete-car"
                                value="<?php echo $car['id'] ?>">Delete
                        </button>
                    </form>
                    <form class="edit-form" method="post" action="edit/edit_form_car.php">
                        <input type="hidden" name="id" value="<?php echo htmlspecialchars($car['id']); ?>">
                        <input type="hidden" name="model" value="<?php echo htmlspecialchars($car['model']); ?>">
                        <input type="hidden" name="price" value="<?php echo htmlspecialchars($car['price']); ?>">
                        <input type="hidden" name="year" value="<?php echo htmlspecialchars($car['year']); ?>">
                        <input type="hidden" name="person_id" value="<?php echo htmlspecialchars($car['Person_id']); ?>">
                        <input type="submit" class="submit" value="Edit">
                    </form>
                </td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
</section>
<h2></h2>
</body>
</html>

