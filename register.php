<?php
$error = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $users = json_decode(file_get_contents("data.json"), true) ?? [];
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (isset($users[$username])) {
        $error = "Username sudah digunakan!";
    } else {
        $users[$username] = ['password' => $password, 'notes' => []];
        file_put_contents("data.json", json_encode($users, JSON_PRETTY_PRINT));
        header("Location: login.php");
        exit;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Daftar</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<form method="post">
    <h2>Daftar Akun</h2>
    <?php if ($error) echo "<p class='error'>$error</p>"; ?>
    <input name="username" placeholder="Username" required>
    <input type="password" name="password" placeholder="Password" required>
    <button>Daftar</button>
    <p>Sudah punya akun? <a href="login.php">Login</a></p>
</form>
</body>
</html>
