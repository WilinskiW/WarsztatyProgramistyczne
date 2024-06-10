<?php
function manage_directory($path, $dir_name, $operation = 'read') {
    if (substr($path, -1) !== '/') {
        $path .= '/';
    }

    $full_path = $path . $dir_name;

    if ($operation === 'read') {
        if (is_dir($full_path)) {
            $files = scandir($full_path);
            return $files;
        } else {
            return "Katalog $full_path nie istnieje.";
        }
    }
    // Create operation
    elseif ($operation === 'create') {
        if (!file_exists($full_path)) {
            mkdir($full_path, 0777, true);
            return "Katalog $full_path został stworzony.";
        } else {
            return "Katalog $full_path już istnieje.";
        }
    }
    elseif ($operation === 'delete') {
        if (is_dir($full_path)) {
            if (count(scandir($full_path)) == 2) {
                rmdir($full_path);
                return "Katalog $full_path został usunięty.";
            } else {
                return "Katalog $full_path nie jest pusty.";
            }
        } else {
            return "Katalog $full_path nie istnieje.";
        }
    }
    return "Nieprawidłowa operacja.";
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $path = $_POST['path'];
    $dir_name = $_POST['dir_name'];
    $operation = isset($_POST['operation']) ? $_POST['operation'] : 'read';

    $result = manage_directory($path, $dir_name, $operation);
    echo '<pre>' . print_r($result, true) . '</pre>';
}
?>
