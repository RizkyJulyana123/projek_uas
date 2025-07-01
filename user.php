<?php
require_once 'db.php';
session_start();
if (!isset($_SESSION['user'])) header("Location: login.php");

$result = $conn->query("SELECT users.*, roles.name AS role FROM users JOIN roles ON users.role_id = roles.id");
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Manajemen User</title>
  <style>
    body { font-family: Arial; background-color: #f4f1ec; padding: 20px; }
    table { width: 100%; border-collapse: collapse; background: white; }
    th, td { border: 1px solid #ccc; padding: 10px; }
    th { background: #6b4c3b; color: white; }
  </style>
</head>
<body>
  <h2>Manajemen User</h2>
  <a href="user_add.php">+ Tambah User</a>
  <table>
    <tr><th>Nama</th><th>Email</th><th>Role</th></tr>
    <?php while($u = $result->fetch_assoc()): ?>
    <tr>
      <td><?= $u['name'] ?></td>
      <td><?= $u['email'] ?></td>
      <td><?= $u['role'] ?></td>
    </tr>
    <?php endwhile; ?>
  </table>
</body>
</html>
