<?php
session_start();
$error = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $users = json_decode(file_get_contents("data.json"), true) ?? [];
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (isset($users[$username]) && $users[$username]['password'] === $password) {
        $_SESSION['user'] = $username;
        header("Location: dashboard.php");
        exit;
    } else {
        $error = "Username atau password salah!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<form method="post">
    <h2>Login</h2>
    <?php if ($error) echo "<p class='error'>$error</p>"; ?>
    <input name="username" placeholder="Username" required>
    <input type="password" name="password" placeholder="Password" required>
    <button>Login</button>
    <p>Belum punya akun? <a href="register.php">Daftar</a></p>
</form>
</body>
</html>
