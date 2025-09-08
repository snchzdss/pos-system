<?php
require __DIR__ . '/../includes/functions.php';

require_login();
$username = htmlspecialchars($_SESSION['username']);
$role = htmlspecialchars($_SESSION['role']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Dashboard - POS</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <span class="navbar-brand">POS System</span>
    <div class="d-flex">
      <span class="navbar-text me-3">Hello, <?= $username ?> (<?= $role ?>)</span>
      <a class="btn btn-outline-light btn-sm" href="../api/logout.php">Logout</a>
    </div>
  </div>
</nav>

<div class="container py-4">
  <div class="alert alert-success">You’re logged in! 🎉</div>
  <p>Next, you can build: Products CRUD, POS page, Reports, etc.</p>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
