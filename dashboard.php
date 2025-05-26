<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}
$users = json_decode(file_get_contents("data.json"), true);
$user = $_SESSION['user'];
$notes = $users[$user]['notes'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Catatan Harian</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h2>Catatan Harian - <?= htmlspecialchars($user) ?></h2>
<a class="logout" href="logout.php">Logout</a>

<form method="post" action="add.php">
    <textarea name="note" placeholder="Tulis catatan..." required></textarea>
    <button>Tambah Catatan</button>
</form>

<ul>
    <?php foreach ($notes as $i => $note): ?>
        <li>
            <?= htmlspecialchars($note) ?>
            <a href="delete.php?id=<?= $i ?>">Hapus</a>
        </li>
    <?php endforeach; ?>
</ul>
</body>
</html>
