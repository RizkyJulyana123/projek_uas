<?php
session_start();
require_once 'db.php';
if (!isset($_SESSION['user'])) header("Location: login.php");

$user = $_SESSION['user'];
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Dashboard</title>
  <style>
    body { font-family: Arial; background-color: #f4f1ec; margin: 0; }
    header { background: #4e342e; color: white; padding: 1rem; }
    nav { background: #6b4c3b; padding: 1rem; }
    nav a { color: white; text-decoration: none; margin-right: 15px; }
    .container { padding: 20px; }
  </style>
</head>
<body>
  <header><h2>Dashboard</h2></header>
  <nav>
    <a href="dashboard.php">Beranda</a>
    <a href="user.php">Manajemen User</a>
    <a href="report.php">Laporan</a>
    <a href="logout.php">Logout</a>
  </nav>
  <div class="container">
    <h3>Selamat datang, <?= $user['name'] ?>!</h3>
  </div>
</body>
</html>
