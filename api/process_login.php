<?php
require __DIR__ . '/../includes/functions.php';
require __DIR__ . '/../database/pos_db.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: ../pages/login.php");
    exit;
}

// CSRF check
if (!isset($_POST['csrf_token']) || !csrf_verification($_POST['csrf_token'])) {
    $_SESSION['error'] = "Invalid session token. Please try again.";
    header("Location: ../pages/login.php");
    exit;
}

// Basic validation
$username = trim($_POST['username'] ?? '');
$password = $_POST['password'] ?? '';

if ($username === '' || $password === '') {
    $_SESSION['error'] = "Please enter both username and password.";
    header("Location: ../pages/login.php");
    exit;
}

// Fetch user
$stmt = $pdo->prepare("SELECT id, username, password, role FROM users WHERE username = ?");
$stmt->execute([$username]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

//check whether the user exists or the user has the correct password in the database
if (!$user || $password !== $user['password']) {
    $_SESSION['error'] = "Invalid username or password.";
    header("Location: ../pages/login.php");
    exit;
}

// Success: set session
$_SESSION['user_id']  = $user['id'];
$_SESSION['username'] = $user['username'];
$_SESSION['role']     = $user['role'];

header("Location: ../pages/dashboard.php");
exit;
