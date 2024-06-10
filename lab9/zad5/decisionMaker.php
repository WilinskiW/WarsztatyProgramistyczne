<?php
$ip_file = 'listaIP.txt';
if (!file_exists($ip_file)) {
    die("Plik $ip_file nie istnieje.");
}
$allowed_ips = file($ip_file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
$user_ip = $_SERVER['REMOTE_ADDR'];
if (in_array($user_ip, $allowed_ips)) {
    require 'stronaAdmina.html';
} else {
    require 'stronaUzytkownika.html';
}
?>
