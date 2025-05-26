<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $note = trim($_POST['note']);
    if ($note !== "") {
        $users = json_decode(file_get_contents("data.json"), true);
        $user = $_SESSION['user'];
        $users[$user]['notes'][] = $note;
        file_put_contents("data.json", json_encode($users, JSON_PRETTY_PRINT));
    }
}
header("Location: dashboard.php");
?>
