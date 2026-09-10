<?php
session_start();

if (isset($_SESSION['login'])) {
    header("Location: dashboard.php");
    exit;
}

$error = "";

if (isset($_POST['login'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username == "admin" && $password == "admin123") {

        $_SESSION['login'] = true;
        $_SESSION['username'] = $username;

        header("Location: dashboard.php");
        exit;

    } else {

        $error = "Username atau password salah";

    }
}
?>

<!DOCTYPE html>
<html>
<head>

<title>Login</title>

<link rel="stylesheet" href="assets/style.css">

</head>

<body class="login">

<div class="login-box">

<h2>Sistem Informasi Pasien</h2>

<?php if ($error != "") { ?>

<p class="error">
<?php echo $error; ?>
</p>

<?php } ?>

<form method="POST">

<label>Username</label>

<input
type="text"
name="username"
required
>

<label>Password</label>

<input
type="password"
name="password"
required
>

<button name="login">
Login
</button>

</form>

</div>

</body>
</html>