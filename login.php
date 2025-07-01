<?php
session_start();
require_once 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $pass  = md5($_POST['password']);

    $sql = "SELECT * FROM users WHERE email='$email' AND password='$pass'";
    $result = $conn->query($sql);

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        $_SESSION['user'] = $user;
        header("Location: dashboard.php");
    } else {
        $error = "Email atau password salah!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <style>
    body {
      font-family: Arial;
      background-color: #f4f1ec;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
    }
    .login-box {
      background: white;
      padding: 30px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    .login-box h2 { color: #4e342e; }
    .login-box input, .login-box button {
      width: 100%;
      margin: 10px 0;
      padding: 10px;
    }
    .login-box button {
      background-color: #6b4c3b;
      color: white;
      border: none;
      cursor: pointer;
    }
    .error {
      background-color: #ffccbc;
      padding: 10px;
      color: #bf360c;
      margin-bottom: 10px;
      border-radius: 5px;
    }
  </style>
</head>
<body>
  <div class="login-box">
    <h2>Login Admin</h2>
    <?php if (isset($error)) echo "<div class='error'>$error</div>"; ?>
    <form method="POST">
      <input type="email" name="email" placeholder="Email" required>
      <input type="password" name="password" placeholder="Password" required>
      <button type="submit">Masuk</button>
    </form>
  </div>
</body>
</html>
