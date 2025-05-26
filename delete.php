<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}
if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    $users = json_decode(file_get_contents("data.json"), true);
    $user = $_SESSION['user'];
    if (isset($users[$user]['notes'][$id])) {
        array_splice($users[$user]['notes'], $id, 1);
        file_put_contents("data.json", json_encode($users, JSON_PRETTY_PRINT));
    }
}
header("Location: dashboard.php");
?>
