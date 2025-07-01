<?php
session_start();
require_once 'db.php';
if (!isset($_SESSION['user'])) header("Location: login.php");
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Laporan</title>
  <style>
    body { font-family: Arial; background: #f4f1ec; padding: 20px; }
    table { width: 100%; border-collapse: collapse; background: white; }
    th, td { border: 1px solid #ccc; padding: 10px; }
    th { background-color: #6b4c3b; color: white; }
  </style>
</head>
<body>
  <h2>Laporan Transaksi (Contoh)</h2>
  <table>
    <tr><th>ID</th><th>Pelanggan</th><th>Total</th><th>Tanggal</th></tr>
    <tr><td>1</td><td>Aldi</td><td>Rp 500.000</td><td>2025-07-01</td></tr>
    <tr><td>2</td><td>Sinta</td><td>Rp 1.200.000</td><td>2025-07-01</td></tr>
  </table>
</body>
</html>
