<?php
require_once 'db.php';
session_start();
if (!isset($_SESSION['user'])) header("Location: login.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = md5($_POST['password']);
  $role_id = $_POST['role_id'];

  $conn->query("INSERT INTO users (name, email, password, role_id) VALUES ('$name', '$email', '$password', '$role_id')");
  header("Location: user.php");
}
$roles = $conn->query("SELECT * FROM roles");
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Tambah Pengguna</title>
  <style>
    :root {
      --coklat-tua: #4e342e;
      --coklat-muda: #6b4c3b;
      --latte: #f4f1ec;
      --putih: #ffffff;
      --abu: #ccc;
    }

    body {
      font-family: Arial, sans-serif;
      background-color: var(--latte);
      margin: 0;
      padding: 0;
    }

    .container {
      max-width: 500px;
      margin: 50px auto;
      background-color: var(--putih);
      padding: 30px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }

    h2 {
      text-align: center;
      color: var(--coklat-tua);
      margin-bottom: 25px;
    }

    label {
      display: block;
      margin-bottom: 5px;
      color: var(--coklat-tua);
    }

    input, select {
      width: 100%;
      padding: 10px;
      margin-bottom: 15px;
      border: 1px solid var(--abu);
      border-radius: 4px;
    }

    button {
      width: 100%;
      padding: 10px;
      background-color: var(--coklat-muda);
      border: none;
      color: white;
      font-weight: bold;
      cursor: pointer;
      border-radius: 4px;
    }

    button:hover {
      background-color: #3e2723;
    }

    .back-link {
      display: block;
      text-align: center;
      margin-top: 15px;
      color: var(--coklat-muda);
      text-decoration: none;
    }

    .back-link:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Tambah Pengguna</h2>
    <form method="POST">
      <label>Nama</label>
      <input type="text" name="name" required>

      <label>Email</label>
      <input type="email" name="email" required>

      <label>Password</label>
      <input type="password" name="password" required>

      <label>Role</label>
      <select name="role_id" required>
        <?php while ($r = $roles->fetch_assoc()): ?>
          <option value="<?= $r['id'] ?>"><?= $r['name'] ?></option>
        <?php endwhile; ?>
      </select>

      <button type="submit">Simpan</button>
    </form>
    <a class="back-link" href="user.php">← Kembali ke daftar pengguna</a>
  </div>
</body>
</html>
